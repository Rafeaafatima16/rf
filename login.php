<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Street Cart - Login</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            text-align: center;
            font-family: Georgia, serif;
            background-color: #3E1F0F;
            color: #E8D5C4;
        }

        h1 {
            margin-top: 50px;
            animation: name 1s;
            color: #E8D5C4;
            font-size: 40px;
        }

        .login-title {
            margin-top: 30px;
            font-size: 32px;
        }

        p {
            color: #E8D5C4;
            font-size: 18px;
        }

        /* Login Form */
        form {
            width: 400px;
            margin: 30px auto;
            padding: 35px;
            background-color: #6F4E37;
            border: 2px solid #C19A7B;
            border-radius: 25px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
            animation: right 1s;
        }

        table {
            width: 100%;
        }

        td {
            padding: 12px 5px;
            color: #E8D5C4;
            font-size: 17px;
        }

        td:first-child {
            text-align: left;
            width: 40%;
        }

        input,
        select {
            width: 100%;
            padding: 11px;
            border: 2px solid #C19A7B;
            border-radius: 12px;
            background-color: #E8D5C4;
            color: #3E1F0F;
            font-family: Georgia, serif;
            font-size: 15px;
            outline: none;
        }

        input:focus,
        select:focus {
            border-color: #F3D5B5;
            box-shadow: 0 0 8px rgba(232, 213, 196, 0.5);
        }

        /* Login Button - Same card/button style */
        input[type="submit"] {
            width: 100%;
            padding: 13px;
            margin-top: 10px;
            background-color: #3E1F0F;
            border: 2px solid #C19A7B;
            border-radius: 25px;
            color: #E8D5C4;
            font-size: 18px;
            font-family: Georgia, serif;
            cursor: pointer;
            transition: 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #E8D5C4;
            color: #3E1F0F;
            transform: scale(1.05);
        }

        footer {
            margin-top: 30px;
        }

        /* Animations */
        @keyframes name {
            from {
                transform: translateY(-100px);
            }

            to {
                transform: translateY(0);
            }
        }

        @keyframes right {
            from {
                transform: translateX(200px);
            }

            to {
                transform: translateX(0);
            }
        }

        /* Mobile Responsive */
        @media (max-width: 500px) {
            form {
                width: 90%;
                padding: 25px;
            }

            h1 {
                font-size: 32px;
            }
        }
    </style>
</head>

<body>

    <h1>Street Cart</h1>

    <h1 class="login-title">Login User</h1>

    <form method="POST">

        <table>

            <tr>
                <td>Email:</td>
                <td>
                    <input type="email" name="email" required>
                </td>
            </tr>

            <tr>
                <td>Password:</td>
                <td>
                    <input type="password" name="password" required>
                </td>
            </tr>

            <tr>
                <td>User Type:</td>
                <td>
                    <select name="user_type" required>
                        <option value="">Select User</option>
                        <option value="admin">Admin</option>
                        <option value="seller">Seller</option>
                        <option value="buyer">Buyer</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Login" name="login">
                </td>
            </tr>

        </table>

    </form>

    <footer>
        <p>Dil ka Rasta Street Cart se</p>
    </footer>

</body>

</html>

<?php
   include("conection.php");

if(isset($_POST['login']))
{
    $email= $_POST['email'];
    $password = $_POST['password'];
    $user_type = $_POST['user_type'];

    $sql = "INSERT INTO logintb(email, password, user_type)
            VALUES('$email','$password','$user_type')";

    if (mysqli_query($conn, $sql)) {
        echo "Data inserted successfully!";
    } else {
        echo "Database Error: " . mysqli_error($conn);
    }
   // mysqli_query($conn, $sql);

    //header("location:dashboard.php"); 
}

?>