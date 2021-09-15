<?php
    ob_start();
    if(!isset($_SESSION)){session_start();} 
    $pageTitle = 'free';
    $Title = 'free';
    if (isset($_SESSION['user'])) {
		header('Location: main.php');
	}
    include 'inital.php';
    include $tpl . 'header.php';   
?>
<main id="main" style="direction: rtl;">
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
            <h2 class="mt-2 text-right">الفيديوهات المجانية</h2>
            <ol>
                <li><a href="index.php">الرئيسية</a></li>
                <li>الفيديوهات المجانية</li>
            </ol>
            </div>
        </div>
    </section>
    <section id="testimonials" class="testimonials section-bg">
        <div class="container">
            <?php
                if (isset($_SESSION['uid'])){
                    $_SESSION['uid'] = $_SESSION['uid'];
                } else {$_SESSION['uid'] = 6568968565685656565665865656565;}
                $stmt = $con->prepare("SELECT * FROM lesson_member WHERE member_id = ? AND next_id =1");
                $stmt->execute(array($_SESSION['uid']));
                $count = $stmt->rowCount();
                if ($count >  0) {
                    $lessons= $stmt->fetchAll();
            ?>
                <div class="row">
                    <?php 
                    foreach($lessons as $lesson){
                        $stmt2 = $con->prepare("SELECT * FROM lessons WHERE lesson_id = ? ");
                        $stmt2->execute(array($lesson['lesson_id']));
                        $main = $stmt2->fetch();
                    ?>
                    <div class="col-lg-6" data-aos="fade-up">
                        <?php echo $main['video'] ; ?>
                        <div class="testimonial-item text-right">
                            <img src="assets/img/team/mohamed.png" class="testimonial-img" alt="">
                            <h3>مسيو محمد البغدادى</h3>
                            <p>
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                <?php echo $main['lesson_name'] ; ?>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                            </p>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            <?php } else { 
            ?>
                <div class="row">
                    <div class="col-lg-6 " data-aos="fade-up">
                        <iframe width="100%" height="315" src="https://www.youtube.com/embed/TVwlCuGml5k" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <div class="testimonial-item text-right">
                        <img src="assets/img/team/mohamed.png" class="testimonial-img" alt="">
                        <h3>مسيو محمد البغدادى</h3>
                        <p>
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            تدريبات الدرس الأول بالنظام الجديد2021 مسيو محمد البغدادي
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        </p>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="100">
                        <iframe width="100%" height="315" src="https://www.youtube.com/embed/hNAjeWE3SA8" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <div class="testimonial-item">
                        <img src="assets/img/team/mohamed.png" class="testimonial-img" alt="">
                        <h3>مسيو محمد البغدادى</h3>
                        <p>
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            امتحان مطابق للمواصفات الجديدة كامل أولي ثانوي مسيو محمد البغدادي
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        </p>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-4" data-aos="fade-up" data-aos-delay="200">
                        <iframe width="100%" height="315" src="https://www.youtube.com/embed/JS91V3l-WtM" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <div class="testimonial-item">
                        <img src="assets/img/team/mohamed.png" class="testimonial-img" alt="">
                        <h3>مسيو محمد البغدادى</h3>
                        <p>
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            امتحان الدرس الاول ثالثة ثانوي كتاب Merci مسيو محمد البغدادي
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        </p>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-4" data-aos="fade-up" data-aos-delay="300">
                        <iframe width="100%" height="315" src="https://www.youtube.com/embed/mLEAU-_n-RA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <div class="testimonial-item ">
                        <img src="assets/img/team/mohamed.png" class="testimonial-img" alt="">
                        <h3>مسيو محمد البغدادى</h3>
                        <p>
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            الوحدة 3 درس 2 كتاب ميرسي
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        </p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>
</main>
<?php 
    include $tpl . 'footer.php'; 
    include $tpl . 'scripts.php'; 
    ob_end_flush();
?>