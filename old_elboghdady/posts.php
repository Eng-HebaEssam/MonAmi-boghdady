<?php
ob_start();
session_start();
$pageTitle = 'posts';
$Title = '';
include 'inital.php';
include "check_token.php";
$getUser = $con->prepare("SELECT * FROM members WHERE username = ?");
$getUser->execute(array($sessionUser));
$info = $getUser->fetch();
if (isset($_SESSION['user']) && $info['regstatus'] == 1) { 
    $getposts = $con->prepare("SELECT * FROM post where type = 1");
    $getposts->execute();
    $posts = $getposts->fetchAll();
?>
<body>
<?php include $tpl . 'partial/header_2.php'; ?>
<section class="section2_9 text-right">
        <div class="container">
            <h2>كل <span class="strong">المقالات</span></h2>
            <?php 
                foreach ($posts as $post){
                    ?>
                    <div class="row">
                        <div class="col-md-8" style="padding: 30px;">
                            <h3><?php echo $post['post_name'] ;?></h3>
                            <p><?php echo $post['post_description'] ;?></p>
                            <a href="postcontent.php?postid=<?php echo $post['post_id'] ;?>">....اقرا المزيد</a>
                            <h6 class="text-left text-secondary" style="margin-top: 10px;"><?php echo $post['post_data'] ;?></h6>
                        </div>
                        <div class="col-md-4" style="padding: 0;">
                            <?php
                                if (isset($post['post_image']) && $post['post_image'] !== '') {
                                    echo '<img src="admin/uploads/'.$post['post_image'].'" class="card-img-top" alt="...">';
                                } else{
                                    echo '<img src="layouts/img/important.jpg" class="card-img-top" alt="...">';
                                }
                            ?>
                        </div>
                    </div>
                    <?php
                }
            ?>
        </div>
    </section>
<?php include $tpl . 'partial/footer.php'; ?>
<div id="scroll-top">
    <i class="fa fa-chevron-up"></i>
</div>
</body>
<?php
include $tpl . 'scripts.php'; 
}else {
    header('Location: reg.php');
    exit();
}
ob_end_flush();
?>
