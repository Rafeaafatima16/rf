<?php
session_start();
include("conection.php");

if(!isset($_SESSION['cart']))
{
    $_SESSION['cart'] = array();
}

if(isset($_GET['add']))
{
    $id = $_GET['add'];

    if(isset($_SESSION['cart'][$id]))
    {
        $_SESSION['cart'][$id]++;
    }
    else
    {
        $_SESSION['cart'][$id] = 1;
    }

    header("Location: cart.php");
    exit;
}

if(isset($_GET['remove']))
{
    $id = $_GET['remove'];
    unset($_SESSION['cart'][$id]);

    header("Location: cart.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Cart - Street Cart</title>

    <style>
        body {
            margin: 0;
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
            width: 85%;
            margin: 25px auto;
            padding: 20px;
            border-radius: 15px;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #C19A7B;
            padding: 12px;
        }

        th {
            background-color: #6F4E37;
            color: white;
        }

        .btn {
            display: inline-block;
            background-color: #d6a566;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 8px;
        }

        .remove {
            background-color: firebrick;
        }
    </style>
</head>

<body>

    <div class="navbar">
        <h1>🍴 Street Cart</h1>
        <a href="customer-dashboard.php">Home</a>
        <a href="cart.php">Cart</a>
        <a href="checkout.php">Checkout</a>
        <a href="myorders.php">My Orders</a>
        <a href="profile.php">Profile</a>
    </div>

    <h2>My Cart</h2>

    <div class="box">

        <table>
            <tr>
                <th>Food Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Action</th>
            </tr>

            <?php
            $grand_total = 0;

            foreach($_SESSION['cart'] as $id => $qty)
            {
                $sql = "SELECT * FROM food WHERE id='$id'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);

                if($row)
                {
                    $total = $row['price'] * $qty;
                    $grand_total = $grand_total + $total;

                    echo "<tr>";
                    echo "<td>".$row['food_name']."</td>";
                    echo "<td>Rs. ".$row['price']."</td>";
                    echo "<td>".$qty."</td>";
                    echo "<td>Rs. ".$total."</td>";
                    echo "<td><a class='btn remove' href='cart.php?remove=".$id."'>Remove</a></td>";
                    echo "</tr>";
                }
            }
            ?>
        </table>

        <h2>Total Bill: Rs. <?php echo $grand_total; ?></h2>

        <a class="btn" href="customer-dashboard.php">Continue Shopping</a>

        <a class="btn" href="checkout.php">Checkout</a>

    </div>

</body>
</html>
