<?php
$db_host = "127.0.0.1";
$db_user = "root";
$db_passwd = "";
$db_name = "web";
$db_gate = "80";

$conn = mysqli_connect($db_host, $db_user, $db_passwd, $db_name);
if($conn){
    mysqli_query($conn, "SET NAME 'utf8'");
}else{
    echo "Kết nối thất bại!".mysqli_connect_error();
}
?>