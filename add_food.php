<?php

include("conection.php");

if(isset($_POST['add']))
{
    $food_name = $_POST['food_name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $description = $_POST['description'];

    $image = $_FILES['image']['name'];

    $tmp_name = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmp_name, "../images/" . $image);

    $sql = "INSERT INTO food
            (food_name, price, category, description, image)
            VALUES
            ('$food_name', '$price', '$category', '$description', '$image')";

    mysqli_query($conn, $sql);

    echo "<script>
            alert('Food Added Successfully');
            window.location='view_menu.php';
          </script>";
}

?>

<!DOCTYPE html>
<html>

<head>

<title>Street Cart - Add Food</title>

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
    margin-top: 35px;
}

.box {
    width: 450px;
    margin: 30px auto;
    padding: 30px;
    border: 2px solid #f5d7a1;
    border-radius: 20px;
}

h2 {
    color: #fff5df;
}

input, select, textarea {
    width: 90%;
    padding: 12px;
    margin: 10px;
    border-radius: 10px;
    border: 1px solid #f5d7a1;
    font-size: 16px;
}

textarea {
    height: 80px;
}

button {
    background-color: #d6a566;
    color: white;
    border: none;
    padding: 13px 30px;
    border-radius: 10px;
    font-size: 17px;
    cursor: pointer;
}

.back {
    display: block;
    margin-top: 20px;
    color: #fff5df;
    text-decoration: none;
}

</style>

</head>

<body>

<h1>Street Cart</h1>

<div class="box">

<h2>Add Food</h2>

<form method="post" enctype="multipart/form-data">

<input type="text"
       name="food_name"
       placeholder="Enter Food Name"
       required>


<input type="number"
       name="price"
       placeholder="Enter Price"
       required>


<select name="category" required>

<option value="">Select Category</option>

<option value="Fast Food">Fast Food</option>

<option value="Burger">Burger</option>

<option value="Pizza">Pizza</option>

<option value="Snacks">Snacks</option>

<option value="Drinks">Drinks</option>

<option value="South Indian">South Indian</option>

<option value="Chinese">Chinese</option>

</select>


<textarea
name="description"
placeholder="Enter Food Description"
required></textarea>


<input type="file"
       name="image"
       accept="image/*"
       required>


<br>

<button type="submit" name="add">
Add Food
</button>

</form>


<a class="back" href="dashboard.php">
 Back to Dashboard
</a>

</div>

</body>

</html>