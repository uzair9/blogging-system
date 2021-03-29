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
                            <small> (Posts &rarr; Create New Posts) </small>
                        </h1>
                        <?php
                                }
                            }
                        ?>
                        <?php
                                if (isset($_POST["create_post"]))
                                {
                                    $post_title = $_POST["title"];
                                    $post_category_ID = $_POST["post_cat_ID"];
                                    $post_author = $_POST["author"];
                                    $post_status = $_POST["status"];
                                    $post_image = $_FILES['image']['name'];
                                    $post_image_temp = $_FILES['image']['name'];
                                    $post_tags = $_POST["post_tags"];
                                    $post_content = $_POST["post_content"];
                                    $post_date = date("d-m-y");
                                    $post_comment_count = 0;

                                    move_uploaded_file($post_image_temp, "../Non-Admin Resources/Images/$post_image");
                                    
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
                                                now(), '{$post_image}', '{$post_content}', 
                                                '{$post_tags}', {$post_comment_count}, '{$post_status}'
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
                                    else {
                                        {
                                            ?>
                                                <script>
                                                    alert("Post Created Successfully!");
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
                                <label for="title"> Post Title </label>
                                <input type="text" class="form-control" name="title">
                            </div>

                            <div class="form-group">
                                <label for="post_category"> Post Category ID </label>
                                <input type="text" class="form-control" name="post_cat_ID" placeholder="Available Categories:
                                            <?php $query_send = mysqli_query($is_connected, "SELECT * FROM categories_table");
                                                while ($each_row = mysqli_fetch_assoc($query_send))
                                                {
                                                    $cat_ID = $each_row['cat_ID'];
                                                    $cat_title = $each_row['cat_title'];
                                                    echo $cat_ID, ")  ", $cat_title, "   |   ";
                                                }
                                            ?>">
                            </div>

                            <div class="form-group">
                                <label for="post_author"> Post Author </label>
                                <input type="text" class="form-control" name="author">
                            </div>

                            <div class="form-group">
                                <label for="post_status"> Post Status </label>
                                <input type="text" class="form-control" name="status">
                            </div>

                            <div class="form-group">
                                <label for="post_tags"> Post Tags </label>
                                <input type="text" class="form-control" name="post_tags" placeholder="Put Post Tags Like This: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Tag_1 | Tag_2 | Tag_3">
                            </div>

                            <div class="form-group">
                                <label for="post_content"> Post Content </label>
                                <textarea type="text" name="post_content" class="form_control" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="post_image"> Post Image <small> (Tip: Make sure that the image is downloaded
                                        / stored in the rigth directory) </small> </label>
                                <input type="file" name="image">
                            </div>

                            <div class="form-group">
                                <?php 
                                    if (isset($_SESSION["user_role"]))
                                    {
                                        if ($_SESSION["user_role"] == "Admin")
                                        {
                                            ?>
                                                <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
                                            </div>
                                    <?php      
                                        }
                                    }
                                    ?>
                            </div>

                        </form>
                                <?php }
                                else
                                {
                                    header("Location: ../../Login Template/Index.php");
                                }
                            } ?>
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
    <?php include "Includes/footer.php"; ?>