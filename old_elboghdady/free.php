<?php
    ob_start();
    session_start();
    $pageTitle = 'free';
    $Title = '';
    if (isset($_SESSION['user'])) {
		header('Location: main.php');
	}
    include 'inital.php';
?>
<body>
    <?php include $tpl . 'partial/header.php'; ?>
    <section class="section2_6">
        <div class="container">
            <h2 style="color: #3f3332;">أخر الفيديوهات &#9827;</h2>
            <div class="alert alert-primary text-right" role="alert">
                <h4 class="alert-heading">هذه الفيديوهات مجانية ومتاحة للجميع</h4>
                <p> هذه الفيديوهات مجانية ومتاحة للجميع ويمكنك التسجيل للاطلاع علي فيديوهات الشرح</p>
            </div>
            <?php
                if (isset($_SESSION['uid'])){
                    $_SESSION['uid'] = $_SESSION['uid'];
                } else {$_SESSION['uid'] = 6568968565685656565665865656565;}
                $stmt = $con->prepare("SELECT * FROM lesson_member WHERE member_id = ? AND type =1");
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
                        <div class="col-md-4">
                            <div class="card mb-2">
                                <div class="main_video"><?php echo $main['video'] ; ?></div>
                                <h4 class="text-center p-3"><?php echo $main['lesson_name'] ; ?></h4>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
            <?php } else { 
            ?>
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-2">
                        <img src="layouts/img/services-1.jpg" alt="">
                        <i class="fab fa-youtube" data-toggle="modal" data-target="#exampleModal"></i>
                        <h4 class="text-center p-3">امتحان الدرس الاول ثالثة ثانوي كتاب Merci </h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-2">
                        <img src="layouts/img/services-2.jpg" alt="">
                        <i class="fab fa-youtube" data-toggle="modal" data-target="#exampleModal_2"></i>
                        <h4 class="text-center  p-3">امتحان مطابق للمواصفات الجديدة</h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="layouts/img/services-3.jpg" alt="">
                        <i class="fab fa-youtube" data-toggle="modal" data-target="#exampleModal_3"></i>
                        <h4 class="text-center  p-3">تدريبات الدرس الأول بالنظام الجديد2021</h4>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <iframe width="100%" height="500" src="https://www.youtube.com/embed/JS91V3l-WtM" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModal_2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <iframe width="100%" height="500" src="https://www.youtube.com/embed/hNAjeWE3SA8" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>        
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModal_3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <iframe width="100%" height="500" src="https://www.youtube.com/embed/TVwlCuGml5k" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>            
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </section>
    <!-- end of cards-2 -->
    <!-- end of services -->
    <?php 
        include $tpl . 'partial/footer.php';
        include $tpl . 'partial/login.php';
    ?>
    <div id="scroll-top">
        <i class="fa fa-chevron-up"></i>
    </div>
</body>
<?php 
include $tpl . 'scripts.php'; 
ob_end_flush();
?>