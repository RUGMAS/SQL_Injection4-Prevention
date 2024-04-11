<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Status</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            text-align: center;
        }

        .success {
            color: #28a745;
        }

        .failure {
            color: #dc3545;
        }

        p {
            margin-top: 10px;
        }

        .back-button {
            background-color: #007bff;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .back-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
    <?php
    $cleardb_server = "localhost";
    $cleardb_username = "root";
    $cleardb_password = "";
    $cleardb_db = "sem";

    $active_group = 'default';
    $query_builder = TRUE;

    $conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

    $uname = $_GET['uname'];
    $pass = $_GET['pass'];
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM login_details WHERE username = '$uname' AND password = '$pass'";
    $result = mysqli_query($conn, $sql);
    $check = mysqli_fetch_array($result);

    if (isset($check)) {
        echo '<h1 class="success">Credentials verified! 🛡️😊</h1>';
    } else {
        echo '<h1 class="failure">Credentials not verified🚫😞</h1><p class="failure">Wrong user credentials</p>';
    }

    ?>
    <button class="back-button" onclick="window.history.back()">Back</button>
</div>
</body>
</html>
