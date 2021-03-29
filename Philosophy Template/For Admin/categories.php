<?php include "db.php"; ?>
<?php ob_start(); ?>

<!DOCTYPE html>
<html lang="en">
<?php include "Includes/header.php"; ?>

<body>
<?php
    if (isset($_SESSION["user_role"]))
    {
        if ($_SESSION["user_role"] == "Admin")
        {
?>
    <div id="wrapper">
        <?php include "Includes/navigation.php";?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <strong> <?php echo $_SESSION["first_name"]; echo " ", $_SESSION["last_name"] ?> </strong>
                            <small> (Categories) </small>
                        </h1>
                        <div class="col-xs-6">
                            <?php
                                if (isset($_POST["submitt"]))
                                {  
                                    if (isset($_SESSION["user_role"]))
                                    {
                                        if ($_SESSION["user_role"] == "Admin")
                                        {
                                            $cat_title = $_POST["cat_title"];
                                            if ($cat_title == "" || empty($cat_title))
                                                echo "<h3> <strong> FAILED TO CREATE AN EMPTY FIELD! </strong> </h3>";
                                    else
                                    {
                                        $my_query = "INSERT INTO categories_table(cat_title)";
                                        $my_query .= "VALUES('$cat_title')";
                                        $iswritten = mysqli_query($is_connected, $my_query);
                                        if (!$iswritten)
                                            echo "<h3> DB Writing Failed </h3>";
                                    }
                                        }
                                    }
                                    
                                }
                            ?>

                            <!-- STARTING DELETING CATEGORIES HERE -->

                            <form autofocus action="" method="post">
                                <div class="form-group">
                                    <label for="cat_title"> Create a New Category </label>
                                    <?php
                                        if (isset ($_GET["delete"]))
                                        {
                                            if (isset($_SESSION["user_role"]))
                                            {
                                                if ($_SESSION["user_role"] == "Admin")
                                                {
                                                    $cat_ID_delete = $_GET["delete"];
                                                    $delete_query = "DELETE FROM categories_table WHERE cat_ID = {$cat_ID_delete}";
                                                    mysqli_query($is_connected, $delete_query);
                                                    header("Location: categories.php");
                                                }
                                            }
                                        }
                                    ?>
                                    <input class="form-control" type="text" name="cat_title">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submitt" value="Create">
                                </div>
                            </form>

                            <!-- ENDING DELETING CATEGORIES HERE -->

                        </div>

                        <!-- STARTING CREATING TABLE HERE FOR CATEGORIES -->

                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th> <strong> <u> ID </u> </strong></th>
                                        <th> <strong> <u> CATEGORY NAME </u> </strong></th>
                                        <th> <strong> <u> ACTION </u> </strong> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $all_cat_selected = mysqli_query($is_connected, "SELECT * FROM categories_table");
                                    while ($each_row = mysqli_fetch_assoc($all_cat_selected))
                                    {
                                        $cat_title = $each_row['cat_title'];
                                        $cat_ID = $each_row ['cat_ID'];
                                        echo "<tr>";
                                        echo "<td> {$cat_ID} </td>";
                                        echo "<td> {$cat_title} </td>";
                                        echo "<td> <a href = 'categories.php?delete={$cat_ID}'> Delete </a> </td>";
                                        echo "<tr>";
                                    }
                                ?>
                                </tbody>
                            </table>

                            <!-- ENDING CREATING TABLE HERE FOR CATEGORIES -->

                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
                                <?php }
                                else {
                                    header("Location: ../../Login Template/Index.php");
                                }
                                } ?>
    <!-- /#wrapper -->
    <?php include "Includes/footer.php"; ?>