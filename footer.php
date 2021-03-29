<!-- s-footer
    ================================================== -->
    <footer class="s-footer">
        <div class="s-footer__main">
            <div class="row">
                <!-- <div class="col-two md-four mob-full s-footer__sitelinks">
                    <h4> More Blogs </h4>
                    <ul class="s-footer__linklist">
                        <?php
                            $all_cat_selected = mysqli_query($is_connected, "SELECT * FROM categories_table");
                            while ($each_row = mysqli_fetch_assoc($all_cat_selected))
                            {
                                $cat_title = $each_row["cat_title"];
                                $cat_id = $each_row["cat_ID"];
                                echo 
                                "<li> 
                                <a href = 'single_category_click.php?c_id=$cat_id'> {$cat_title} </a>
                                </li>";
                            }
                        ?>
                    </ul>
                </div> end s-footer__sitelinks -->
                
                <div class="col-three md-four mob-full s-footer__social">
                    <h4> Skills </h4>
                    <ul class="s-footer__linklist">
                        <li> C / C++ </li>
                        <li> Python </li>
                        <li> HTML & CSS </li>
                        <li> PHP & MySQL </li>
                        <li> JavaScript </li>
                        <li> jQuery, JSON & AJAX </li>
                        <li> ECMAScript-7 </li>
                        <li> ReactJS </li>
                    </ul>
                </div> <!-- end s-footer__social -->
                
                <div class="col-three md-four mob-full s-footer__sitelinks">
                    <h4> Access </h4>
                    <ul class="s-footer__linklist">
                    <li><a href="../../Blogs/Login Template/SignUpIndex.php"> Sign Up </a></li>    
                    <li><a href="../../Blogs/Login Template"> Sign In </a></li>
                    </ul>
                </div> <!-- end s-footer__archives -->
                
                <div class="col-three md-four mob-full s-footer__social">
                    <h4> Connect </h4>
                    <ul class="s-footer__linklist">
                        <li> <a href = "mailto:uzair9990@gmail.com"> Email </a> </li>
                        <li> <a href = "tel:+923215342855"> Call </a> </li>
                    </ul>
                </div> <!-- end s-footer__social -->
                
                <div class="col-three md-four mob-full s-footer__social" id="follow_us">
                    <h4> Follow </h4>
                    <ul class="s-footer__linklist">
                        <li><a href="https://www.facebook.com/people/Uzair-Afzal/100006982786800">Facebook</a></li>
                        <li><a href="https://www.quora.com/profile/Uzair-Afzal-6?ch=3&share=3172a5e8&srid=5QMhN"> Quora
                            </a></li>
                        <li> <a href="https://www.imdb.com/user/ur83200989/?ref_=nv_usr_prof_2"> IMDb </a> </li>
                    </ul>

                </div> <!-- end s-footer__social -->

                <!-- <div class="col-five md-full end s-footer__subscribe" id="sub">
                    <h4>Subscribe to Our Newsletter</h4>
                    <p>
                        The best way to stay connected with the latest content posted by Uzair Afzal
                        is to subscribe to the newsletter. Provide your email
                        address and stay connected with us!
                    </p>
                    <div class="subscribe-form">
                        <form action = "" method = "post">
                            <input type = "email" name = "sub" class = my_style placeholder = "Your Email Address" required>
                            <input type = "submit" value = "Subscribe!">
                        </form>
                        
                        
                    </div>
                </div> -->
                
        </div> <!-- end s-footer__main -->
        <?php
            if (isset($_POST["sub"]))
            {
                $obtained_email = mysqli_real_escape_string($is_connected, trim($_POST["sub"]));
                $write_query = "INSERT INTO users_table(user_name, user_password, user_first_name, user_last_name, user_email, user_image, role, rand_salt)";
                $write_query .= "VALUES('*******************', '', 'News', 'Letter', '{$obtained_email}', '', 'Subscriber', '')";

                $is_successful = mysqli_query($is_connected, $write_query);

                if ($is_successful)
                {
                    $msg = "Thank you for subscribing to <strong> Blogs by Uzair Afzal. </strong> \nYou will get a notification everytime a new blog is published \n\nTake good care, \nUzair Afzal";
                    $msg = wordwrap($msg, 100);
                    $header = "From: Uzair Afzal";
                    mail($obtained_email, "Blogs by Uzair Afzal", $msg, $header);
                ?>
                    <script>
                        alert("Thank you <?php echo $obtained_email?> for subscribing to Blogs by Uzair Afzal!");
                    </script>
                    <?php 
                }
            }
        ?>
        <div class="s-footer__bottom">
            <div class="row">
                <div class="col-full">
                    <div class="s-footer__bottom">
                        <div class="row">
                            <div class="col-full">
                                <div class="s-footer__copyright" style = "font-size: 7px; text-align: center;">
                                    <span>© Copyright Philosophy 2018</span>
                                    <span>Site Template by <a href="https://colorlib.com/">Colorlib</a></span>
                                </div>

                                <div class="go-top">
                                    <a class="smoothscroll" title="Back to Top" href="#top"></a>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end s-footer__bottom -->

                    <div class="go-top">
                        <a class="smoothscroll" title="Back to Top" href="#top"></a>
                    </div>
                </div>
            </div>
        </div> <!-- end s-footer__bottom -->
    </footer> <!-- end s-footer -->

    <!-- preloader
    ================================================== -->
    <div id="preloader">
        <div id="loader">
            <div class="line-scale">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>

    <!-- Java Script
    ================================================== -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    </body>

    </html>


<style>
    .my_style
    {
        width: 100%;
    }
</style>
<!-- 

    <form id="mc-form" class="group" novalidate="true" method = "post">
                            <input type="email" value="" name="EMAIL" class="email" id="mc-email"
                                placeholder="Your Email Address" required="">
                            <input type="submit" name="sub" value="Subscribe!">
                            <label for="mc-email" class="subscribe-message"></label>
                        </form> -->