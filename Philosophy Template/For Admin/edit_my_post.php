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
                            <small> (Posts &rarr; Edit Post) </small>
                        </h1>
                        <?php
                                }
                                else
                                {
                                    header("Location: ../../Login Template/Index.php");
                                }
                            }
                        ?>
                        <?php
                                
                            if (isset($_GET["edit_this_post"]))
                            {
                                $extracted_post_ID = $_GET["edit_this_post"];
                                $select_query = "SELECT * FROM posts_table WHERE post_id = $extracted_post_ID";
                                $select_query_is_successful = mysqli_query($is_connected, $select_query);

                                if ($select_query_is_successful)
                                {
                                    while ($one_row = mysqli_fetch_assoc($select_query_is_successful))
                                    {
                                        $post_title_update = $one_row["post_title"];
                                        $post_category_ID_update = $one_row["post_cat_id"];
                                        $post_author_update = $one_row["post_author"];
                                        $post_status_update = $one_row["post_status"];
                                        $post_tags_update = $one_row["post_tags"];
                                        $post_content_update = $one_row["post_content"];
                                        $post_image_update = $one_row["post_image"];
                                    }
                                }
                                else 
                                {
                                    echo "Database reading failed";
                                }
                            }
                                
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
                                
                                $update_query = "UPDATE posts_table SET ";
                                $update_query .= "post_cat_id = {$post_category_ID}, ";
                                $update_query .= "post_title = '{$post_title}', ";
                                $update_query .= "post_author = '{$post_author}', ";
                                $update_query .= "post_image = '{$post_image}', ";
                                $update_query .= "post_content = '{$post_content}', ";
                                $update_query .= "post_status = '{$post_status}', ";
                                $update_query .= "post_tags = '{$post_tags}', ";
                                $update_query .= "post_title = '{$post_title}', ";
                                $update_query .= "post_date = now()";
                                $update_query .= "WHERE post_id = {$extracted_post_ID}";

                                $is_updated = mysqli_query($is_connected, $update_query);
                                if (!$is_updated)
                                {
                                    ?>
                                            <script>
                                                alert("Post Updation Failed!");
                                            </script>
                                        <?php
                                }
                                else 
                                {
                                    ?>
                                        <script>
                                            alert("Post Updated Successfully!");
                                        </script>
                                    <?php
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
                                <input type="text" class="form-control" name="title" value = "<?php echo $post_title_update; ?>">
                            </div>

                            <div class="form-group">
                                <label for="post_category"> Post Category ID </label>
                                <input type="text" class="form-control" name="post_cat_ID" value = "<?php echo $post_category_ID_update; ?>">
                            </div>

                            <div class="form-group">
                                <label for="post_author"> Post Author </label>
                                <input type="text" class="form-control" name="author" value = "<?php echo $post_author_update; ?>">
                            </div>

                            <div class="form-group">
                                <label for="post_status"> Post Status </label>
                                <input type="text" class="form-control" name="status" value = "<?php echo $post_status_update; ?>">
                            </div>

                            <div class="form-group">
                                <label for="post_tags"> Post Tags </label>
                                <input type="text" class="form-control" name="post_tags" value = "<?php echo $post_tags_update; ?>">
                            </div>

                            <div class="form-group">
                                <label for="post_content"> Post Content </label>
                                <textarea type="text" name="post_content" class="form_control" rows="3">
                                    <?php echo $post_content_update; ?>
                                </textarea>
                            </div>

                            <div class="form-group">
                                <label for="post_image"> Post Image <small> (Tip: Make sure that the image is downloaded
                                        / stored in the rigth directory) </small> </label>
                                <input type="file" name="image"value = "<?php echo $post_image_update; ?>">
                            </div>

                            <div class="form-group">
                                <?php 
                                    if (isset($_SESSION["user_role"]))
                                    {
                                        if ($_SESSION["user_role"] == "Admin")
                                        {
                                            ?>
                                                <input class="btn btn-primary" type="submit" name="create_post" value="Update Post">
                                            </div>
                                    <?php 
                                        }
                                    }
                                    ?>
                            </div>

                        </form>
                                <?php }} ?>
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