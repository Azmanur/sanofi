<?php
session_start();
error_reporting(0);
include('include/config.php');

//Sign Up 
if (isset($_POST['submit'])) {
    $username = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $token = bin2hex(random_bytes(15));

    $query = mysqli_query($con, "insert into admin(username,email,password,token) values('$username','$email','$password','$token')");

    if ($query) {
        header("location:index.php");
    } else {
        echo "<script>alert('Something went worng, try again');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin| Sign Up</title>
    <?php include('include/links.php') ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Checking password and confirm password -->
    <script type="text/javascript">
        function valid() {
            if (document.register.password.value != document.register.con_password.value) {
                alert("Password and Confirm Password Field do not match  !!");
                document.register.con_password.focus();
                return false;
            }
            return true;
        }
    </script>

    <!-- Checking User Availability -->
    <script>
        function userAvailability() {
            $("#loaderIcon").show();
            jQuery.ajax({
                url: "check_availability.php",
                data: 'email=' + $("#email").val(),
                type: "POST",
                success: function(data) {
                    $("#user-availability-status1").html(data);
                    $("#loaderIcon").hide();
                },
                error: function() {}
            });
        }
    </script>
</head>

<body>
    <?php include('includes/header.php') ?>

    <!-- Login Form -->
    <div class="global-container">
        <div class="card login-form">
            <div class="card-body">
                <h3 class="card-title text-center">Sign Up To Sanofi</h3>
                <div class="card-text">

                    <form role="form" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" name="register" onSubmit="return valid();">
                        <!-- to error: add class "has-danger" -->
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" class="form-control form-control-sm" id="name" name="name" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control form-control-sm" id="email" name="email" onBlur="userAvailability()" required>
                            <span id="user-availability-status1" style="font-size:12px;"></span>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control form-control-sm" id="password" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="con_password">Confirm Password</label>
                            <input type="password" name="con_password" class="form-control form-control-sm" id="con_password" required>
                        </div>
                        <button type="submit" name="submit" style="background-color: #223A66; color: aliceblue;" class="btn btn-block">Sign up</button>

                        <div class="sign-up">
                            Already Have an account? <a href="login.php">Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <?php include('include/scripts.php') ?>
</body>

</html>