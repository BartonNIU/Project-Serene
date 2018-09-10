<?php include "includes/header.php"; ?>
            <!-- wrapper -->	
            <div id="wrapper">
                <!--  content  --> 
                <div class="content">
                    <!--  section  --> 
                    <section class="parallax-section" data-scrollax-parent="true" id="sec1">
<!--                        <div class="bg par-elem "  data-bg="images/bg/1.jpg" data-scrollax="properties: { translateY: '30%' }"></div>-->
                        <div class="overlay"></div>
                        <div class="bubble-bg"></div>
                        <div class="container">
                            <div class="error-wrap">
                                <h2>404</h2>
                                <h3>We're sorry, but the Page you were looking for, <?php echo $_SERVER['REQUEST_URI']; ?> ,couldn't be found.</h3>
                                <div class="clearfix"></div>
                              <!--  <form action="#">
                                    <input name="se" id="se" type="text" class="search" placeholder="Search.." value="Search...">
                                    <button class="search-submit" id="submit_btn"><i class="fa fa-search transition"></i> </button>
                                </form>
                                <div class="clearfix"></div>
                                <p>Or</p>-->
                                <a href="index.php" class="btn  big-btn  color-bg flat-btn">Back to Home Page<i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </section>
                    <!--  section  end--> 
                    <!--  section  --> 
                    <section class="gradient-bg">
                       <!-- <div class="cirle-bg">
                            <div class="bg" data-bg="images/bg/circle.png"></div>
                        </div>
                        <div class="container">
                            <div class="join-wrap fl-wrap">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h3>Join our online community</h3>
                                        <p>Grow your marketing and be happy with your online business</p>
                                    </div>
                                    <div class="col-md-4"><a href="#" class="join-wrap-btn modal-open">Sign Up <i class="fa fa-sign-in"></i></a></div>
                                </div>
                            </div>
                        </div>-->
                    </section>
                    <!--  section end --> 
                    <div class="limit-box"></div>
                </div>
                <!--  content end  --> 
            </div>
            <!-- wrapper end -->
            <!--footer -->
                <?php include "includes/footer.php"; ?>
            <!--footer end  -->
            <!--register form -->
                <?php include "includes/registerform.php"; ?>
            <!--register form end -->
            <a class="to-top"><i class="fa fa-angle-up"></i></a>
        </div>
        <!-- Main end -->
        <!--=============== scripts  ===============-->
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugins.js"></script>
        <script type="text/javascript" src="js/scripts.js"></script>
    </body>
</html>