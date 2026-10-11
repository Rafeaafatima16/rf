<?php
session_start();

session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Logout - Street Cart</title>

    <style>
        body {
            background-color: #4b160d;
            color: white;
            font-family: Georgia;
            text-align: center;
            padding-top: 100px;
        }

        .box {
            background-color: white;
            color: #3E1F0F;
            width: 300px;
            margin: auto;
            padding: 25px;
            border-radius: 15px;
        }

        a {
            display: inline-block;
            background-color: #d6a566;
            color: white;
            padding: 12px 20px;
            text-decoration: none;
            border-radius: 8px;
        }
    </style>
</head>

<body>

    <div class="box">
        <h1>Street Cart</h1>
        <h2>Logged Out Successfully!</h2>
        <p>Thank you for visiting Street Cart.</p>

        <a href="register.php">Register Again</a>
    </div>

</body>
</html>
