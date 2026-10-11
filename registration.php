
<?php
session_start();
include("conection.php");

if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO customers
    (name, phone, email, address, password)
    VALUES ('$name', '$phone', '$email', '$address', '$password')";

    if(mysqli_query($conn, $sql))
    {
        $_SESSION['customer_id'] = mysqli_insert_id($conn);
        header("Location: profile.php");
        exit;
    }
    else
    {
        echo "Registration failed!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Customer Registration</title>

    <style>
        body {
            background-color: #4b160d;
            color: white;
            font-family: Georgia;
            text-align: center;
        }

        .box {
            background-color: white;
            color: #3E1F0F;
            width: 320px;
            margin: 30px auto;
            padding: 20px;
            border-radius: 15px;
        }

        input, textarea {
            width: 90%;
            padding: 10px;
            margin: 8px;
            border: 1px solid #C19A7B;
            border-radius: 8px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #d6a566;
            color: white;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <h1>Street Cart</h1>
    <h2>Customer Registration</h2>

    <div class="box">
        <form method="POST">

            <input type="text" name="name"
            placeholder="Full Name" required>

            <input type="text" name="phone"
            placeholder="Mobile Number" required>

            <input type="email" name="email"
            placeholder="Email" required>

            <textarea name="address"
            placeholder="Full Address" required></textarea>

            <input type="password" name="password"
            placeholder="Password" required>

            <input type="submit" name="submit"
            value="Register">

        </form>
    </div>

</body>
</html>
