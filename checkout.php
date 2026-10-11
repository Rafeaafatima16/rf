<?php
session_start();
include("conection.php");

if(!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0)
{
    echo "<h2>Your cart is empty!</h2>";
    echo "<a href='cust_dash.php'>Go to Menu</a>";
    exit;
}

if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    foreach($_SESSION['cart'] as $id => $qty)
    {
        $sql = "SELECT * FROM food WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        if($row)
        {
            $foodname = $row['food_name'];
            $price = $row['price'];
            $total = $price * $qty;

            $sql2 = "INSERT INTO orders1
            (food_id, food_name, price, quantity, customer_name, phone, address, total)
            VALUES
            ('$id', '$foodname', '$price', '$qty', '$name', '$phone', '$address', '$total')";

            mysqli_query($conn, $sql2);
        }
    }

    unset($_SESSION['cart']);

    header("Location: myorders.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Checkout - Street Cart</title>

    <style>
        body {
            background-color: #4b160d;
            color: white;
            font-family: Georgia;
            text-align: center;
        }

        .navbar {
            background-color: #3E1F0F;
            padding: 15px;
        }

        .navbar a {
            color: #fff5df;
            text-decoration: none;
            padding: 12px;
            display: inline-block;
        }

        .box {
            background-color: white;
            color: #3E1F0F;
            width: 320px;
            margin: 30px auto;
            padding: 25px;
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
            font-size: 16px;
        }
    </style>
</head>

<body>

    <div class="navbar">
        <h1>🍴 Street Cart</h1>
        <a href="customer-dashboard.php">Home</a>
        <a href="cart.php">Cart</a>
        <a href="myorders.php">My Orders</a>
        <a href="profile.php">Profile</a>
    </div>

    <h2>Checkout</h2>

    <div class="box">

        <h3>Customer Details</h3>

        <form method="POST">

            <input type="text" name="name"
            placeholder="Customer Name" required>

            <input type="text" name="phone"
            placeholder="Mobile Number" required>

            <textarea name="address"
            placeholder="Full Address" required></textarea>

            <input type="submit" name="submit"
            value="Confirm Order">

        </form>

    </div>

</body>
</html>
