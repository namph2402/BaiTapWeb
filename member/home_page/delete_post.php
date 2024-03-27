<?php
session_start();
if(!isset($_SESSION['usercheck'])){
    header("Location: ../../index.php");
}
?>

<?php

$conn = mysqli_connect('localhost','root','','web');

$po_id = $_GET['po_id'];
$us_id = $_GET['us_id'];

$sql = "DELETE From posts WHERE po_id = '$po_id' ";

$res = mysqli_query($conn, $sql);

if($res==true){
    header("Location:home_page.php?us_id=$us_id");
}

?>