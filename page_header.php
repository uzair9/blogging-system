<body id="top">

    <!-- pageheader
    ================================================== -->
    <section class="s-pageheader s-pageheader--home">
        <header class="header">
            <div class="header__content row">
                <div class="header__logo">
                    <a class="logo">
                        <img src="images/my_logo_4.png" alt="Logo">
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
                        
                        <li class="has-children">
                            <a href="#" title=""> Blog Categories </a>
                            <ul class="sub-menu">
                                <?php
                                $all_cat_selected = mysqli_query($is_connected, "SELECT * FROM categories_table");
                                while ($each_row = mysqli_fetch_assoc($all_cat_selected))
                                {
                                    $cat_title = $each_row["cat_title"];
                                    $cat_id = $each_row['cat_ID'];
                                    echo "<li> <a href = 'single_category_click.php?c_id=$cat_id'> {$cat_title} </a> </li>";
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
        </header> <!-- header -->
        <div class="pageheader-content row">
            <div class="col-full">
                <div class="featured">
                    <div class="featured__column featured__column--big">
                        <div class="entry" 
                            style="background-image:url('images/cover_burj.jpg');">

                            <div class="entry__content">
                                <span class="entry__category"><a href="single_category_click.php?c_id=2"> Engineering </a></span>
                                <h1><a href="single_post_click.php?p_id=32" title=""> <em> Burj Khalifa: An Engineering Wonder </em> </a></h1>
                                <div class="entry__info">
                                    <ul class="entry__meta">
                                        <li><a href="#"> Uzair Afzal </a></li>
                                        <li>July 26, 2020 </li>
                                    </ul>
                                </div>
                            </div> <!-- end entry__content -->
                        </div> <!-- end entry -->
                    </div> <!-- end featured__big -->

                    <div class="featured__column featured__column--small">

                        <div class="entry"
                            style="background-image:url('images/Ego.jpg');">
                            <!-- Add here the URL of your post -->


                            <div class="entry__content">
                                <span class="entry__category"><a href="single_category_click.php?c_id=1"> Psychology </a></span>
                                <h1><a href="single_post_click.php?p_id=37" title=""> <em> Ego: How It Breeds </em> </a></h1>
                                <div class="entry__info">
                                    <a href="#0" class="entry__profile-pic">
                                        <img class="avatar" src="images/Ego.jpg"
                                            alt="Physics Image">
                                        <!-- Add your image here -->
                                    </a>
                                    <ul class="entry__meta">
                                        <li><a href="#0"> Uzair Afzal </a></li>
                                        <li>July 26, 2020</li>
                                    </ul>
                                </div>
                            </div> <!-- end entry__content -->
                        </div> <!-- end entry -->
                        <div class="entry"
                            style="background-image:url('https://cdn.mos.cms.futurecdn.net/CCRppuwU2of3okGkhAmeHT-1200-80.jpg');">
                            <div class="entry__content">
                                <span class="entry__category"><a href="single_category_click.php?c_id=3"> Science & Technology </a></span>

                                <h1><a title=""> <em> Quantum Computing </em> </a></h1>

                                <div class="entry__info">
                                    <a href="#0" class="entry__profile-pic">
                                        <img class="avatar" src="images/avatars/user-03.jpg" alt="">
                                    </a>

                                    <ul class="entry__meta">
                                        <li><a href="#0">Uzair Afzal</a></li>
                                        <li>July 26, 2020</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end featured__small -->
                </div> <!-- end featured -->
            </div> <!-- end col-full -->
        </div>
    </section> <!-- end s-pageheader -->