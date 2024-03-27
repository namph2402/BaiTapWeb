<?php
session_start();
if(!isset($_SESSION['logincheck'])){
    header("Location: ../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Log Out Confirm</title>
</head>
<style>
.img-logout{
    margin-top: 6%;
    width: 350px;
    margin-bottom: 10px;
}
.btn-check-logout{
    margin-top: 10px;
    min-width: 280px;
}
.btn-check-logout > a > input{
    width: 100px;
    padding: 5px 20px;
    border: none;
    border-radius: 5px;
    color: #fff;
    background-color: orange;
    opacity: 0.8;
}
.btn-check-logout > a > input:hover{
    opacity: 1;
}
</style>
<body>
    <?php
    $ad_id = $_GET['ad_id'];
    ?>
    
    <div class="container d-flex justify-content-center align-items-center flex-column">
        <img src="assets/img/chibi cry.png" alt="" class="img-logout">
        <h3>Bạn muốn đăng xuất thiệt hả!</h3>
        <div class="btn-check-logout d-flex justify-content-between">
            <a href="logout.php">
                <input type="submit" name="submit" value="LogOut">
            </a>
            <a href="admin_page.php?ad_id=<?php echo $ad_id;?>">
                <input type="button" value="ReTurn">
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
</body>
</html>