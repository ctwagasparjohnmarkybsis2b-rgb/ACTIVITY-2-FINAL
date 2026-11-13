
<?php

$conn = mysqli_connect("localhost","root","","ctwagaspar", 3307);

function h($str){
    return htmlspecialchars($str ?? '', ENT_QUOTES,'UTF-8');
}

session_start();

?>
