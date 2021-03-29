<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="../For Admin/Index.php"> <strong> A D M I N I S T R A T O R </strongns> </a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <li>
            <a href="../../Index.php"> <i class="fa fa-fw fa-home"></i> Blog Home </a>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"> </i> &nbsp;
                <?php echo $_SESSION["first_name"]; echo " ", $_SESSION["last_name"]?> <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <!-- <li>
                    <a href="#"><i class="fa fa-fw fa-user"></i> Profile </a>
                </li> -->
                <!-- <hr> -->
                <li>
                    <a href="Includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out </a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <!-- <li>
                <a href="../For Admin/dashboard.php"><i class="fa fa-fw fa-dashboard"></i> <strong> Dashboard </strong> </a>
            </li> -->
            <li>
                <a href="../For Admin/categories.php"><i class="fa fa-fw fa-list-alt "></i> <strong> Categories
                    </strong> </a>
            </li>

            <li>
                <a href="../For Admin/view_comments.php"><i class="fa fa-fw fa-comments-o"></i> <strong> Comments </strong>
                </a>
            </li>
            <!-- <li>
                <a href="index-rtl.html"><i class="fa fa-fw fa-user"></i> <strong> Profile </strong> </a>
            </li> -->
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-angle-down"></i>
                    <strong> Admins & Users </strong> <i class=""></i></a>
                    <!-- fa fa-fw fa-caret-down -->
                <ul id="demo" class="collapse">
                    <li>
                        <a href="../For Admin/add_user.php"> <em> Add New Admins / Users </em> </a>
                    </li>
                    <li>
                        <a href="../For Admin/view_users.php"> <em> View & Take Actions</em> </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#posts_dropdown"><i
                        class="fa fa-fw fa-angle-down"></i> <strong> Posts </strong> 
                        <i class=""></i></a>
                        <!-- fa fa-fw fa-caret-down -->
                <ul id="posts_dropdown" class="collapse">
                    <li>
                        <a href="add_post.php"> <em> Add New Posts </em> </a>
                    </li>
                    <li>
                        <a href="view_posts.php"> <em> View & Take Actions </em> </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>