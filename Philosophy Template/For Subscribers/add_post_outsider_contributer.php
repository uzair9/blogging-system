<!DOCTYPE html>
<html lang="en">

<?php
    ob_start();
    include "db.php";
    session_start();
    include "Includes/header.php";

    if (isset($_SESSION["user_role"]))
    {
        if ($_SESSION["user_role"] == "Subscriber")
        {
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Add New Posts </title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-fixed-top" role="navigation">
            <div class="navbar-header">
            </div>
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"> </i> &nbsp;
                        <?php echo $_SESSION["first_name"]; echo " ", $_SESSION["last_name"]?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="Includes/logout_.php"><i class="fa fa-fw fa-power-off"></i> Log Out </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>

        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <strong> Welcome,
                                <?php echo $_SESSION["first_name"]; echo " ", $_SESSION["last_name"], "!" ?> </strong>
                            <small> (Add New Posts) </small>
                        </h1>
                        <?php
                                if (isset($_POST["create_post"]))
                                {
                                    $post_title = mysqli_real_escape_string($is_connected, trim($_POST["title"]));
                                    $post_category_ID = mysqli_real_escape_string($is_connected, trim($_POST["post_cat_ID"]));
                                    $post_author = mysqli_real_escape_string($is_connected, trim($_POST["author"]));
                                    $post_image = mysqli_real_escape_string($is_connected, trim($_FILES['image']['name']));
                                    $post_image_temp = mysqli_real_escape_string($is_connected, trim($_FILES['image']['name']));
                                    $post_tags = mysqli_real_escape_string($is_connected, trim($_POST["post_tags"]));
                                    $post_content = mysqli_real_escape_string($is_connected, trim($_POST["post_content"]));
                                    $post_date = mysqli_real_escape_string($is_connected, trim(date("d-m-y")));
                                    $post_comment_count = 0;

                                    move_uploaded_file($post_image_temp, "Images/$post_image");
                                    
                                    $insert_query =
                                    "INSERT INTO posts_table
                                                            (
                                                                post_title, post_cat_id, post_author, 
                                                                post_date, post_image, post_content, 
                                                                post_tags, post_comment_count, post_status
                                                            )";
                                    $insert_query .=
                                    "VALUES
                                            (
                                                '{$post_title}', {$post_category_ID}, '{$post_author}', 
                                                now(), '${post_image}', '{$post_content}', 
                                                '{$post_tags}', {$post_comment_count}, 'Draft'
                                            )";
                                    $is_inserted = mysqli_query($is_connected, $insert_query);
                                    if (!$is_inserted)
                                    {
                                        ?>
                                            <script>
                                                alert("Post Creation Failed!");
                                            </script>

                                        <?php 
                                    }
                                    else
                                    {

                                        ?>
                                            <script>
                                                alert("Post Successfully Created & Sent for Admin Approval");
                                            </script>
                                        <?php 
                                    }
                                }
                            ?>
                        <form action="" method="post" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="title"> Post Title </label>
                                <input type="text" class="form-control" name="title"
                                    placeholder="Write Post Title Here">
                            </div>

                            <div class="form-group">
                                <label for="post_category"> Post Category ID </label>
                                <input type="text" class="form-control" name="post_cat_ID" placeholder="Available Categories:
                                            <?php $query_send = mysqli_query($is_connected, "SELECT * FROM categories_table");
                                                while ($each_row = mysqli_fetch_assoc($query_send))
                                                {
                                                    $cat_ID = $each_row['cat_ID'];
                                                    $cat_title = $each_row['cat_title'];
                                                    echo "Type ", $cat_ID, " for ", $cat_title, "   |   ";
                                                }
                                            ?>">
                            </div>

                            <div class="form-group">
                                <label for="post_author"> Post Author </label>
                                <input type="text" class="form-control" name="author" placeholder="Your Full Name">
                            </div>

                            <div class="form-group">
                                <label for="post_tags"> Post Tags </label>
                                <input type="text" class="form-control" name="post_tags"
                                    placeholder="Separate the Post Tags Like This: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Tag_1 | Tag_2 | Tag_3">
                            </div>

                            <div class="form-group">
                                <label for="post_content"> Post Content </label>
                                <textarea type="text" name="post_content" class="form_control" rows="3"
                                    placeholder="Enter the Blog Text here"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="post_image"> Post Image <small> (Tip: Make sure that the image is downloaded
                                        / stored in the rigth directory) </small> </label>
                                <input type="file" name="image">
                            </div>

                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="create_post" value="Send Post for Admin Approval">
                            </div>

                        </form>
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