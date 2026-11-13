
<?php

require_once "config.php";

if($_SESSION['role'] === '' || $_SESSION['user_id'] === '') {
    header('location: index.php');
}

if($_SESSION['role'] !== 'admin') {
   header('location: dashboard.php');
}

$userid = $_GET['userid'];

$approveuser = mysqli_query($conn,"UPDATE users SET status = 'approved' WHERE ID = '$userid'");

if($approveuser) {
    echo"
    <script>
    alert('User is Approved');
    window.location.href='users.php';
    </script>
    ";
}
else {
    echo"
    <script>
    alert('Something Went Wrong');
    window.location.href='users.php';
    </script>
    ";
}

?>
