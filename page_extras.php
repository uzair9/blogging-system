<!-- s-extra
    ================================================== -->
    <section class="s-extra">
        <div class="row top">
            <div class="col-eight md-six tab-full popular">
                <h3> People Also Search For </h3> <br>
                <div class="block-1-2 block-m-full popular__posts">
                    <?php
                    $all_posts_selected = mysqli_query($is_connected, "SELECT * FROM posts_table WHERE post_status = 'Published' ORDER BY post_id LIMIT 8");
                    while ($each_row = mysqli_fetch_assoc($all_posts_selected))
                    {
                        $post_id = $each_row["post_id"];
                        $post_title = $each_row["post_title"];
                        $post_author = $each_row["post_author"];
                        $post_date = $each_row["post_date"];
                        $post_image = $each_row["post_image"];
                        $post_content = $each_row["post_content"];
                    ?>
                    <article class="col-block popular__post">
                        <a class="popular__thumb">
                            <img src="images/<?php echo $post_image ?>" alt="Image">
                        </a>
                        <h5><a href="single_post_click.php?p_id=<?php echo $post_id; ?>"> <?php echo $post_title ?> </a>
                        </h5>
                        <section class="popular__meta">
                            <span class="popular__author"><span> By </span> <a href="#">
                                    <?php echo $post_author ?></a></span>
                            <span class="popular__date"><span>on</span> <time
                                    datetime="2017-12-19"><?php echo $post_date ?></time></span>
                        </section>
                    </article>
                    <?php } ?>
                </div> <!-- end popular_posts -->
            </div> <!-- end popular -->
            <div class="col-four md-six tab-full about" id="about_uzair">
                <h3> About Uzair Afzal </h3>
                <p>
                    Uzair Afzal is a third-year Computer Science student at Lahore University of Management Sciences
                    (LUMS). He describes himself as a technology-business enthusiast and is very much intrigued by computer hardware, 
                    the semiconductor industry and technology entrepreneurship.
                    He has been engineering the web since 2019. This project, uploaded in 2020,
                    is based on HTML, CSS, JavaScript, PHP, MySQL and Bootstrap. 
                    Follow him on the following social platforms to keep in touch
                </p>
                <ul class="about__social">
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
                </ul> <!-- end header__social -->
            </div> <!-- end about -->
        </div> <!-- end row -->

        <div class="row bottom tags-wrap">
            <div class="col-full tags">
                <h3> Read More </h3>

                <div class="tagcloud">
                    <?php
                        $all_cat_selected = mysqli_query($is_connected, "SELECT * FROM categories_table");
                        while ($each_row = mysqli_fetch_assoc($all_cat_selected))
                        {
                            $cat_title = $each_row["cat_title"];
                            $cat_id = $each_row["cat_ID"];
                            echo 
                            "<a href = 'single_category_click.php?c_id=$cat_id'> {$cat_title} </a>";
                        }
                    ?>
                </div> <!-- end tagcloud -->
            </div> <!-- end tags -->
        </div> <!-- end tags-wrap -->
    </section> <!-- end s-extra -->