<?php

include("conection.php");

?>

<!DOCTYPE html>
<html>

<head>

<title>Street Cart - Owner Dashboard</title>

<style>

body {
    margin: 0;
    background-color: #4b160d;
    color: white;
    font-family: Georgia;
}

/* Heading */

h1 {
    text-align: center;
    color: #fff5df;
    margin: 25px;
}

/* Main */

.main {
    display: flex;
}

/* Left Menu */

.sidebar {
    width: 220px;
    min-height: 600px;
    border: 2px solid #f5d7a1;
    border-radius: 20px;
    margin: 20px;
    padding: 20px;
}

.sidebar a {
    display: block;
    text-decoration: none;
    text-align: center;
    background-color: #d6a566;
    color: white;
    padding: 15px;
    margin: 15px 0;
    border-radius: 12px;
}

/* Right Side */

.content {
    flex: 1;
    padding: 20px;
}

/* Cards */

.cards {
    display: flex;
    gap: 15px;
}

.card {
    flex: 1;
    border: 2px solid #f5d7a1;
    border-radius: 15px;
    text-align: center;
    padding: 20px;
}

.card h2 {
    color: #fff5df;
}

.card p {
    font-size: 30px;
    margin: 10px;
}

/* Orders */

.orders {
    margin-top: 25px;
    border: 2px solid #f5d7a1;
    border-radius: 15px;
    padding: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    border: 1px solid #d6a566;
    padding: 12px;
    text-align: center;
}

th {
    color: #fff5df;
}

.status {
    background-color: #d6a566;
    padding: 7px;
    border-radius: 8px;
}

/* Menu */

.menu {
    margin-top: 25px;
    border: 2px solid #f5d7a1;
    border-radius: 15px;
    padding: 20px;
}

.food {
    display: inline-block;
    width: 28%;
    border: 1px solid #f5d7a1;
    border-radius: 12px;
    padding: 15px;
    margin: 10px;
    text-align: center;
}

.button {
    background-color: #d6a566;
    color: white;
    border: none;
    padding: 8px 20px;
    border-radius: 8px;
}

</style>

</head>


<body>

<h1>Street Cart - Owner Panel</h1>


<div class="main">


<!-- Sidebar -->

<div class="sidebar">

<a href="dashboard.php">Dashboard</a>

<a href="add_food.php">Add Food</a>

<a href="view_menu.php">View Menu</a>

<a href="orders.php">Orders</a>

<a href="customers.php">Customers</a>

<a href="logout.php">Logout</a>

</div>


<!-- Content -->

<div class="content">


<!-- Cards -->

<div class="cards">

<div class="card">

<h2>Total Food Items</h2>

<p>6</p>

</div>


<div class="card">

<h2>New Orders</h2>

<p>3</p>

</div>


<div class="card">

<h2>Completed Orders</h2>

<p>5</p>

</div>


<div class="card">

<h2>Total Sales</h2>

<p>₹1240</p>

</div>

</div>


<!-- Recent Orders -->

<div class="orders">

<h2>Recent Orders</h2>

<table>

<tr>

<th>Order ID</th>

<th>Customer</th>

<th>Food</th>

<th>Qty</th>

<th>Price</th>

<th>Status</th>

</tr>


<tr>

<td>#101</td>

<td>Ayesha</td>

<td>Veg Maggi</td>

<td>2</td>

<td>₹80</td>

<td><span class="status">Pending</span></td>

</tr>


<tr>

<td>#102</td>

<td>Rohan</td>

<td>French Fries</td>

<td>1</td>

<td>₹50</td>

<td><span class="status">Preparing</span></td>

</tr>


<tr>

<td>#103</td>

<td>Sara</td>

<td>Paneer Roll</td>

<td>1</td>

<td>₹70</td>

<td><span class="status">Completed</span></td>

</tr>


<tr>

<td>#104</td>

<td>Sameer</td>

<td>Cold Coffee</td>

<td>2</td>

<td>₹120</td>

<td><span class="status">Pending</span></td>

</tr>


<tr>

<td>#105</td>

<td>Zara</td>

<td>Veg Burger</td>

<td>1</td>

<td>₹60</td>

<td><span class="status">Completed</span></td>

</tr>

</table>

</div>


<!-- Menu Items -->

<div class="menu">

<h2>Menu Items</h2>


<div class="food">

<h3>Veg Maggi</h3>

<p>₹40</p>

<button class="button">Edit</button>

<button class="button">Delete</button>

</div>


<div class="food">

<h3>Veg Burger</h3>

<p>₹60</p>

<button class="button">Edit</button>

<button class="button">Delete</button>

</div>


<div class="food">

<h3>French Fries</h3>

<p>₹50</p>

<button class="button">Edit</button>

<button class="button">Delete</button>

</div>


</div>


</div>

</div>

</body>

</html>