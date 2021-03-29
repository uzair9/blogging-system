<?php 
    include "db.php";
    include "boiler_plate.php";
?>

<section class="s-pageheader">
    <header class="header">
        <div class="header__content row">
            <div class="header__logo">
                <a class="logo">
                    <img src="images/my_logo_2.png" alt="Logo">
                </a>
            </div>
            <ul class="header__social">
                <li>
                    <a href="https://www.facebook.com/people/Uzair-Afzal/100006982786800"><i class="fa fa-facebook"
                            aria-hidden="true"></i></a>
                </li>
                <li>
                    <a href="https://www.quora.com/profile/Uzair-Afzal-6?ch=3&share=3172a5e8&srid=5QMhN"> Quora </a>
                </li>
                <li>
                    <a href="https://www.imdb.com/user/ur83200989/?ref_=nv_usr_prof_2"> IMDb </a>
                </li>
            </ul>
            <!-- Form to search the blogs page -->
            <a class="header__search-trigger" href="#"></a>
            <div class="header__search">
                <form role="search" method="post" class="header__search-form" action="search.php">
                    <label>
                        <span class="hide-content">Search by Blog Names</span>
                        <input type="search" class="search-field" placeholder="Search by Keywords" value="" name="s"
                            title="Search by Blog Names" autocomplete="off">
                    </label>
                    <input type="submit" class="search-submit" value="Search" name="search_name">
                </form>
                <a href="#" title="Close Search" class="header__overlay-close"> Close </a>
            </div> <!-- end header__search -->
            <a class="header__toggle-menu" href="#" title="Menu"><span> Menu </span></a>
            <nav class="header__nav-wrap">
                <h2 class="header__nav-heading h6">Site Navigation</h2>
                <ul class="header__nav">
                    <li><a href="Index.php" title=""> Home </a></li>
                    <!-- <li class="has-children">
                        <a href="#" title=""> Getting Started </a>
                        <ul class="sub-menu">
                            <li><a href="../../Login Template/Index.php"> Sign In </a></li>
                            <li><a href="../../Login Template/Index _2.php"> Sign Up </a></li>
                            <li><a href="../../Login Template/Index _3.php"> Admin </a></li>
                        </ul>
                    </li> -->
                    <li class="has-children">
                        <a href="#" title=""> Blog Categories </a>
                        <ul class="sub-menu">
                            <?php
                                $all_cat_selected = mysqli_query($is_connected, "SELECT * FROM categories_table");
                                while ($each_row = mysqli_fetch_assoc($all_cat_selected))
                                {
                                    $cat_title = $each_row["cat_title"];
                                    $catID = $each_row["cat_ID"];
                                    echo "<li> <a href = 'single_category_click.php?c_id=$catID'> {$cat_title} </a> </li>";
                                }
                            ?>
                        </ul>
                    <li class="has-children">
                        <a href="#" title=""> All-Time Posts </a>
                        <ul class="sub-menu">
                            <?php
                                $all_cat_selected = mysqli_query($is_connected, "SELECT * FROM posts_table WHERE post_status = 'Published'");
                                while ($each_row = mysqli_fetch_assoc($all_cat_selected))
                                {
                                    $post_title = $each_row["post_title"];
                                    $post_id = $each_row["post_id"];
                                    echo "<li> <a href = 'single_post_click.php?p_id=$post_id'> {$post_title} </a> </li>";
                                }
                            ?>
                        </ul>
                    </li>
                    <li class="has-children">
                        <a href="#" title=""> More </a>
                        <ul class="sub-menu">
                            <li><a class="smoothscroll" href="#about_uzair"> About </a></li>
                            <li><a class="smoothscroll" href="#follow_us"> Follow </a></li>
                            <li><a href="Login Template/Index.php"> Sign In </a></li>
                            <li><a href="Login Template/SignUpIndex.php"> Sign Up </a></li>
                        </ul>
                    </li>
                </ul> <!-- end header__nav -->
                <a href="#" title="Close Menu" class="header__overlay-close close-mobile-menu">Close</a>

            </nav> <!-- end header__nav-wrap -->

        </div> <!-- header-content -->
    </header>
</section>



<!-- s-content
    ================================================== -->
<section class="s-content">
    <div class="row masonry-wrap">
        <div class="masonry">
            <div class="grid-sizer"></div>
            <?php
                if (isset($_GET["c_id"]))
                $id_to_check =  $_GET["c_id"];

                $all_posts_selected = mysqli_query($is_connected, "SELECT * FROM posts_table WHERE post_cat_id = $id_to_check and post_status = 'Published'");
                while ($each_row = mysqli_fetch_assoc($all_posts_selected))
                {
                    $post_ID = $each_row["post_id"];
                    $post_cat_ID = $each_row["post_cat_id"];
                    $post_title = $each_row["post_title"];
                    $post_author = $each_row["post_author"];
                    $post_date = $each_row["post_date"];
                    $post_image = $each_row["post_image"];
                    $post_content = $each_row["post_content"];
                    $post_tags = $each_row["post_tags"];
                    $post_content = substr($each_row["post_content"], 0, 10 );
            ?>
            <article class="masonry__brick entry format-standard" data-aos="fade-up">
                <div class="entry__thumb">
                    <a href="single_post_click.php?p_id=<?php echo $post_ID; ?>" class="entry__thumb-link">
                        <img class="img-responsive" src="images/<?php echo$post_image?>" alt="Blog Image">
                    </a>
                </div>
                <div class="entry__text">
                    <div class="entry__header">
                        <div class="entry__excerpt">
                            <a>
                                <?php 
                                    $get_category = "SELECT * FROM categories_table WHERE cat_ID = '{$post_cat_ID}'";
                                    $do_query = mysqli_query($is_connected, $get_category);
                                    while ($row = mysqli_fetch_assoc($do_query))
                                    {
                                        $cat_title = $row["cat_title"];
                                    }
                                    echo "<strong> Post Category: </strong>", $cat_title;
                                ?>
                            </a>
                        </div>
                        <div class="entry__excerpt">
                            <a>
                                <?php echo "<strong> Post Author: </strong>", $post_author ?>
                            </a>
                        </div>
                        <div class="entry__excerpt">
                            <a> <?php echo "<strong> Dated: </strong>", $post_date?></a>
                        </div> <br>
                        <h1 class="entry__title">
                            <a href="single_post_click.php?p_id=<?php echo $post_ID; ?>">
                                <?php echo "<u> <em> $post_title </em> </u>" ?> </a>
                        </h1> <br>
                    </div>
                    <!-- <div class="entry__excerpt">
                        <?php echo $post_content ?>
                    </div> -->
                    <div class="entry__meta">
                        <span>
                            <a>
                                <?php echo "<strong> Post Tags: </strong>", $post_tags; ?>
                            </a>
                        </span>
                    </div>
                </div>
            </article>
            <?php } ?>
        </div> <!-- end masonry -->
    </div> <!-- end masonry-wrap -->
    <!-- <div class="row">
        <div class="col-full">
            <nav class="pgn">
                <ul>
                    <li><a class="pgn__prev" href="#">Prev</a></li>
                    <li><a class="pgn__num current" href="#">1</a></li>
                    <li><span class="pgn__num">2</span></li>
                    <li><a class="pgn__num" href="#">3</a></li>
                    <li><a class="pgn__next" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </div> -->
</section> <!-- s-content -->

<?php
    include "page_extras.php";
    include "footer.php";
?>