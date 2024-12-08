<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Shared</title>
  <style>
    body {
      background-color: #1e1e1e;
      color: white;
      text-align: center;
      font-family: Arial, sans-serif;
    }
    .navbar {
      margin-top: 20px;
      margin-bottom: 20px;
    }
    .navbar img {
      height: 100px;
      width: auto;
    }
    .container {
      max-width: 400px;
      margin: 0 auto;
      background-color: #2a2a2a;
      padding: 20px;
      border-radius: 10px;
      border: 2px solid #56c9b2;
      margin-top: 50px;
    }
    .container h2 {
      color: #56c9b2;
      margin-bottom: 20px;
    }
    a {
      color: #56c9b2;
      text-decoration: none;
      font-size: 1rem;
    }
    a:hover {
      text-decoration: underline;
    }
    footer {
      margin-top: 20px;
      font-size: 0.9rem;
    }
  </style>
</head>
<body>
  <div class="navbar">
    <a href="../home.html">
      <img src="../images/logo.png" alt="Company Logo">
    </a>
  </div>


  <div class="container">
    <h2>Data Shared</h2>
    <p>Your health data has been successfully shared.</p>
    <p>You will be redirected to the home screen shortly.</p>
    <p>If not, <a href="../home.html">click here</a> to go to the home screen.</p>
  </div>


  <footer>
    <p>&copy; 2024 SmartHealth Tracker System. All Rights Reserved.</p>
  </footer>

  <script>

    setTimeout(function() {
      window.location.href = "../home.html";
    }, 3000);
  </script>
</body>
</html>
