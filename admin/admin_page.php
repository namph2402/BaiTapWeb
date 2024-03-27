<?php
session_start();
if(!isset($_SESSION['logincheck'])){
    header("Location: ../index.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Admin</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/f75b956e9a.js" crossorigin="anonymous"></script>
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
    <link href="./assets/demo/demo.css" rel="stylesheet" />
</head>

<body>

    <?php

    $ad_id = $_GET['ad_id'];

    $conn = mysqli_connect('localhost','root','','web');

    $sql = "SELECT * FROM admins WHERE ad_id = $ad_id";
    $res = mysqli_query($conn, $sql);

    $sql_1 = "SELECT * FROM users";
    $res_1 = mysqli_query($conn, $sql_1);

    $sql_2 = "SELECT p.po_id, p.po_title, p.po_create, u.us_fullname
              FROM posts p, users u
              WHERE u.us_id = p.us_id";
    $res_2 = mysqli_query($conn, $sql_2);

    ?>

    <div class="wrapper">

        <!-- Logo and admin_name -->
        <div class="sidebar" data-color="white" data-active-color="danger">
            <div class="logo"> 
            <a href="#" class="simple-text logo-mini">
                    <div class="logo-image-small">
                        <img src="./assets/img/logo-small.png">
                    </div>
                </a>

                <a href="#" class="simple-text logo-normal">                   
                <?php
                $admin = mysqli_fetch_assoc($res)['ad_fullname'];
                echo $admin;
                ?>
                </a>
            </div>

            <!-- list  -->
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="">
                    <!-- active -->
                        <a href="#">
                            <i class="nc-icon nc-bank"></i>
                            <p>ALL</p>
                        </a>
                    </li>
                    <li>
                        <a href="#all_user">
                            <i class="nc-icon nc-single-02"></i>
                            <p>ALL USER</p>
                        </a>
                    </li>
                    <li>
                        <a href="#all_post">
                            <i class="nc-icon nc-diamond"></i>
                            <p>ALL POST</p>
                        </a>
                    </li>
                    <li>
                        <a href="#contact">
                            <i class="nc-icon nc-caps-small"></i>
                            <p>CONTACT</p>
                        </a>
                    </li>
                    <li class="active-pro" style="margin-bottom:20px;">
                        <a href="confrim.php?ad_id=<?php echo $ad_id;?>">
                            <i class="nc-icon nc-spaceship"></i>
                            <p>Log Out</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="main-panel ad">
            <div class="content" style="margin-top: 20px;">
                <div class="row">

                    <!-- ALL USERS -->
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-5 col-md-4">
                                        <div class="icon-big text-center icon-warning">
                                            <i class="fa fa-user"></i>
                                        </div>
                                    </div>
                                    <div class="col-7 col-md-8">
                                        <div class="numbers">
                                            <p class="card-category">All User</p>
                                            <p class="card-title">
                                                <!-- Số người dùng -->
                                                <?php 
                                            $count_1 = mysqli_num_rows($res_1);
                                            echo $count_1;
                                            ?>

                                            <p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <hr>
                                <div class="stats">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ALL POST -->
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-5 col-md-4">
                                        <div class="icon-big text-center icon-warning">
                                            <i class="fa fa-newspaper"></i>
                                        </div>
                                    </div>
                                    <div class="col-7 col-md-8">
                                        <div class="numbers">
                                            <p class="card-category">All Post</p>
                                            <p class="card-title">

                                                <!-- Số bài viết -->
                                                <?php
                                            $count_2 = mysqli_num_rows($res_2);
                                            echo $count_2;
                                            ?>

                                            <p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <hr>
                                <div class="stats">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- USERS -->
                <div class="row" id="all_user">
                    <div class="col-md-12">
                        <div class="card">

                            <div class="card-header ">
                                <h5 class="card-title">All User</h5>
                            </div>

                            <div class="card-body ">
                                    <table class="table">

                                        <thead>
                                            <tr>
                                                <th scope="col">Full Name</th>
                                                <th scope="col">Gender</th>
                                                <th scope="col">Date of birth</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Phone</th>
                                                <th scope="col">Address</th>
                                                <th scope="col">Date Created</th>
                                                <th scope="col">###</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                   
                                             if(mysqli_num_rows($res_1)>0)
                                            {
                                             while($row = mysqli_fetch_assoc($res_1)){
                                              $us_id = $row['us_id'];
                                              $name = $row['us_fullname'];
                                              $gen = $row['us_gender'];
                                              $date = $row['us_DOB'];
                                              $email = $row['us_email'];
                                              $phone = $row['us_phone'];
                                              $addr = $row['us_address'];
                                              $create = $row['us_create'];
                                              ?>
 
                                            <tr>
                                                <td><?php echo $name;?></td>
                                                <td><?php echo $gen;?></td>
                                                <td><?php echo $date;?></td>
                                                <td><?php echo $email;?></td>
                                                <td>0<?php echo $phone;?></td>
                                                <td><?php echo $addr;?></td>
                                                <td><?php echo $create;?></td>
                                                <td><a href="delete_user.php?us_id=<?php echo $us_id;?>&ad_id=<?php echo $ad_id;?>" class="text-danger"><h5>xóa</h5></i></a> </td>
                                            </tr>
                                            <?php  
                                           }
                                          } 
                                          ?>
                                        </tbody>

                                    </table>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>


                <!-- POST -->
              <div class="row" id="all_post">

                    <div class="col-md-12">
                        <div class="card">
                        <div class="card-header">
                                <h5 class="card-title">All Post</h5>                                
                        </div>
                            <div class="card-body ">

                                     <table class="table tbl">
                                        <thead>
                                            <tr>
                                                <th scope="col">Post Title</th>
                                                <th scope="col">Date Created</th>
                                                <th scope="col">creator</th>
                                                <th scope="col">###</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                   
                                             if(mysqli_num_rows($res_2)>0)
                                            {
                                             while($row = mysqli_fetch_assoc($res_2)){
                                              $po_id = $row['po_id'];
                                              $po_title = $row['po_title'];
                                              $po_date = $row['po_create'];
                                              $us_name = $row['us_fullname'];
                                              ?>
 
                                            <tr>
                                                <td><h4><?php echo $po_title;?></h4></td>
                                                <td><?php echo $po_date;?></td>
                                                <td><?php echo $us_name;?></td>
                                                <td><a href="delete_post.php?po_id=<?php echo $po_id;?>&ad_id=<?php echo $ad_id;?>" class="text-danger"><h5>xóa</h5></i></a> </td>
                                            </tr>
                                            <?php  
                                           }
                                          } 
                                          ?>
                                        </tbody>
                                    </table>

                            </div>
                            <hr>
                        </div>
                    </div>                  
              </div>
                
            </div>
            <footer class="footer footer-black  footer-white " id="contact">
            <div class="d-flex justify-content-center">
          <h2>Làm gì còn gì đâu mà xem, mời hảo hán cuộn lên</h2>
        </div>
            </footer>
        </div>
    </div>

    <!--   Core JS Files   -->
    <script src="./assets/js/core/jquery.min.js"></script>
    <script src="./assets/js/core/popper.min.js"></script>
    <script src="./assets/js/core/bootstrap.min.js"></script>
    <script src="./assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chart JS -->
    <script src="./assets/js/plugins/chartjs.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="./assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="./assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script>
    <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="./assets/demo/demo.js"></script>
    <script>
    $(document).ready(function() {
        // Javascript method's body can be found i assets/assets-for-demo/js/demo.js
        demo.initChartsPages();
    });
    </script>
</body>

</html>
