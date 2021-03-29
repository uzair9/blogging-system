<?php 
    include "db.php"; 
    include "Includes/header.php";
    include "delete_posts.php";
    ob_start();
?>

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
                            <small> (Comments) </small>
                        </h1>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th> COMMENT ID </th>
                                    <th> COMMENT POST ID </th>
                                    <th> COMMENT AUTHOR </th>
                                    <th> COMMENTERS EMAIL </th>
                                    <th> COMMENT CONTENT </th>
                                    <th> POST NAME </th>
                                    <th> APPROVAL STATUS </th>
                                    <th> COMMENTING DATE </th>
                                    <th> COMMENT ACTION </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                        $read_query = "SELECT * FROM comments_table ORDER BY comment_ID DESC";
                                        $is_read = mysqli_query($is_connected, $read_query);
                                        while ($each_row = mysqli_fetch_assoc($is_read))
                                        {
                                            $obtained_ID = $each_row["comment_ID"];
                                            $obtained_post_ID = $each_row["comment_post_ID"];
                                            $obtained_author = $each_row["comment_author"];
                                            $obtained_email = $each_row["comment_email"];
                                            $obtained_content = $each_row["comment_content"];
                                            $obtained_status = $each_row["comment_status"];
                                            $obtained_date = $each_row["comment_date"];

                                            $another_query = "SELECT * FROM posts_table WHERE post_id = $obtained_post_ID";
                                            $another_query_is_read = mysqli_query($is_connected, $another_query);

                                            while ($all_rows = mysqli_fetch_assoc($another_query_is_read))
                                            {
                                                $obtained_title = $all_rows["post_title"];
                                            }

                                            echo
                                            "<td> $obtained_ID </td>
                                            <td> $obtained_post_ID </td>
                                            <td> $obtained_author </td>
                                            <td> $obtained_email </td>>
                                            <td> $obtained_content </td>
                                            <td> <a href = '../For Users/single_post_click.php?p_id=$obtained_post_ID'> This Post </a> </td>
                                            <td> $obtained_status </td>                                      
                                            <td> $obtained_date </td>
                                            <td> 
                                                <a href = 'view_comments.php?d_id=$obtained_ID'> Delete </a> |
                                                <a href = 'view_comments.php?approve=$obtained_ID'> Approve </a> |
                                                <a href = 'view_comments.php?unapprove=$obtained_ID'> Unapprove </a>
                                            </td>";
                                            ?>
                                </tr>
                                <?php   }   ?>
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
                                        mysqli_query($is_connected, $delete_query);
                                        header("Location: view_posts.php");
                                    }
                                }
                            }

                            else if (isset($_GET["d_id"]))
                            {
                                if (isset($_SESSION["user_role"]))
                                {
                                    if ($_SESSION["user_role"] == "Admin")
                                    {
                                        $delete_comment_ID = $_GET["d_id"];
                                        $post_id_query = "SELECT * FROM comments_table WHERE comment_ID = {$delete_comment_ID}";
                                        $post_id_query_is_read = mysqli_query($is_connected, $post_id_query);
                                        while($one_row = mysqli_fetch_assoc($post_id_query_is_read))
                                        {
                                            $obtained_post_id = $one_row["comment_post_ID"];
                                            $comment_count_query = "UPDATE posts_table SET post_comment_count = post_comment_count - 1 WHERE post_id = {$obtained_post_id}";
                                            mysqli_query($is_connected, $comment_count_query);
                                        }
                                        
                                        $delete_query = "DELETE FROM comments_table WHERE comment_ID = {$delete_comment_ID}";
                                        mysqli_query($is_connected, $delete_query);
                                        header("Location: view_comments.php");
                                    }
                                }
                            }

                            else if (isset($_GET["unapprove"]))
                            {
                                if (isset($_SESSION["user_role"]))
                                {
                                    if ($_SESSION["user_role"] == "Admin")
                                    {
                                        $unapprove_comment_ID = $_GET["unapprove"];
                                        $unapprove_query = "UPDATE comments_table SET comment_status = 'Unapproved' WHERE comment_ID = {$unapprove_comment_ID}";
                                        mysqli_query($is_connected, $unapprove_query);
                                        header("Location: view_comments.php");
                                    }
                                }
                            }

                            else if (isset($_GET["approve"]))
                            {
                                if (isset($_SESSION["user_role"]))
                                {
                                    if ($_SESSION["user_role"] == "Admin")
                                    {
                                        $approve_comment_ID = $_GET["approve"];

                                        $post_id_query = "SELECT * FROM comments_table WHERE comment_ID = {$approve_comment_ID}";
                                        $post_id_query_is_read = mysqli_query($is_connected, $post_id_query);
                                        while($one_row = mysqli_fetch_assoc($post_id_query_is_read))
                                        {
                                            $obtained_post_id = $one_row["comment_post_ID"];
                                            $comment_count_query = "UPDATE posts_table SET post_comment_count = post_comment_count + 1 WHERE post_id = {$obtained_post_id}";
                                            mysqli_query($is_connected, $comment_count_query);
                                        }

                                        $approve_query = "UPDATE comments_table SET comment_status = 'Approved' WHERE comment_ID = {$approve_comment_ID}";
                                        mysqli_query($is_connected, $approve_query);
                                        header("Location: view_comments.php");
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