<?php 

session_start();
if(isset($_SESSION['usercheck'])){
    unset($_SESSION['usercheck']);
    header("Location: ../../index.php");
}

?>