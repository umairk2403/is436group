<?php
// Include database connection
include '../db_connect.php';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];

    // Retrieve user data from the Users table
    $sql = "SELECT id, username, password FROM Users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $user['password'])) {
            echo "<h1>Welcome, " . htmlspecialchars($user['username']) . "!</h1>";
            echo "<p>You have successfully logged in.</p>";
            echo "<a href='../home.html' class='btn'>Go to Home</a>";
        } else {
            echo "<h1>Invalid Credentials</h1>";
            echo "<p>The email or password you entered is incorrect.</p>";
            echo "<a href='login.html' class='btn'>Try Again</a>";
        }
    } else {
        echo "<h1>User Not Found</h1>";
        echo "<p>No account associated with this email address.</p>";
        echo "<a href='../signup/signup.html' class='btn'>Sign Up</a>";
    }

    $stmt->close();
    $conn->close();
}
?>
