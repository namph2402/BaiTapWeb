<?php
include "./header_file.php";
?>

    <div class="container-fluid vh-100">
        <div class="" style="margin-top:200px">
            <div class="rounded d-flex justify-content-center">
                <div class="col-md-6 col-sm-12 shadow-lg p-5 bg-light">
                    <div class="text-center">
                        <h1 class="text-primary">Sign In</h1>
                    </div>
                    <form action="sign_in_process.php" method="POST">
                        <div class="p-4">
                            <div class="input-group mb-4">
                                <span class="input-group-text bg-primary"><i
                                        class="bi bi-person-plus-fill text-white"></i></span>
                                <input type="text" class="form-control" placeholder="Username" name="txtAccount">
                            </div>
                            <div class="input-group mb-4">
                                <span class="input-group-text bg-primary"><i
                                        class="bi bi-key-fill text-white"></i></span>
                                <input type="password" class="form-control" placeholder="Password" name="txtPasswd">
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Remember Me
                                </label>
                            </div>
                            <button class="btn btn-primary text-center mt-4 col-md-12" type="submit" name="btnLogin">Login</button>
                            <p class="text-center mt-5">Don't have an account?
                                <a href="./member/sign_up/sign_up.php" class="text-primary">Sign Up</a>
                            </p>
                            <p class="text-center text-primary">Forgot your password?</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php
include "./footer_file.php";
?>