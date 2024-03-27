<?php
session_start();
if(!isset($_SESSION['usercheck'])){
    header("Location: ../../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đề tài 15</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style_profile_uses.css">
</head>

<body class="bg-primary">

    <div class="container rounded bg-white mt-5 mb-5">
            <div class="row">
                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img
                            class="rounded-circle mt-5" width="150px"
                            src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span>
                    </div>
                </div>

                <div class="col-md-5 border-right">
                    <div class="p-3 py-5">

                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Profile</h4>
                        </div>

                        <?php
                    $conn = mysqli_connect('localhost','root','','web');

                    $us_id = $_GET['us_id'];

                    $sql = "SELECT * FROM users WHERE us_id = '$us_id'";

                    $res = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($res)==1){

                    $row = mysqli_fetch_assoc($res);

                    $id = $row['us_id'];
                    $name = $row['us_fullname'];
                    $gt = $row['us_gender'];
                    $date = $row['us_DOB'];
                    $phone = $row['us_phone'];
                    $email = $row['us_email'];
                    $addr = $row['us_address'];
                    $time = $row['us_create'];
                    }

                    ?>
                        <div class="row mt-3">

                            <div class="col-md-12 pro" style="border-bottom:1px solid black;"><label class="labels">Fullname: </label>
                                <h5><?php echo $name; ?></h5>
                            </div>

                            <div class="col-md-12 pro" style="border-bottom:1px solid black;"><label class="labels">Gender:</label>
                                <h5><?php echo $gt; ?></h5>
                            </div>

                            <div class="col-md-12 pro" style="border-bottom:1px solid black;"><label class="labels">Date of birth:</label>
                                <h5><?php echo $date; ?></h5>
                            </div>

                            <div class="col-md-12 pro" style="border-bottom:1px solid black;"><label class="labels">Phone Number:</label>
                                <h5>0<?php echo $phone; ?></h5>
                            </div>

                            <div class="col-md-12 pro" style="border-bottom:1px solid black;"><label class="labels">Email:</label>
                                <h5><?php echo $email; ?></h5>
                            </div>

                            <div class="col-md-12 pro" style="border-bottom:1px solid black;"><label class="labels">Address:</label>
                                <h5><?php echo $addr; ?></h5>
                            </div>

                            <div class="col-md-12 pro" style="border-bottom:1px solid black;"><label class="labels">Date Created:</label>
                                <h5><?php echo $time; ?></h5>
                            </div>
                        </div>

                        <div class="mt-5 text-center">
                            <a href="edit_profile_user.php?us_id=<?php echo $us_id; ?>" class="btn btn-primary text-white">Edit
                                Profile</a>
                            
                            <a href="../home_page/home_page.php?us_id=<?php echo $us_id; ?>" class="btn btn-primary text-white">Back</a>
                        </div>

                    </div>
                </div>

                <div class="col-md-4">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center experience"><span>Edit
                                Experience</span><span class="border px-3 p-1 add-experience"><i
                                    class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
                        <div class="col-md-12"><label class="labels">Experience in Designing</label><input type="text"
                                class="form-control" placeholder="experience" value=""></div> <br>
                        <div class="col-md-12"><label class="labels">Additional Details</label><input type="text"
                                class="form-control" placeholder="additional details" value=""></div>
                    </div>
                </div>
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