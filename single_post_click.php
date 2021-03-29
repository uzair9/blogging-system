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
                        <a href='single_category_click.php?c_id=$cat_id'> Blog Categories </a>
                        <ul class="sub-menu">
                            <?php
                                    $all_cat_selected = mysqli_query($is_connected, "SELECT * FROM categories_table");
                                    while ($each_row = mysqli_fetch_assoc($all_cat_selected))
                                    {
                                        $cat_title = $each_row["cat_title"];
                                        $cat_id = $each_row["cat_ID"];
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
                    </li>
                    <li class="has-children">
                        <a href="#" title=""> More </a>
                        <ul class="sub-menu">
                            <li><a class="smoothscroll" href="#about_uzair"> About</a></li>
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
<?php

    if (isset($_GET["p_id"]))
        $post_id_caught = $_GET["p_id"];

    $all_posts_selected = mysqli_query($is_connected, "SELECT * FROM posts_table WHERE post_id = $post_id_caught");
    while ($each_row = mysqli_fetch_assoc($all_posts_selected))
    {
        $post_title = $each_row["post_title"];
        $post_author = $each_row["post_author"];
        $post_date = $each_row["post_date"];
        $post_image = $each_row["post_image"];
        $post_content = $each_row["post_content"];
        $post_tags = $each_row["post_tags"];
        $total_comments = $each_row["post_comment_count"];
    }
?>

<!-- s-content
    ================================================== -->

<section class="s-content s-content--narrow s-content--no-padding-bottom">
    <article class="row format-standard">
        <div class="s-content__header col-full">
            <h1 class="s-content__header-title">
                <?php echo $post_title; ?>
            </h1>
            <ul class="s-content__header-meta">
                <li class="date">
                    <?php echo "<strong> Published: </strong> ", $post_date, "  <br> <strong> Author: </strong>  ", $post_author; ?>
                </li>
            </ul>
        </div> <!-- end s-content__header -->

        <div class="s-content__media col-full">
            <div class="s-content__post-thumb">
                <img src="images/<?php echo $post_image; ?>" sizes="(max-width: 2000px) 100vw, 2000px" alt="Post Image">
            </div>
        </div> <!-- end s-content__media -->
        <div class="col-full s-content__main">
            <?php echo $post_content; ?>

            <?php
                if ($post_author == "Uzair Afzal") {
            ?>
            <div class="s-content__author">
                <img src="images/avatars/uzair_avatar.jpeg" alt="">
                <div class="s-content__author-about">
                    <h4 class="s-content__author-name">
                        <a> <?php echo $post_author; ?></a>
                    </h4>
                    <p>
                        Uzair Afzal is a third-year Computer Science student at Lahore University of
                        Management Sciences (LUMS). He describes himself as a technology-business enthusiast and a swimming, running and tennis freak.
                        Follow him on the following social platforms to keep in touch
                    </p>

                    <ul class="s-content__author-social">
                        <li>
                            <a href="https://www.facebook.com/people/Uzair-Afzal/100006982786800"><i
                                    class="fa fa-facebook" aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href="https://www.quora.com/profile/Uzair-Afzal-6?ch=3&share=3172a5e8&srid=5QMhN">
                                Quora
                            </a>
                        </li>
                        <li>
                            <a href="https://www.imdb.com/user/ur83200989/?ref_=nv_usr_prof_2"> IMDb </a>
                        </li>
                    </ul>
                </div>
            </div>
            <?php } ?>
        </div> <!-- end s-content__main -->

    </article>

    <?php // include "post_comments.php" ?>

    <div class="comments-wrap">

        <div id="comments" class="row">
            <div class="col-full">
                <h3 class="h2"> Public Discussion <h4> <?php echo $total_comments, " Comments"?> </h4>
                </h3>

                <!-- commentlist -->

                <?php
                    $comment_read_ID = "SELECT * FROM comments_table WHERE comment_post_ID = {$post_id_caught} ";
                    $comment_read_ID .= "AND comment_status = 'Approved' ";
                    $comment_read_ID .= "ORDER BY comment_ID DESC ";
                    $is_successful = mysqli_query($is_connected, $comment_read_ID);

                    if (!$is_successful)
                        echo "DB READING FAILED";
                    if ($is_successful)
                    {
                        while ($each_row = mysqli_fetch_assoc($is_successful))
                        {
                            $comment_date = $each_row["comment_date"];
                            $comment_content = $each_row["comment_content"];
                            $comment_author = $each_row["comment_author"];
                ?>
                <ol class="commentlist">
                    <li class="depth-1 comment">
                        <div class="comment__content">
                            <div class="comment__info">
                                <cite> <?php echo $comment_author; ?></cite>
                                <div class="comment__meta">
                                    <time class="comment__time">
                                        <?php echo "<small> Dated: $comment_date </small>" ?></time>
                                </div>
                            </div>
                            <div class="comment__text">
                                <p> <?php echo "<strong> $comment_content </strong>" ?></p>
                            </div>
                        </div>
                    </li>
                </ol>
                <hr>
                <?php }} ?>
                <hr>

                <?php
                    if (isset($_POST["create_comment"]))
                    {
                        $obtained_author = mysqli_real_escape_string($is_connected, trim($_POST["Your_Name"]));
                        $obtained_email =  mysqli_real_escape_string($is_connected, trim($_POST["Your_Email"]));
                        $obtained_content = mysqli_real_escape_string($is_connected, trim($_POST["Your_Message"]));
                        $obtained_post_id = $_GET["p_id"];

                        $insert_query = "INSERT INTO comments_table(comment_post_ID, comment_author, comment_email, comment_content, comment_status, comment_date)";
                        $insert_query .= "VALUES($obtained_post_id, '{$obtained_author}', '{$obtained_email}', '{$obtained_content}', 'Unapproved', now())";
                        
                        $is_inserted = mysqli_query($is_connected, $insert_query);

                        if (!$is_inserted)
                            echo "<h2> DB Insertion Failed! </h2>";
                ?>
                        <script>
                            alert("Thank you for sharing your thoughts with us! Your comment has been recorded for admin approval. If approved, it will be publicly visible shortly");
                        </script>
                        <?php
                            if (!$is_successful)
                                echo "<h2> Comment Count Incrementing Failed </h2>";
                    }
                        ?>

                <!-- respond
                    ================================================== -->
                <div class="respond">

                    <h3 class="h2"> Share Your Thoughts </h3>

                    <form action="single_post_click.php?p_id=<?php echo $post_id_caught?>" method="post" role="form">
                        <div class="form-group">
                            <label for="Author"> Your Name </label>
                            <input class="full-width" type="text" name="Your_Name">
                        </div>
                        <div class="form-group">
                            <label for="email"> Your Email </label>
                            <input class="full-width" type="email" name="Your_Email">
                        </div>
                        <div class="message form-group">
                            <label for="Comment"> Your Message </label>
                            <textarea name="Your_Message" class="full-width" rows="3"></textarea>
                        </div>
                        <button type="submit" name="create_comment" class="submit btn--primary btn--large full-width""> Post Comment </button>
        </form>

    </div> <!-- end respond -->

    </div> <!-- end col-full -->

    </div> <!-- end row comments -->
    </div> <!-- end comments-wrap -->

</section> <!-- s-content -->

<?php
    include "page_extras.php";
    include "footer.php";
?>