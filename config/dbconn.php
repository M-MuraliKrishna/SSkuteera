<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "sskuteera";

// connetions
$conn = mysqli_connect("$host","$username","$password","$database");

// check connection
if(!$conn){

    header("Location: ../errors/db.php");
    // die(mysqli_connect_error($conn));
    die();
}
// else{
//     echo "Database Connected";
// }
?>
