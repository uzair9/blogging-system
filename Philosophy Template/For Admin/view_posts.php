<?php 
    include "db.php"; 
    include "Includes/header.php";
    include "delete_posts.php";
    ob_start();
?>

<!-- <form method="post"> -->

<!-- </form> -->

<?php
    if (isset($_SESSION["user_role"]))
    {
        if ($_SESSION["user_role"] == "Admin")
        {
?>

<!DOCTYPE html>
<html lang="en">
<?php  ?>

<body>
    <div id="wrapper">
        <?php include "Includes/navigation.php";?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <strong> <?php echo $_SESSION["first_name"]; echo " ", $_SESSION["last_name"] ?> </strong>
                            <small> (Posts &rarr; View All Posts) </small>
                        </h1>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th> ID </th>
                                    <th> AUTHOR </th>
                                    <th> TITLE </th>
                                    <th> CATEGORY </th>
                                    <th> STATUS </th>
                                    <th> IMAGE </th>
                                    <th> TAGS </th>
                                    <th> COMMENTS </th>
                                    <th> DATE </th>
                                    <th> ACTION </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                        $read_query = "SELECT * FROM posts_table";
                                        $is_read = mysqli_query($is_connected, $read_query);
                                        while ($each_row = mysqli_fetch_assoc($is_read))
                                        {
                                            $obtained_ID = $each_row["post_id"];
                                            $obtained_author = $each_row["post_author"];
                                            $obtained_title = $each_row["post_title"];
                                            $obtained_cat_id = $each_row["post_cat_id"];
                                            $obtained_status = $each_row["post_status"];
                                            $obtained_image = $each_row["post_image"];
                                            $obtained_tags = $each_row["post_tags"];
                                            $obtained_comment_count = $each_row["post_comment_count"];
                                            $obtained_date = $each_row["post_date"];

                                            echo
                                            "<td> $obtained_ID </td>
                                            <td> $obtained_author </td>
                                            <td> $obtained_title </td>";
                                            $query_send = mysqli_query($is_connected, "SELECT * FROM categories_table WHERE cat_ID = {$obtained_cat_id}");
                                            while ($each_row = mysqli_fetch_assoc($query_send))
                                            {
                                                $cat_ID = $each_row['cat_ID'];
                                                $cat_title = $each_row['cat_title'];
                                            }
                                            echo
                                            "<td> $obtained_cat_id) $cat_title </td>
                                            <td> $obtained_status </td>
                                            <td> <img width = '150' class = 'img-responsive' src = '../For Admin/Images/$obtained_image'> </td>
                                            <td> $obtained_tags </td>
                                            <td> $obtained_comment_count </td>
                                            <td> $obtained_date </td>
                                            <td> 
                                                <a href = 'view_posts.php?delete={$obtained_ID}'> Delete Post </a> |
                                                <a href = 'edit_my_post.php?edit_this_post={$obtained_ID}'> Edit Post </a>
                                            </td>";
                                            ?> </tr>
                                <?php
                                        }
                                    ?>
                                </tr>
                            </tbody>
                        </table>
                        <?php
                            if (isset($_GET["delete"]))
                            {
                                if (isset($_SESSION["user_role"]))
                                {
                                    if ($_SESSION["user_role"] == "Admin")
                                    {
                                        $delete_post_ID = $_GET["delete"];
                                        $delete_query = "DELETE FROM posts_table WHERE post_id = {$delete_post_ID}";
                                        $is_deleted = mysqli_query($is_connected, $delete_query);
                                        header("Location: view_posts.php");
                                    }
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

    <?php
            }
            else
            {
                header("Location: ../../Login Template/Index.php");
            }
        }
    ?>