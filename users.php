
<?php

require_once "config.php";

if($_SESSION['role'] === '' || $_SESSION['user_id'] === '') {
    header('location: index.php');
}

if($_SESSION['role'] !== 'admin') {
   header('location: dashboard.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Management</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="navi">
        <a href="dashboard.php">Dashboard</a>
        <a href="products.php">Products</a>

        <?php if ($_SESSION['role'] === 'admin'):?>
        <a class="active" href="users.php">User Management</a>
        <?php endif; ?>

        <a href="logout.php">Logout</a>
    </div>

    <br>

    <div class="main">
        <h1>USER MANAGEMENT</h1>
        <br>

        <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Status</th>
                    <th>Role</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php

                $fetchquery = "SELECT * FROM users";

                $fetch = mysqli_query($conn, $fetchquery);

                if(mysqli_num_rows($fetch) > 0) {

                    while($user = mysqli_fetch_assoc($fetch)) {
                ?>
                <tr>
                    <td><?php echo $user['username']; ?></td>
                    <td><?php echo $user['status']; ?></td>
                    <td><?php echo $user['role']; ?></td>
                    <td><?php echo $user['created_at']; ?></td>

                    <td>
                        <?php if($user['status'] !=='approved'):?>
                        <button onclick="window.location.href='approveuser.php?userid=<?php echo $user['ID']; ?>'">Approve</button>

                        <?php elseif($user['status'] ==='approved'):?>
                        <button onclick="window.location.href='disable.php?userid=<?php echo $user['ID']; ?>'">Disable</button>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php
                    }
                }
                else {
                ?>
                <tr>
                    <td colspan="5">No Users Found.</td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
