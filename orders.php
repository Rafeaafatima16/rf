<?php

include("conection.php");

$sql = "SELECT * FROM orders ORDER BY id DESC";

$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>
<head>
<title>Street Cart - Orders</title>
<style>

body {
    margin: 0;
    background-color: #4b160d;
    color: white;
    font-family: Georgia;
}

h1 {
    text-align: center;
    color: #fff5df;
    margin: 30px;
}

.box {
    width: 90%;
    margin: auto;
    border: 2px solid #f5d7a1;
    border-radius: 20px;
    padding: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    border: 1px solid #d6a566;
    padding: 14px;
    text-align: center;
}

th {
    color: #fff5df;
    font-size: 18px;
}

.status {
    background-color: #d6a566;
    padding: 8px;
    border-radius: 8px;
}

.back {
    display: block;
    width: 200px;
    margin: 30px auto;
    padding: 12px;
    text-align: center;
    background-color: #d6a566;
    color: white;
    text-decoration: none;
    border-radius: 10px;
}

</style>

</head>

<body>

<h1>Customer Orders</h1>

<div class="box">

<table>

<tr>

<th>Order ID</th>

<th>Customer</th>

<th>Food</th>

<th>Quantity</th>

<th>Price</th>

<th>Status</th>

</tr>


<?php

while($row = mysqli_fetch_assoc($result))
{

?>

<tr>

<td>
<?php echo $row['id']; ?>
</td>

<td>
<?php echo $row['customer_name']; ?>
</td>

<td>
<?php echo $row['food_name']; ?>
</td>

<td>
<?php echo $row['quantity']; ?>
</td>

<td>
₹<?php echo $row['price']; ?>
</td>

<td>
<span class="status">
<?php echo $row['status']; ?>
</span>
</td>

</tr>

<?php

}

?>

</table>

</div>


<a class="back" href="dashboard.php">
← Back to Dashboard
</a>

</body>

</html>