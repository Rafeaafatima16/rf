<?php
include("conection.php");

$row = null;
$message = "";

if(isset($_POST['submit']))
{
    $email = $_POST['email'];

    $sql = "SELECT * FROM customers WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_assoc($result);
    }
    else
    {
        $message = "Customer not found! Please register first.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Profile</title>

    <style>
        body {
            background-color: #4b160d;
            color: white;
            font-family: Georgia;
            text-align: center;
            margin: 0;
        }

        .navbar {
            background-color: #3E1F0F;
            padding: 15px;
        }

        .navbar a {
            color: #fff5df;
            text-decoration: none;
            padding: 10px;
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

        input {
            width: 90%;
            padding: 10px;
            margin: 10px;
            border: 1px solid #C19A7B;
            border-radius: 8px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #d6a566;
            color: white;
            cursor: pointer;
        }

        .details {
            text-align: left;
        }

        .message {
            color: red;
        }
    </style>
</head>

<body>

    <div class="navbar">
        <h1>Street Cart</h1>
        <a href="customer-dashboard.php">Home</a>
        <a href="myorders.php">My Orders</a>
        <a href="profile.php">Profile</a>
        <a href="logout.php">Logout</a>
    </div>

    <h2>My Profile</h2>

    <div class="box">

        <?php if($row == null) { ?>

            <h3>Find Your Profile</h3>

            <form method="POST">
                <input type="email" name="email"
                placeholder="Enter Registered Email" required>

                <input type="submit" name="submit"
                value="Show Profile">
            </form>

            <p class="message"><?php echo $message; ?></p>

        <?php } else { ?>

            <h2>Customer Details</h2>

            <div class="details">
                <p><b>Name:</b>
                <?php echo htmlspecialchars($row['name']); ?></p>

                <p><b>Mobile:</b>
                <?php echo htmlspecialchars($row['phone']); ?></p>

                <p><b>Email:</b>
                <?php echo htmlspecialchars($row['email']); ?></p>

                <p><b>Address:</b>
                <?php echo htmlspecialchars($row['address']); ?></p>
            </div>

        <?php } ?>

    </div>

</body>
</html>
