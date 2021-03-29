<!DOCTYPE html>
<html lang="en">
<?php
    include "Includes/header.php";
    include "Includes/db.php";
?>

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
                        <h2 class="page-header">
                            <strong> Welcome,
                                <?php echo $_SESSION["first_name"]; echo " ", $_SESSION["last_name"], "!" ?> </strong>
                        </h2>
                        <p>
                            <?php echo $_SESSION["first_name"]; ?>, as the administrator of <em> "<u>Blogs by Uzair
                                    Afzal</u>," </em> you get access to:
                            <li> The Dashboard </li>
                            <li> Blog Categories </li>
                            <li> Users </li>
                            <li> User Profiles </li>
                            <li> Blog Posts </li>
                            <li> Post Comments </li>
                        </p>
                        <hr>
                    </div>
                </div>
                <!-- /.row -->

                <!-- Admin widgets start down below -->

                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-text fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php
                                        $my_query = "SELECT * FROM posts_table";
                                        $my_query_is_read = mysqli_query($is_connected, $my_query);
                                        $total_rows_posts = mysqli_num_rows($my_query_is_read);
                                    ?>
                                        <div class='huge'><?php echo $total_rows_posts ?></div>
                                        <div>Posts</div>
                                    </div>
                                </div>
                            </div>
                            <a href="view_posts.php">
                                <div class="panel-footer">
                                    <span class="pull-left"> View Post Details </span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <?php
                                        $my_query = "SELECT * FROM comments_table";
                                        $my_query_is_read = mysqli_query($is_connected, $my_query);
                                        $total_rows_comments = mysqli_num_rows($my_query_is_read);
                                    ?>
                                    <div class="col-xs-9 text-right">
                                        <div class='huge'><?php echo $total_rows_comments?></div>
                                        <div>Comments</div>
                                    </div>
                                </div>
                            </div>
                            <a href="view_comments.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Comment Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <?php
                                        $my_query = "SELECT * FROM users_table";
                                        $my_query_is_read = mysqli_query($is_connected, $my_query);
                                        $total_rows_users = mysqli_num_rows($my_query_is_read);
                                    ?>
                                    <div class="col-xs-9 text-right">
                                        <div class='huge'><?php echo $total_rows_users?></div>
                                        <div> Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="view_users.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View User Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list fa-5x"></i>
                                    </div>
                                    <?php
                                        $my_query = "SELECT * FROM categories_table";
                                        $my_query_is_read = mysqli_query($is_connected, $my_query);
                                        $total_rows_category = mysqli_num_rows($my_query_is_read);
                                    ?>
                                    <div class="col-xs-9 text-right">
                                        <div class='huge'><?php echo $total_rows_category ?></div>
                                        <div>Categories</div>
                                    </div>
                                </div>
                            </div>
                            <a href="categories.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Category Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <hr>
                <div class="row">
                    <div style="text-align: center">
                        <?php
                            echo "<h1> CONTENT MANAGEMENT SYSTEM </h1>";
                        ?>
                        <?php
                            echo "<h3 style = 'color: grey'> Graphical Representation of Blog Statistics </h3>"
                        ?>
                    </div>
                    <!-- <html>

                    <head>
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">
                        google.charts.load('current', {
                            'packages': ['bar']
                        });
                        google.charts.setOnLoadCallback(drawChart);


                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                                ['Data Types', 'Total Number of Elements'],
                                <?php
                            //     $category_query = "SELECT * FROM categories_table";
                            //     $all_post_query = "SELECT * FROM posts_table";
                            //     $published_post_query = "SELECT * FROM posts_table WHERE post_status = 'Published'";
                            //     $draft_post_query = "SELECT * FROM posts_table WHERE post_status = 'Draft'";;
                            //     $approved_comments_query = "SELECT * FROM comments_table WHERE comment_status = 'Approved'";
                            //     $unapproved_comments_query = "SELECT * FROM comments_table WHERE comment_status = 'Unapproved'";
                            //     $users_query = "SELECT * FROM users_table";
                            //     $admins_query = "SELECT * FROM users_table WHERE role = 'Admin'";
                            //     $subscribers_query = "SELECT * FROM users_table WHERE role = 'Subscriber'";

                            //     $category_query_is_successful = mysqli_query($is_connected, $category_query);
                            //     $all_post_query_is_successful = mysqli_query ($is_connected, $all_post_query);
                            //     $published_post_query_is_successful = mysqli_query($is_connected, $published_post_query);
                            //     $draft_post_query_is_successful = mysqli_query($is_connected, $draft_post_query);
                            //     $approved_comments_query_is_successful = mysqli_query($is_connected, $approved_comments_query);
                            //     $unapproved_comments_query_is_successful = mysqli_query($is_connected, $unapproved_comments_query);
                            //     $users_query_is_successful = mysqli_query($is_connected, $users_query);
                            //     $admins_query_is_successful = mysqli_query($is_connected, $admins_query);
                            //     $subscribers_query_is_successful = mysqli_query($is_connected, $subscribers_query);
                                
                            //     $total_rows_category = mysqli_num_rows($category_query_is_successful);
                            //     $total_rows_all_posts = mysqli_num_rows(($all_post_query_is_successful));
                            //     $total_rows_published = mysqli_num_rows($published_post_query_is_successful);
                            //     $total_rows_draft = mysqli_num_rows($draft_post_query_is_successful);
                            //     $total_rows_approved = mysqli_num_rows($approved_comments_query_is_successful);
                            //     $total_rows_unapproved = mysqli_num_rows($unapproved_comments_query_is_successful);
                            //     $total_rows_users = mysqli_num_rows($users_query_is_successful);
                            //     $total_rows_admin = mysqli_num_rows($admins_query_is_successful);
                            //     $total_rows_sub = mysqli_num_rows($subscribers_query_is_successful);
                                
                            //     $element_text = ['Categories', 'All-Time Posts','Published Posts', 'Draft Posts', 'Approved Comments', 'Pending Comments','Total Users', 'Admins', 'Subscirbers'];
                            //     $element_count = [$total_rows_category, $total_rows_all_posts, $total_rows_published, $total_rows_draft,  $total_rows_approved, $total_rows_unapproved, $total_rows_users, $total_rows_admin, $total_rows_sub];
                                
                            //     for ($i = 0; $i < 9; $i ++)
                            //     {
                            //         echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
                            //     }
                         ?>
                        ]);

                            var options = {
                                chart: {
                                    // title: 'Content Management System',
                                    // subtitle: 'Thing1, Thing2, Thing3, Thing4',
                                }
                            };

                            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                            chart.draw(data, google.charts.Bar.convertOptions(options));
                        }
                        </script>
                    </head>

                    <body>
                        <div id="columnchart_material" style="width: 1200px; height: 500px;"> </div>
                    </body>

                    </html>
                    <hr> -->

                    <html>

                    <head>
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">
                        google.charts.load('current', {
                            'packages': ['corechart']
                        });
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                                ['Data Types', 'Data Count'],
                            <?php
                                $category_query = "SELECT * FROM categories_table";
                                $all_post_query = "SELECT * FROM posts_table";
                                $published_post_query = "SELECT * FROM posts_table WHERE post_status = 'Published'";
                                $draft_post_query = "SELECT * FROM posts_table WHERE post_status = 'Draft'";;
                                $approved_comments_query = "SELECT * FROM comments_table WHERE comment_status = 'Approved'";
                                $unapproved_comments_query = "SELECT * FROM comments_table WHERE comment_status = 'Unapproved'";
                                $users_query = "SELECT * FROM users_table";
                                $admins_query = "SELECT * FROM users_table WHERE role = 'Admin'";
                                $subscribers_query = "SELECT * FROM users_table WHERE role = 'Subscriber'";

                                $category_query_is_successful = mysqli_query($is_connected, $category_query);
                                $all_post_query_is_successful = mysqli_query ($is_connected, $all_post_query);
                                $published_post_query_is_successful = mysqli_query($is_connected, $published_post_query);
                                $draft_post_query_is_successful = mysqli_query($is_connected, $draft_post_query);
                                $approved_comments_query_is_successful = mysqli_query($is_connected, $approved_comments_query);
                                $unapproved_comments_query_is_successful = mysqli_query($is_connected, $unapproved_comments_query);
                                $users_query_is_successful = mysqli_query($is_connected, $users_query);
                                $admins_query_is_successful = mysqli_query($is_connected, $admins_query);
                                $subscribers_query_is_successful = mysqli_query($is_connected, $subscribers_query);
                                
                                $total_rows_category = mysqli_num_rows($category_query_is_successful);
                                $total_rows_all_posts = mysqli_num_rows(($all_post_query_is_successful));
                                $total_rows_published = mysqli_num_rows($published_post_query_is_successful);
                                $total_rows_draft = mysqli_num_rows($draft_post_query_is_successful);
                                $total_rows_approved = mysqli_num_rows($approved_comments_query_is_successful);
                                $total_rows_unapproved = mysqli_num_rows($unapproved_comments_query_is_successful);
                                $total_rows_users = mysqli_num_rows($users_query_is_successful);
                                $total_rows_admin = mysqli_num_rows($admins_query_is_successful);
                                $total_rows_sub = mysqli_num_rows($subscribers_query_is_successful);
                                
                                $element_text = ['Categories', 'All-Time Posts','Published Posts', 'Draft Posts', 'Approved Comments', 'Pending Comments','Total Users', 'Admins', 'Subscirbers'];
                                $element_count = [$total_rows_category, $total_rows_all_posts, $total_rows_published, $total_rows_draft,  $total_rows_approved, $total_rows_unapproved, $total_rows_users, $total_rows_admin, $total_rows_sub];
                                
                                for ($i = 0; $i < 9; $i ++)
                                {
                                    echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
                                }
                            ?>
                            ]);

                            var options = {
                                // title: 'Company Performance',
                                curveType: 'function',
                                legend: {
                                    position: 'bottom'
                                }
                            };

                            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

                            chart.draw(data, options);
                        }
                        </script>
                    </head>

                    <body>
                        <div id="curve_chart" style="width: 1500px; height: 800px"></div>
                    </body>

                    </html>

                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
                    <?php }} ?>
    </div>
    <!-- /#wrapper -->
    <?php include "Includes/footer.php"; ?>
    <!-- Our footer -->