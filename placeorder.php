
<?php
include("conection.php");

if(isset($_GET['id']))
{
    $id = $_GET['id'];

    $sql = "SELECT * FROM food WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if(!$row)
    {
        echo "Food not found!";
        exit;
    }
}
else
{
    echo "Please select food from Customer Panel.";
    exit;
}

if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $qty = $_POST['qty'];

    $price = $row['price'];
    $foodname = $row['food_name'];
    $total = $price * $qty;

    $sql = "INSERT INTO orders
    (food_id, food_name, price, quantity, customer_name, phone, address, total)
    VALUES
    ('$id', '$foodname', '$price', '$qty', '$name', '$phone', '$address', '$total')";

    if(mysqli_query($conn, $sql))
    {
        header("Location: myorders.php");
        exit;
    }
    else
    {
        echo "Order not placed!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Place Order</title>

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
            width: 300px;
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
            width: 100%;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #6F4E37;
        }
    </style>
</head>

<body>

    <h1>Street Cart</h1>
    <h2>Place Your Order</h2>

    <div class="box">

        <h2><?php echo $row['food_name']; ?></h2>

        <h3>Price: Rs. <?php echo $row['price']; ?></h3>

        <form method="POST">

            <input type="text" name="name"
            placeholder="Customer Name" required>

            <input type="text" name="phone"
            placeholder="Mobile Number" required>

            <textarea name="address"
            placeholder="Full Address" required></textarea>

            <input type="number" name="qty"
            placeholder="Quantity" min="1" value="1" required>

            <input type="submit" name="submit"
            value="Confirm Order">

        </form>

    </div>

</body>
</html>
