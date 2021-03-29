<?php include "db.php"; ?>
<?php ob_start(); ?>

<!DOCTYPE html>
<html lang="en">
<?php include "Includes/header.php"; ?>

<body>
    <div id="wrapper">
    <?php
        if (isset($_SESSION["user_role"]))
        {
            if ($_SESSION["user_role"] == "Admin")
            {
    ?>    
    <?php include "Includes/navigation.php";?>
            
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                        <strong> <?php echo $_SESSION["first_name"]; echo " ", $_SESSION["last_name"] ?> </strong>
                            <small> (Users &rarr; Add New Users) </small>
                        </h1>
                        <?php } 
                            else
                            {
                                header("Location: ../../Login Template/Index.php");
                            }
                        } ?>
                        <?php
                                if (isset($_POST["create_user"]))
                                {
                                    $obtained_user_fname = $_POST["user_firstname"];
                                    $obtained_user_lname = $_POST["user_lastname"];
                                    $obtained_username = $_POST["username"];
                                    $obtained_role = $_POST["user_role"];
                                    $obtaind_email = $_POST["user_email"];
                                    $obtained_password = $_POST["user_password"];
                                    
                                    $password_with_special_characters = mysqli_real_escape_string($is_connected, $obtained_password);
                                    $hash_format = "$2y$10$";
                                    $salt = "4e1..Spdfhi3ra8za/wkw7";
                                    $concatenate = $hash_format . $salt;
                                    $obtained_password = crypt($password_with_special_characters, $concatenate);
                                    
                                    $insert_query =
                                        "INSERT INTO users_table
                                                                (
                                                                    user_name, user_password, 
                                                                    user_first_name, user_last_name, user_email, 
                                                                    user_image, role, rand_salt
                                                                )";
                                        $insert_query .=
                                        "VALUES
                                                (
                                                    '{$obtained_username}', '{$obtained_password}', '{$obtained_user_fname}',
                                                    '{$obtained_user_lname}', '{$obtaind_email}', '',
                                                    '{$obtained_role}', ''
                                                )";
                                        $is_inserted = mysqli_query($is_connected, $insert_query);
                                    
                                    if (!$is_inserted)
                                    {
                                        ?>
                                            <script>
                                                alert("Could Not Add New User");
                                            </script>
                                        <?php
                                    }
                                    else {
                                        {
                                            ?>
                                                <script>
                                                    alert("New User Added");
                                                </script>
                                            <?php
                                        }
                                    }
                                }
                        ?>
                        <?php
                            if (isset($_SESSION["user_role"]))
                            {
                                if ($_SESSION["user_role"] == "Admin")
                                {
                        ?>
                        <form action="" method="post" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="post_author"> User First Name </label>
                                <input type="text" class="form-control" name="user_firstname">
                            </div>

                            <div class="form-group">
                                <label for="post_status"> User Last Name </label>
                                <input type="text" class="form-control" name="user_lastname">
                            </div>

                            <div class="form-group">
                                <label for="post_tags"> Username </label>
                                <input type="text" class="form-control" name="username">
                            </div>

                            <div class="form-group">
                                <label for="post_tags"> User Role </label>
                                <input type="text" class="form-control" name="user_role"
                                    placeholder="Sub OR Admin ( for new subscriber OR admin )">
                            </div>

                            <div class="form-group">
                                <label for="post_content"> User Email </label>
                                <input type="text" class="form-control" name="user_email">
                            </div>

                            <div class="form-group">
                                <label for="post_content"> User Password </label>
                                <input type="text" class="form-control" name="user_password">
                            </div>

                            <div class="form-group">
                                <?php 
                                    if (isset($_SESSION["user_role"]))
                                    {
                                        if ($_SESSION["user_role"] == "Admin")
                                        {
                                            ?>
                                                <input class="btn btn-primary" type="submit" name="create_user" value="Add User">
                                            </div>
                                    <?php      
                                        }
                                    }
                                    ?>
                        </form>
                        <?php
                                }
                            }
                        ?>
    
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <?php include "Includes/footer.php"; ?>