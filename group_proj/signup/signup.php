<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up</title>
  <style>
    body {
      background-color: #1e1e1e; 
      color: white; 
    }
    .navbar img {
      height: 120px; 
      width: auto;
    }
    .container {
      margin-top: 50px;
      padding: 20px;
      background-color: #2a2a2a;
      border-radius: 10px;
      border: 2px solid #56c9b2;
      max-width: 500px;
      margin-left: auto;
      margin-right: auto;
      text-align: center;
    }
    .container h1 {
      color: #56c9b2;
    }
    a {
      color: #56c9b2;
      text-decoration: none;
    }
    a:hover {
      text-decoration: underline;
    }
    footer {
      text-align: center;
      padding: 10px 0;
      background-color: #1e1e1e;
      color: #56c9b2;
      position: fixed;
      bottom: 0;
      width: 100%;
    }
  </style>
</head>
<body>

  <nav class="navbar">
    <div class="container text-center">
      <a href="../index.html">
        <img src="../images/logo.png" alt="Company Logo"> 
      </a>
    </div>
  </nav>


  <div class="container">
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = htmlspecialchars($_POST['username']);
        $email = htmlspecialchars($_POST['email']);
        echo "<h1>Thank You for Signing Up, $username!</h1>";
        echo "<p>Your email <strong>$email</strong> has been registered successfully.</p>";
        echo "<a href='../login/login.html' class='btn'>Go to Log In</a>";
    } else {
        echo "<h1>Error</h1>";
        echo "<p>Invalid access method. Please go back to the Sign Up page.</p>";
        echo "<a href='../signup/signup.html' class='btn'>Go to Sign Up</a>";
    }
    ?>
  </div>


  <footer>
    <p>&copy; 2024 SmartHealth Tracker System. All Rights Reserved.</p>
  </footer>
</body>
</html>
