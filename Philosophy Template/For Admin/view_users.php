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
                            <small> (Users &rarr; View Users) </small>
                        </h1>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th> USER ID </th>
                                    <th> USERNAME </th>
                                    <th> FIRST NAME </th>
                                    <th> LAST NAME </th>
                                    <th> EMAIL ADDRESS </th>
                                    <th> USER ROLE </th>
                                    <th> USER IMAGE </th>
                                    <th>  DATE </th>
                                    <th> ACTIONS </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                        $read_query = "SELECT * FROM users_table";
                                        $is_read = mysqli_query($is_connected, $read_query);
                                        while ($each_row = mysqli_fetch_assoc($is_read))
                                        {
                                            $obtained_userID = $each_row["user_ID"];
                                            $obtained_username = $each_row["user_name"];
                                            $obtained_Fname = $each_row["user_first_name"];
                                            $obtained_Lname = $each_row["user_last_name"];
                                            $obtained_email = $each_row["user_email"];
                                            $obtained_role = $each_row["role"];
                                            $obtained_image = $each_row["user_image"];

                                            echo
                                            "<td> $obtained_userID </td>
                                            <td> $obtained_username </td>
                                            <td> $obtained_Fname </td>
                                            <td> $obtained_Lname </td>>
                                            <td> $obtained_email </td>
                                            <td> $obtained_role </td>
                                            <td> ********************* </td>
                                            <td> ********************* </td>
                                            <td> 
                                                <a href = 'view_users.php?del_id=$obtained_userID'> Delete User </a> |
                                                <a href = 'view_users.php?make_admin=$obtained_userID'> Make Admin </a> |
                                                <a href = 'view_users.php?make_sub=$obtained_userID'> Make Subscriber </a> |
                                                <a href = '#'> Edit User </a>
                                            </td>";
                                            ?>
                                </tr>
                                <?php   }   ?>
                                </tr>
                            </tbody>
                        </table>
                        <?php
                            if (isset($_GET["del_id"]))
                            {
                                if (isset($_SESSION["user_role"]))
                                {
                                    if ($_SESSION["user_role"] == "Admin")
                                    {
                                        $delete_user_ID = mysqli_real_escape_string($is_connected, $_GET["del_id"]);
                                        $delete_query = "DELETE FROM users_table WHERE user_ID = {$delete_user_ID}";
                                        mysqli_query($is_connected, $delete_query);
                                        header("Location: view_users.php");
                                    }
                                }
                            }

                            if (isset($_GET["make_admin"]))
                            {
                                if (isset($_SESSION["user_role"]))
                                {
                                    if ($_SESSION["user_role"] == "Admin")
                                    {
                                        $ID= $_GET["make_admin"];
                                        $update_query = "UPDATE users_table SET role = 'Admin' WHERE user_ID = {$ID}";
                                        mysqli_query($is_connected, $update_query);
                                        header("Location: view_users.php");
                                    } 
                                }
                            }

                            if (isset($_GET["make_sub"]))
                            {
                                if (isset($_SESSION["user_role"]))
                                {
                                    if ($_SESSION["user_role"] == "Admin")
                                    {
                                        $ID= $_GET["make_sub"];
                                        $update_query = "UPDATE users_table SET role = 'Subscriber' WHERE user_ID = {$ID}";
                                        mysqli_query($is_connected, $update_query);
                                        header("Location: view_users.php");
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