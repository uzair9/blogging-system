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
        include "Includes/navigation.php";?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome, Uzair!
                            <small> (Posts) </small>
                        </h1>
                        <?php
                            if (isset($_GET["source"]))
                            {
                                $source = $_GET["source"];
                                
                                if ($source == "add_post")
                                    include "add_post.php";
                                else if ($source == "edit_my_post")
                                    include "edit_my_post.php";
                                else
                                    include "view_posts.php";
                            }
                            else
                                $source = "";
                        ?>
                        <div class="col-xs-6">
                        </div>
                        <div class="col-xs-6">
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <?php 
        }
            else
            {
                header("Location: ../../Login Template/Index.php");
            }
        }
    include "Includes/footer.php"; ?>