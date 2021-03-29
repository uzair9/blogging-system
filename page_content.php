<!-- s-content
    ================================================== -->
<section class="s-content">
    <div class="row masonry-wrap">
        <div class="masonry">
            <div class="grid-sizer"></div>
            <?php
                $all_posts_selected = mysqli_query($is_connected, "SELECT * FROM posts_table WHERE post_status = 'Published' ORDER BY post_id DESC");
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
                        <img class="img-responsive" src="images/<?php echo $post_image?>" alt="Blog Image">
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
                            <a href="single_post_click.php?p_id=<?php echo $post_ID; ?>"> <?php echo "<u> <em> $post_title </em> </u>" ?> </a>
                        </h1>
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
</section> <!-- s-content -->