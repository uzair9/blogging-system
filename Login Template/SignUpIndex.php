<?php
    include "db.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title> Sign Up </title>
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

    <!-- 
        Below is a form from where we extract:
        1. First name
        2. Second (last) name
        3. Email address
        4. The username they creaete (we don't check for username's availablity). The general conception is that the usernames shall never collide
        5. The password (passwords can collide (doesn't matter))
    -->

    <div class="limiter">
        <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
            <div class="wrap-login100 p-t-30 p-b-50">
                <span class="login100-form-title p-b-41">
                    Account Sign Up
                </span>
                <form class="login100-form validate-form p-b-33 p-t-5" method = "post">

                    <div class="wrap-input100 validate-input" data-validate="Your First Name">
                        <input class="input100" type="text" name="first_name" placeholder="Your First Name">
                        <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Your Last Name">
                        <input class="input100" type="text" name="last_name" placeholder="Your Last Name">
                        <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter email">
                        <input class="input100" type="text" name="email_address" placeholder="Your Email Address">
                        <span class="focus-input100" data-placeholder="&#xe968;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter username">
                        <input class="input100" type="text" name="user_name" placeholder="Create Your Username">
                        <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <input class="input100" type="password" name="passcode" placeholder="Create Your Password">
                        <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                    </div>

                    <div class="container-login100-form-btn m-t-32">
                        <button class="login100-form-btn" name = "sign_me_up">
                            Sign Up
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <?php
        if (isset($_POST["sign_me_up"]))
        {
            $obtained_fname = mysqli_real_escape_string($is_connected, trim($_POST["first_name"]));
            $obtained_lname = mysqli_real_escape_string($is_connected, trim($_POST["last_name"]));
            $obtained_email = mysqli_real_escape_string($is_connected, trim($_POST["email_address"]));
            $obtained_username = $_POST["user_name"];
            $obtained_password = $_POST["passcode"];

            /*
                Using real_escap_string which clears up the special characters by adding backslash before them
                Afterwards, we are encrypting the password
                Then, we make the database query (every user that signs up becomes a subscriber by default (hard coding))
            */

            $obtained_username = mysqli_real_escape_string($is_connected, trim($obtained_username));
            $password_with_special_characters = mysqli_real_escape_string($is_connected, trim($obtained_password));
            $hash_format = "$2y$10$";
            $salt = "4e1..Spdfhi3ra8za/wkw7";
            $concatenate = $hash_format . $salt;
            $encrypted_password = crypt($password_with_special_characters, $concatenate);
        
            $write_query = "INSERT INTO users_table(user_name, user_password, user_first_name, user_last_name, user_email, user_image, role, rand_salt)";
            $write_query .= "VALUES('{$obtained_username}', '{$encrypted_password}', '{$obtained_fname}', '{$obtained_lname}', '{$obtained_email}', '', 'Subscriber', '')";
            
            $is_successful = mysqli_query($is_connected, $write_query);

            if (!$is_successful)
                {
                    ?>
                        <script>
                            alert("Sign Up Failed! Please try again later or contact us at uzair9990@gmail.com")
                        </script>
                    <?php
                }
            else
            {
                ?>
                <script>
                    alert("Sign Up Sucessful! Sign In to Continue ...");
                </script>
                
                <?php
            }
        }
    ?>

    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>

</body>

</html>
