<?php

include("conection.php");

$sql = "SELECT * FROM customer";

$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>

<head>

<title>Street Cart - Customers</title>

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

<h1>Customers</h1>

<div class="box">

<table>

<tr>

<th>ID</th>

<th>Name</th>

<th>Mobile</th>

<th>Address</th>

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
<?php echo $row['name']; ?>
</td>

<td>
<?php echo $row['mobile']; ?>
</td>

<td>
<?php echo $row['address']; ?>
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