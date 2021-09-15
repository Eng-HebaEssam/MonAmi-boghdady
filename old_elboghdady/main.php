<?php
	ob_start();
	session_start();
    $pageTitle = 'main';
    $Title = '';
	include 'inital.php';
    include "check_token.php";
    $getUser = $con->prepare("SELECT * FROM members WHERE username = ?");
    $getUser->execute(array($sessionUser));
    $info = $getUser->fetch();
    if (isset($_SESSION['user']) && $info['regstatus'] == 1) {
        $username  = $info['username'];
        $groupid  = $info['groupid'];
        $categories = $con->prepare("SELECT category_name, category_id FROM category where parent = 0 And ordering= ? ORDER BY ordering asc");
        $categories->execute(array($groupid));
        $category_name = $categories->fetch();

        $activities = $con->prepare("SELECT post_name FROM post where type = 0 AND cat_id = ?   ORDER BY post_id  DESC limit 1");
        $activities->execute(array($groupid));
        $activity = $activities->fetch();

        $posts = $con->prepare("SELECT post_name FROM post where type = 1 ORDER BY post_id  DESC limit 1 ");
        $posts->execute();
        $post = $posts->fetch();
?>
<body>
<?php include $tpl . 'partial/header_2.php'; ?>
<div class="container">
    <section class="bg-welcome">
        <div class="center">
            <h1><small> مرحبا بك</small><br> <?php echo $username;?></h1>
        </div>
    </section>
    <div id="carouselExampleSlidesOnly" class="carousel slide text-center bg-dark text-light" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <h2 class="p-2"> <?php echo $category_name['category_name']; ?></h2>
            </div>
            <div class="carousel-item">
                <h2 class="p-2"> اخر المنشورات المضافة: <?php echo $activity['post_name']; ?></h2>
            </div>
            <div class="carousel-item">
            <h2 class="p-2"> اخر المقالات المضافة: <?php echo $post['post_name']; ?></h2>
            </div>
        </div>
    </div>
</div>
<section class="section8 mb-5">
    <div class="container text-right">
        <nav class="nav" id="myTab" role="tablist">
<a class="nav-link" id="live-tab" data-toggle="tab" href="#live" role="tab" aria-controls="live" aria-selected="true">البث المباشر</a>
            <a class="nav-link" id="allexam-tab" data-toggle="tab" href="#allexam" role="tab" aria-controls="allexam" aria-selected="true">الأمتحانات الشاملة</a>
            <a class="nav-link" id="avcourse-tab" data-toggle="tab" href="#avcourse" role="tab" aria-controls="avcourse" aria-selected="true">الكورسات المتاحه</a>
            <a class="nav-link active" id="mycourses-tab" data-toggle="tab" href="#mycourses" role="tab" aria-controls="mycourses" aria-selected="true">الفوائد التربوية</a>
        </nav>
        <div class="tab-content" id="myTabContent">
<div class="tab-pane fade" id="live" role="tabpanel" aria-labelledby="live-tab">
<?php
$getUser = $con->prepare("SELECT * FROM live WHERE cat_id= ?");
$getUser->execute(array($groupid));
$info = $getUser->fetch();
if (! empty($info )){ ?> 
                            <table class="text-center table table-bordered">
                                <tr class="bg-dark text-light" style="font-weight: bold;">
<td ><a href="<?php echo $info ['link'] ?>" style="font-size:20px; text-decoration:none; color:#b79b6d;">الذهاب للبث</a></td>
                                    <td>يوجد بث مباشر الان او بعد قليل</td>
                                     
                                </tr>
                            </table>
<?php } else {
     echo '<h2 class="text-dark">لا يوجد بث مباشر الان</h2>';
}
?>
</div>
            <div class="tab-pane fade" id="allexam" role="tabpanel" aria-labelledby="allexam-tab">
                <div class="result alls">
                    <h2 class="text-center"><span class="colord">الامتحانات</span></h2>
                    <div class="container">
                        <div class="table-responsive">
                            <table class="text-center table table-bordered">
                                <tr class="bg-dark text-light" style="font-weight: bold;">
                                    <td >رابط الأمتحان</td> 
                                    <td> تاريخ اداء الامتحان</td>
                                    <td> اسم الأمتحان</td>
                                </tr>
                                    <?php
                                    $formErrors = array(); 
                                    $stmt = $con->prepare("SELECT 
                                                                 *  
                                                            FROM 
                                                                exams
                                                            WHERE 
                                                                link != '' 
                                                            ORDER BY exam_date desc");
                                    $stmt->execute(array($_SESSION['uid']));
                                    $exams = $stmt->fetchAll();
                                    foreach ($exams as $exam) {  ?>
                                    <tr>
                                    <td ><a href="<?php echo $exam['link'] ?>" style="font-size:20px; text-decoration:none;color:#b79b6d;">الذهاب للأمتحان</a></td>
                                        <td><?php echo $exam['exam_date'] ?></td>
                                        <td ><?php echo $exam['exam_name'] ?></td>
                                        
                                    </tr>
                                <?php }?>
                            </table>
                        </div>
                    </div>
                </div> 
            </div>
            <div class="tab-pane fade show active" id="mycourses" role="tabpanel" aria-labelledby="mycourses-tab">
                <div class="result alls">
                    <h2 class="text-center"><span class="colord">الفوائد التربوية</span></h2>
                    <div class="container">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <?php 
                                $getUser = $con->prepare("SELECT * FROM benfits limit 3");
                                $getUser->execute();
                                $photos = $getUser->fetchAll();
                                foreach($photos as $key => $photo) {
                                ?>
                                    <div class="carousel-item <?php if($key==0){echo 'active';} ?>">
                                        <img src="admin/uploads/<?php echo $photo['benfit_image']; ?>" class="d-block w-100" height="500" alt="...">
                                        <?php 
                                        if ($photo['description'] !== '') {
                                            echo '<div class="carousel-caption d-none d-md-block">
                                                    <p style="background-color: rgba(0,0,0,0.6);padding: 50px;color: #fff;text-align: center;font-size: 25px;">'. $photo["description"].'</p>
                                                </div>';
                                        }
                                        ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div> 
            </div>
            <div class="tab-pane fade" id="avcourse" role="tabpanel" aria-labelledby="avcourse-tab">
                <h2 class="text-center"><span class="colord"><?php echo $category_name['category_name'];?></span></h2>
                <div class="row mt-4">
                <?php
                    $stmt = $con->prepare("SELECT 
                                                * 
                                                FROM 
                                                    category
                                                WHERE 
                                                    parent = ?
                                                AND
                                                    Visibility = 1 
                                                ORDER BY ordering desc");
                    $stmt->execute(array($category_name['category_id']));
                    $categories = $stmt->fetchAll();
                    foreach($categories as $category) { ?>
                    <div class="col-md-6  col-lg-4">
                        <div class="card">
                            <?php
                                if (isset($category['image']) && $category['image'] !== '') {
                                    echo '<img src="admin/uploads/'.$category['image'].'" class="card-img-top" alt="...">';
                                } else{
                                    echo '<img src="layouts/img/default.jpg" class="card-img-top" alt="...">';
                                }
                            ?>
                            <div class="card-body">
                                <a href="course_content.php?category_id=<?php echo $category['category_id']?> "><?php echo $category['category_name']?></a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include $tpl . 'partial/footer.php'; ?>
<div id="scroll-top">
    <i class="fa fa-chevron-up"></i>
</div>
</body>
<?php
include $tpl . 'scripts.php'; 
} 
else {
    header('Location: reg.php');
    exit();
}
ob_end_flush();
?>