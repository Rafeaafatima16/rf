<!DOCTYPE html>
<html>
<head>
    <title>Street Cart - Owner Login</title>

    <style>
        body {
            background-color: #4b160d;
            color: white;
            font-family: Georgia;
            text-align: center;
        }

        .box {
            width: 400px;
            margin: 80px auto;
            padding: 30px;
            border: 2px solid #f5d7a1;
            border-radius: 20px;
        }

        h1 {
            color: #fff5df;
        }

        input { 
            width: 90%;
            padding: 12px;
            margin: 10px;
            border-radius: 10px;
            border: 1px solid #f5d7a1;
            font-size: 16px;
        }

        button {
            width: 150px;
            padding: 12px;
            margin-top: 15px;
            background-color: #d6a566;
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 17px;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <div class="box">

        <h1>Street Cart</h1>
        <h2>Owner Login</h2>

        <form method="post">

            <input type="text" name="name" placeholder="Enter Your Name" required>

            <input type="text" name="mobile" placeholder="Enter Mobile Number" required>

            <input type="text" name="city" placeholder="Enter city" required>

            <br>

            <button type="submit" name="login">Login</button>

        </form>

    </div>

</body>
</html>
<?php
   include("conection.php");

if(isset($_POST['login']))
{
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $city = $_POST['city'];

    $sql = "INSERT INTO owner(name, mobile, city)
            VALUES('$name', '$mobile', '$city')";

    mysqli_query($conn, $sql);

    header("location:dashboard.php");
}

?>