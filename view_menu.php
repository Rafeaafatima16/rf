<?php

include("conection.php");

$sql = "SELECT * FROM food";

$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>

<head>

<title>Street Cart - View Menu</title>

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

.menu {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
}

.food {
    width: 260px;
    border: 2px solid #f5d7a1;
    border-radius: 18px;
    padding: 20px;
    text-align: center;
    background-color: #5a1c11;
}

.food img {
    width: 220px;
    height: 160px;
    object-fit: cover;
    border-radius: 12px;
}

.food h2 {
    color: #fff5df;
}

.food p {
    margin: 8px;
}

.price {
    font-size: 20px;
    color: #f5d7a1;
}

.button {
    display: inline-block;
    padding: 9px 15px;
    margin: 8px 3px;
    background-color: #d6a566;
    color: white;
    text-decoration: none;
    border-radius: 8px;
}

.delete {
    background-color: #7d2920;
}

.back {
    display: block;
    width: 180px;
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

<h1>My Food Menu</h1>


<div class="menu">

<?php

while($row = mysqli_fetch_assoc($result))
{

?>

<div class="food">

<img src="../images/<?php echo $row['image']; ?>">


<h2>
<?php echo $row['food_name']; ?>
</h2>


<p>
Category:
<?php echo $row['category']; ?>
</p>


<p class="price">
₹<?php echo $row['price']; ?>
</p>


<p>
<?php echo $row['description']; ?>
</p>


<a class="button"
href="edit_food.php?id=<?php echo $row['id']; ?>">
Edit
</a>


<a class="button delete"
href="delete_food.php?id=<?php echo $row['id']; ?>"
onclick="return confirm('Are you sure you want to delete this food?');">
Delete
</a>

</div>

<?php

}

?>

</div>


<a class="back" href="dashboard.php">
← Back to Dashboard
</a>


</body>

</html>