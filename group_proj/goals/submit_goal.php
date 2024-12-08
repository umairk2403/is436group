<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $goal_type = htmlspecialchars($_POST['goal_type']);
    $target_value = htmlspecialchars($_POST['target_value']);
    $status = htmlspecialchars($_POST['status']);

    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
      <meta charset='UTF-8'>
      <meta name='viewport' content='width=device-width, initial-scale=1.0'>
      <link rel='stylesheet' href='../styles.css'>
      <title>Goal Submission</title>
      <style>
        body {
          background-color: #1e1e1e;
          color: white;
          text-align: center;
          font-family: Arial, sans-serif;
        }
        .container {
          margin-top: 20px;
          max-width: 400px;
          background-color: #2a2a2a;
          padding: 20px;
          border-radius: 10px;
          border: 2px solid #56c9b2;
          margin-left: auto;
          margin-right: auto;
        }
        .btn {
          background-color: #56c9b2;
          color: black;
          border: none;
          padding: 10px 20px;
          border-radius: 5px;
          cursor: pointer;
          font-size: 1rem;
        }
        .btn:hover {
          background-color: white;
          color: black;
        }
        a {
          color: #56c9b2;
          text-decoration: none;
        }
        a:hover {
          text-decoration: underline;
        }
      </style>
    </head>
    <body>
      <div class='container'>
        <h1>Goal Submitted Successfully!</h1>
        <p>Goal Type: $goal_type</p>
        <p>Target Value: $target_value</p>
        <p>Status: $status</p>
        <a href='goals.html' class='btn'>Set Another Goal</a>
      </div>
    </body>
    </html>";
} else {
    header("Location: goals.html");
    exit();
}
?>
