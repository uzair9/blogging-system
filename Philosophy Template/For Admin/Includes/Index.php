<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title> Admin </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
            <div class="wrap-login100 p-t-30 p-b-50">
                <span class="login100-form-title p-b-41">
                    Admin Access
                </span>
                <form class="login100-form validate-form p-b-33 p-t-5" method="post">
                    <div class="wrap-input100 validate-input" data-validate="Enter full name">
                        <input autofocus class="input100" type="text" name="admin_username" placeholder="Admin Username">
                        <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <input class="input100" type="password" name="passcode" placeholder=" Admin Password">
                        <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                    </div>
                    <div class="container-login100-form-btn m-t-32">
                        <button class="login100-form-btn" name="set">
                            Go!
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
		include "../Login Template/db.php";
		
		if (isset($_POST["set"]))
		{
			$obtained_username = $_POST["admin_username"];
            $obtained_password = $_POST["passcode"];
            
            $password_with_special_characters = mysqli_real_escape_string($is_connected, $obtained_password);
            $hash_format = "$2y$10$";
            $salt = "4e1..Spdfhi3ra8za/wkw7";
            $concatenate = $hash_format . $salt;
            $obtained_encrypted_password = crypt($password_with_special_characters, $concatenate);
		}
        else
        {
			die();
        }
        
        $admin_query = mysqli_query($is_connected, "SELECT * FROM users_table WHERE role = 'Admin' AND user_name = '{$obtained_username}'");
		while ($one_row = mysqli_fetch_assoc($admin_query))
		{
            $DB_username = $one_row["user_name"];
            $DB_password = $one_row["user_password"];
            $DB_fname = $one_row["user_first_name"];
            $DB_lname = $one_row["user_last_name"];
            $DB_role = $one_row["role"];
        }

        if ($obtained_encrypted_password == $DB_password && $obtained_username == $DB_username)
        {
            $_SESSION["username"] = $DB_username;
            $_SESSION["first_name"] = $DB_fname;
            $_SESSION["last_name"] = $DB_lname;
            $_SESSION["user_role"] = $DB_role;

            header("Location: ../Philosophy Template/For Admin/Index.php");
        }
			
        else
        {
			die();
        }
	?>

    <!-- <div id="dropDownSelect1"></div>
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <script src="vendor/countdowntime/countdowntime.js"></script>
    <script src="js/main.js"></script> -->

</body>

</html>