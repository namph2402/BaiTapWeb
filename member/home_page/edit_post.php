<?php
session_start();
if(!isset($_SESSION['usercheck'])){
    header("Location: ../../index.php");
}
?>

<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Admin</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />

    <link rel="stylesheet" href="css/home_page.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
        integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <nav>
        <div class="nav-right">
            <span style="min-width: 118px; color: #fff;">ĐỀ TÀI 15</span>
            <div class="search-box">
                <a href="#"><img src="images/search.png"></a>
                <input type="text" placeholder="Search everything ..">
            </div>

            <div class="nav-left">
                <ul class="no_active-custom">
                    <li>
                        <img src="images/notification.png">
                    </li>
                    <li>
                        <img src="images/inbox.png">
                    </li>
                    <li>
                        <img src="images/video.png">
                    </li>
                </ul>
            </div>
        </div>

        <?php
        $us_id = $_GET['us_id'];
        ?>

        <a href="home_page.php?us_id=<?php echo $us_id;?>" class="logout_icon">
            <i class="fas fa-rocket"></i>
            <p>ReTurn</p>
        </a>
    </nav>

    <div class="container" style="display:flex; justify-content:center;">

        <?php
        $conn = mysqli_connect('localhost','root','','web');

        $po_id = $_GET['po_id'];

        $sql = "SELECT * FROM posts WHERE po_id = $po_id";
        $res = mysqli_query($conn, $sql);

        if(mysqli_num_rows($res)==1){
            $row = mysqli_fetch_assoc($res);

            $us_id = $row['us_id'];
            $po_title = $row['po_title'];
            $po_img = $row['po_image'];
        }
    ?>

        <div class="main-content">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="write-post-container">
                    <div class="post-input-container">
                        <textarea rows="2" id="post" name="post"
                            placeholder="   What's on your mind?"><?php echo $po_title; ?></textarea>

                        <img src="images/<?php echo $po_img;?>" class="post-img" style="margin-top:40px;">

                        <div class="add-post-links">


                            <label>Đổi ảnh khác</label>
                            <input type="file" name="hinhanh" style="margin-left:20px;">


                            <div>
                                <button type="submit" name="submit"  style="padding: 0px 30px;">Post</button>
                            </div>

                        </div>
            </form>
        </div>
    </div>


</body>

</html>

<?php

if(isset($_POST['submit'])){

$text = $_POST['post'];
$img = $_FILES['hinhanh']['name'];

if ($text == ""){
?>

<script language="javascript">
alert("Bạn chưa nhập gì");
</script>

<?php
} else{
    $target_dir = "images/";
    $target_file = $target_dir . basename($img);
    move_uploaded_file($_FILES['hinhanh']['tmp_name'], $target_file);

       if($img == ""){
            $sql_1 = "UPDATE posts
                    SET po_title = '$text'
                    WHERE  po_id = '$po_id'";
        } else {
            $sql_1 = " UPDATE posts
                    SET po_title = '$text', 
                        po_image = '$img'
                    WHERE  po_id = '$po_id'";
        }

        $res_1 = mysqli_query($conn, $sql_1);

       ?>
<script>
location.href = 'home_page.php?us_id=<?php echo $us_id;?>';
</script>
<?php
    }
}    
?>