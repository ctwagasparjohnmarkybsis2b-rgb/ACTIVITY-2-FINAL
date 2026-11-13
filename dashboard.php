
<?php

require_once "config.php";

if($_SESSION['role'] === '' || $_SESSION['user_id'] === '') {
    header('location: index.php');
}

$totaluser = $conn->query("SELECT COUNT(*) AS total from users")->fetch_assoc()['total'];
$totalpending = $conn->query("SELECT COUNT(*) AS total from users WHERE status ='pending'")->fetch_assoc()['total'];
$totalproduct = $conn->query("SELECT COUNT(*) AS total from products")->fetch_assoc()['total'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="navi">
        <a class="active" href="dashboard.php">Dashboard</a>
        <a href="products.php">Products</a>

        <?php if ($_SESSION['role'] === 'admin'):?>
        <a href="users.php">User Management</a>
        <?php endif; ?>

        <a href="logout.php">Logout</a>
    </div>

    <div class="main">
        <h1>WELCOME!</h1>
        <br>

        <div class="cards">
            <div class="card" style="background-color: blue;">
                <h3>Total Users</h3>
                <h2><?php echo $totaluser; ?></h2>
            </div>

            <div class="card" style="background-color: orange;">
                <h3>Total of Not Approved Users</h3>
                <h2><?php echo $totalpending; ?></h2>
            </div>

            <div class="card" style="background-color: green;">
                <h3>Total of Products</h3>
                <h2><?php echo $totalproduct; ?></h2>
            </div>
        </div>
    </div>
</body>
</html>
