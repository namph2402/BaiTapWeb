<?php 

session_start();
if(isset($_SESSION['logincheck'])){
    unset($_SESSION['logincheck']);
    header("Location: ../index.php");
}

?>