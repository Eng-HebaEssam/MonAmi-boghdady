<a href="#" class="back-to-top"><i class="bx bx-upvote"></i></a>
<!-- Vendor JS Files -->
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
<!-- <script src="assets/vendor/php-email-form/validate.js"></script> -->
<script src="assets/vendor/jquery-sticky/jquery.sticky.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/venobox/venobox.min.js"></script>
<script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
    <?php 
    if($pageTitle == 'exam'){
        echo '
            <script>
                window.addEventListener("load", function () {
                    counter.init("demoB", '.$time.', function(idx){
                        window.location.replace("time_out.php");
                    });
                });
            </script>
            <script src="assets/js/countdowns.js"></script>
        ';
    }
    ?>
    <?php if($Title == 'activities'){ ?>
        <script>
            $('.show_btn').on('click', function(){
            $selected = $(this).data('show_item');
            $(this).parent().nextAll("#"+ $selected).fadeIn().siblings('.show_item').fadeOut();
        });
        </script>
    <?php } ?>
    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
</body>
</html>

