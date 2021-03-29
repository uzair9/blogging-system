<?php include "db.php"; ?>
<!-- comments
        ================================================== -->
<div class="comments-wrap">

    <div id="comments" class="row">
        <div class="col-full">
            <h3 class="h2"> Public Discussion </h3>

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
                            <cite>Itachi Uchiha</cite>
                            <div class="comment__meta">
                                <time class="comment__time">Dec 16, 2017 @ 23:05</time>
                                <a class="reply" href="#0">Reply</a>
                            </div>
                        </div>
                        <div class="comment__text">
                            <p>Adhuc quaerendum est ne, vis ut harum tantas noluisse, id suas iisque mei. Nec te
                                inani ponderum vulputate,
                                facilisi expetenda has et. Iudico dictas scriptorem an vim, ei alia mentitum est, ne
                                has voluptua praesent.</p>
                        </div>
                    </div>
                </li>
            </ol>
<!-- </div>
    </div>
        </div> -->
            <?php }} ?>


            <!-- <li class="thread-alt depth-1 comment">

                        <div class="comment__avatar">
                            <img width="50" height="50" class="avatar" src="images/avatars/user-04.jpg" alt="">
                        </div>

                        <div class="comment__content">

                            <div class="comment__info">
                                <cite>John Doe</cite>

                                <div class="comment__meta">
                                    <time class="comment__time">Dec 16, 2017 @ 24:05</time>
                                    <a class="reply" href="#0">Reply</a>
                                </div>
                            </div>

                            <div class="comment__text">
                                <p>Sumo euismod dissentiunt ne sit, ad eos iudico qualisque adversarium, tota falli et
                                    mei. Esse euismod
                                    urbanitas ut sed, et duo scaevola pericula splendide. Primis veritus contentiones
                                    nec ad, nec et
                                    tantas semper delicatissimi.</p>
                            </div>

                        </div>
                    </li> -->





            <!-- 



                        <ul class="children">

                            <li class="depth-2 comment">

                                <div class="comment__avatar">
                                    <img width="50" height="50" class="avatar" src="images/avatars/user-03.jpg" alt="">
                                </div>

                                <div class="comment__content">

                                    <div class="comment__info">
                                        <cite>Kakashi Hatake</cite>

                                        <div class="comment__meta">
                                            <time class="comment__time">Dec 16, 2017 @ 25:05</time>
                                            <a class="reply" href="#0">Reply</a>
                                        </div>
                                    </div>

                                    <div class="comment__text">
                                        <p>Duis sed odio sit amet nibh vulputate
                                            cursus a sit amet mauris. Morbi accumsan ipsum velit. Duis sed odio sit amet
                                            nibh vulputate
                                            cursus a sit amet mauris</p>
                                    </div>

                                </div>

                                <ul class="children">

                                    <li class="depth-3 comment">

                                        <div class="comment__avatar">
                                            <img width="50" height="50" class="avatar" src="images/avatars/user-04.jpg"
                                                alt="">
                                        </div>

                                        <div class="comment__content">

                                            <div class="comment__info">
                                                <cite>John Doe</cite>

                                                <div class="comment__meta">
                                                    <time class="comment__time">Dec 16, 2017 @ 25:15</time>
                                                    <a class="reply" href="#0">Reply</a>
                                                </div>
                                            </div>

                                            <div class="comment__text">
                                                <p>Investigationes demonstraverunt lectores legere me lius quod ii
                                                    legunt saepius. Claritas est
                                                    etiam processus dynamicus, qui sequitur mutationem consuetudium
                                                    lectorum.</p>
                                            </div>

                                        </div>

                                    </li>

                                </ul>

                            </li>

                        </ul> -->

            <!-- </li> -->

            <!-- <li class="depth-1 comment">

                        <div class="comment__avatar">
                            <img width="50" height="50" class="avatar" src="images/avatars/user-02.jpg" alt="">
                        </div>

                        <div class="comment__content">

                            <div class="comment__info">
                                <cite>Shikamaru Nara</cite>

                                <div class="comment__meta">
                                    <time class="comment-time">Dec 16, 2017 @ 25:15</time>
                                    <a class="reply" href="#">Reply</a>
                                </div>
                            </div>

                            <div class="comment__text">
                                <p>Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum
                                    claritatem.</p>
                            </div>

                        </div>

                    </li> -->