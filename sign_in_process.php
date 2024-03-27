<?php
session_start();
include "./config/config.php";

if(isset($_POST['btnLogin']) && $_POST["txtAccount"] != '' && $_POST["txtPasswd"] != ''){
    $txtAccount = $_POST['txtAccount'];
    $txtPass = $_POST['txtPasswd'];
    $txtPasswd = md5($txtPass);
    
    $sql = "SELECT * FROM admins WHERE ad_name = '$txtAccount' AND ad_pass = '$txtPasswd'";
    $query = mysqli_query($conn, $sql);
    $total = mysqli_fetch_assoc($query);
    $ad_id = $total['ad_id'];

    if($total > 0){
        $_SESSION['logincheck'] = $txtAccount;
        header("Location: ./admin/admin_page.php?ad_id=$ad_id");
        mysqli_close($conn);
    }else{
        header("Location: index.php");
    }

    $sql = "SELECT * FROM users WHERE us_name = '$txtAccount' AND us_pass = '$txtPasswd'";
    $query = mysqli_query($conn, $sql);
    $total = mysqli_fetch_assoc($query);
    $us_id = $total['us_id'];
    if($total > 0){
        $_SESSION['usercheck'] = $txtAccount;
        header("Location: ./member/home_page/home_page.php?us_id=$us_id");
        mysqli_close($conn);
    }else{
        header("Location: index.php");
    }
}else{
    header("Location: index.php");
}
?>
