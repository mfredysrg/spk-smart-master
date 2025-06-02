<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "smart_kp";

$conn = mysqli_connect($servername, $username, $password, $db_name);

if (!$conn) {
    die("Gagal ke DataBase : " . mysqli_connect_error());
} else {
    //echo"INI TERHU BUNG";
}
