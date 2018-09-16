<?php include "includes/header.php"; ?>
<!-- wrapper -->
<div id="wrapper">
    <!--  content  -->
    <div class="content">
        <!--  section  -->
        <section class="parallax-section" data-scrollax-parent="true" id="sec1">
            <div class="overlay"></div>
            <div class="bubble-bg"></div>
            <div class="container">
                <div class="error-wrap">
                    <h2>404</h2>
                    <p>We're sorry, but the Page you were looking for, <?php echo $_SERVER['REQUEST_URI']; ?> ,couldn't be found.</p>
                    <div class="clearfix"></div>
                    <a href="index.php" class="btn  big-btn  color-bg flat-btn">Back to Home Page<i class="fa fa-angle-right"></i></a>
                </div>
            </div>
        </section>
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