<?php include("conection.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Street Cart - Customer Panel</title>

    <style>
        body {
            margin: 0;
            background-color: #4b160d;
            color: white;
            font-family: Georgia;
        }

        .navbar {
            background-color: #3E1F0F;
            text-align: center;
            padding: 10px;
        }

        .navbar h1 {
            text-align: center;
            color: #fff5df;
        }

        .navbar a {
            display: inline-block;
            color: #fff5df;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
            font-size: 16px;
        }

        .navbar a:hover {
            background-color: #d6a566;
            color: white;
        }

        .header {
            background-color: #3E1F0F;
            color: #fff5df;
            padding: 20px;
            text-align: center;
        }

        .menu-box {
            background-color: white;
            color: #3E1F0F;
            margin: 20px;
            padding: 20px;
            border-radius: 15px;
            border: 2px solid #f5d7a1;
            width: 300px;
            display: inline-block;
            vertical-align: top;
        }

        img {
            width: 100%;
            height: 180px;
            border-radius: 10px;
        }

        h2 {
            color: #4b160d;
        }

        .order-btn {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #d6a566;
            color: white;
            border: none;
            border-radius: 10px;
            text-decoration: none;
            font-size: 16px;
        }
    </style>
</head>

<body>

    <!-- Navigation Bar -->
    <div class="navbar">

        <h1>🍴 Street Cart - Customer Panel</h1>

        <a href="customer-dashboard.php">Home</a>
        <a href="cart.php">Cart</a>
        <a href="checkout.php">Checkout</a>
        <a href="placeorder.php">Place Order</a>
        <a href="myorders.php">My Orders</a>
        <a href="profile.php">Profile</a>
        <a href="logout.php">Logout</a>

    </div>

    <!-- Header -->
    <div class="header">
        <p>See all available menus & Order Now</p>
    </div>

    <!-- Menu Display -->
    <div style="text-align:center;">

        <?php
        $sql = "SELECT * FROM food ORDER BY id DESC";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0) {

            while($row = mysqli_fetch_assoc($result)) {

                echo "<div class='menu-box'>";

                echo "<img src='../images/".$row['image']."' alt='Food Image'>";

                echo "<h2>".$row['food_name']."</h2>";

                echo "<p>Category: ".$row['category']."</p>";

                echo "<p>Price: Rs. ".$row['price']."</p>";

                echo "<p>".$row['description']."</p>";

                //echo "<a class='order-btn' href='order.php?id=".$row['id']."'>Order Now</a>";
echo "<a href='placeorder.php?id=".$row['id']."'>Order Now</a>";
                echo "</div>";
            }

        } else {

            echo "<p>No food items available yet.</p>";

        }
        ?>

    </div>

</body>
</html>