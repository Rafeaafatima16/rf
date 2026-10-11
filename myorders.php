<?php
include("conection.php");

if(isset($_GET['cancel']))
{
    $id = $_GET['cancel'];

    $sql = "DELETE FROM orders WHERE order_id='$id'";
    mysqli_query($conn, $sql);

    header("Location: myorders.php");
    exit;
}

$sql = "SELECT * FROM orders";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Orders</title>

    <style>
        body {
            background-color: #4b160d;
            color: white;
            font-family: Georgia;
            text-align: center;
        }

        h1 {
            margin-top: 30px;
        }

        .box {
            background-color: white;
            color: #3E1F0F;
            width: 90%;
            margin: 20px auto;
            padding: 20px;
            border-radius: 15px;
            box-sizing: border-box;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #C19A7B;
            padding: 10px;
        }

        th {
            background-color: #6F4E37;
            color: white;
        }

        .bill {
            background-color: #d6a566;
            padding: 10px;
            border-radius: 8px;
        }

        .cancel {
            background-color: firebrick;
            color: white;
            padding: 8px;
            text-decoration: none;
            border-radius: 5px;
        }

        .back {
            background-color: #d6a566;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 8px;
        }
    </style>
</head>

<body>

    <h1>Street Cart</h1>
    <h2>My Orders & Bill</h2>

    <div class="box">

        <table>
            <tr>
                <th>Order ID</th>
                <th>Food Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total Bill</th>
                <th>Customer Name</th>
                <th>Address</th>
                <th>Action</th>
            </tr>

            <?php
            $grand_total = 0;

            while($row = mysqli_fetch_assoc($result))
            {
                $grand_total = $grand_total + $row['total'];

                echo "<tr>";
                echo "<td>".$row['order_id']."</td>";
                echo "<td>".$row['food_name']."</td>";
                echo "<td>Rs. ".$row['price']."</td>";
                echo "<td>".$row['quantity']."</td>";
                echo "<td>Rs. ".$row['total']."</td>";
                echo "<td>".$row['customer_name']."</td>";
                echo "<td>".$row['address']."</td>";

                echo "<td>
                <a class='cancel' href='myorders.php?cancel=".$row['order_id']."' 
                onclick=\"return confirm('Are you sure you want to cancel this order?')\">
                Cancel Order
                </a>
                </td>";

                echo "</tr>";
            }
            ?>
        </table>

        <h2 class="bill">
            Total Bill: Rs. <?php echo $grand_total; ?>
        </h2>

    </div>

    <br><br>

    <a class="back" href="customer-dashboard.php">
        Back to Customer Panel
    </a>

</body>
</html>
