<?php
ob_start();
session_start();
$pageTitle = 'posts2';
$Title = 'postContent';
include 'inital.php';
include "check_token.php";
$getUser = $con->prepare("SELECT * FROM members WHERE username = ?");
$getUser->execute(array($sessionUser));
$info = $getUser->fetch();
if (isset($_SESSION['user']) && $info['regstatus'] == 1) {  
    $post_id = isset($_GET['postid']) && is_numeric($_GET['postid']) ? intval($_GET['postid']) : 0;
    $getposts = $con->prepare("SELECT * FROM post where post_id = ?");
    $getposts->execute(array($post_id));
    $post = $getposts->fetch();
    if(!empty($post)){
    include $tpl . 'header2.php';
?>
<main id="main" style="direction: rtl;">
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
            <h2 class="mt-2 text-right"><?php echo $post['post_name'] ;?></h2>
            <ol>
                <li><a href="index.html">الرئيسية</a></li>
                <li><?php echo $post['post_name'] ;?></li>
            </ol>
            </div>
        </div>
    </section>
    <section id="blog" class="blog">
    <div class="container">
        <?php 
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $comment 	= filter_var($_POST['comment'], FILTER_SANITIZE_STRING);
                $userid 	= $_SESSION['uid'];
                if (! empty($comment)) {
                    $stmt = $con->prepare("INSERT INTO 
                        comments(comment, status, comment_data, post_id, member_id)
                        VALUES(:zcomment, 0, NOW(), :post_id, :zuserid)");
                    $stmt->execute(array(
                        'zcomment' => $comment,
                        'post_id' => $post_id,
                        'zuserid' => $userid
                    ));
                    if ($stmt) {
                        echo '<div class="alert mt-3 alert-success text-center alert-dismissible fade show" role="alert" id="alert-message">
                                تم اضافة التعليق في انتظار الموافقة
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>';
                    }
                } else {
                    echo '<div class="alert mt-3 alert-warning alert-dismissible text-center fade show" role="alert" id="alert-message">
                            يجب عليك اضافة التعليق
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>';
                }
            }
        ?>
        <div class="row">
            <div class="col-lg-8 entries">
                <article class="entry entry-single" data-aos="fade-up">
                    <div class="entry-img">
                        <img src="admin/uploads/<?php echo $post['post_image'];?>" alt="" class="img-fluid">
                    </div>
                    <h2 class="entry-title">
                        <?php echo $post['post_name'] ;?>
                    </h2>
                    <div class="entry-meta">
                        <ul>
                        <li class="d-flex align-items-center"><i class="bx bx-user"></i>  مسيو محمد البغدادى </li>
                        <li class="d-flex align-items-center"><i class="bx bx-time-five "></i> <time datetime="2020-01-01">  <?php echo $post['post_data'] ;?>  </time></li>
                        </ul>
                    </div>
                    <div class="entry-content">
                        <p><?php echo $post['post_description'] ;?></p>
                    </div>
                    <div class="entry-footer clearfix">
                        <div class="float-left">
                            <ul class="cats">
                                <li><a href="posts.php">الرئيسية</a></li>
                            </ul>
                        </div>
                        <div class="float-right share">
                            <a href="https://wa.me/+0201111784242"><i class="bx bxl-whatsapp"></i></a>
                            <a href="https://www.facebook.com/groups/646058849298314/?ref=share"><i class="bx bxl-facebook"></i></a>
                            <a href="https://www.youtube.com/channel/UCPTVpli6kpi08OdsMkLFwlQ/featured"><i class="bx bxl-youtube"></i></a>
                        </div>
                    </div>
                </article>
                <div class="blog-comments text-right" data-aos="fade-up">
                    <h4 class="comments-count">التعليقات</h4>
                    <?php    
                        $stmt = $con->prepare("SELECT 
                                                    comments.*, members.username AS Member, members.avatar As image  
                                                FROM 
                                                    comments
                                                INNER JOIN 
                                                    members 
                                                ON 
                                                    members.userid = comments.member_id
                                                WHERE 
                                                    post_id = ?
                                                AND 
                                                    status = 1
                                                ORDER BY 
                                                    post_id desc");
                        $stmt->execute(array($post['post_id']));
                        $comments = $stmt->fetchAll();
                        if (! empty($comments)) {
                        foreach ($comments as $comment) {
                    ?>
                    <div id="comment-1" class="comment clearfix">
                        <img src="assets/img/img.png" class="comment-img float-right" alt="">
                        <h5><?php echo $comment['Member'] ?></h5>
                        <time datetime="2020-01-01"><?php echo $comment['comment_data'] ?></time>
                        <p><?php echo $comment['comment'] ?></p>
                    </div>
                    <hr>
                    <?php } } else {
                        echo '<h4>لا يوجد تعليقات بعد</h4>';
                    }?>
                    <div class="reply-form text-right">
                        <h4>اضف تعليق</h4>
                        <p>* سيتم مراجعة التعليق قبل عرضة</p>
                        <form action="postcontent.php?postid=<?php echo $post['post_id'] ;?>" method="POST">
                            <div class="row ">
                                <div class="col form-group">
                                    <textarea name="comment" class="form-control" placeholder="اضف التعليق"></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">اضافة تعليق</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar text-right" data-aos="fade-left">
                    <h3 class="sidebar-title">اخر المقالات</h3>
                    <div class="sidebar-item recent-posts">
                        <?php 
                            $sts = $con->prepare("SELECT * FROM post where type = 1 ORDER BY post_id  DESC limit 4");
                            $sts->execute();
                            $sts = $sts->fetchAll();
                            foreach($sts as $last_post){ 
                        ?>
                            <div class="post-item clearfix">
                                <img src="admin/uploads/<?php echo $last_post['post_image'] ;?>" alt="">
                                <h4><?php echo $last_post['post_name']; ?></h4>
                                <time datetime="2020-01-01"><?php echo $last_post['post_data']; ?></time>
                            </div>
                        <?php } ?>
                    </div>
                    <hr>
                    <h3 class="sidebar-title">اخر المنشورات</h3>
                    <div class="sidebar-item recent-posts">
                        <?php 
                            $sts = $con->prepare("SELECT * FROM post where type = 0 AND cat_id = ? ORDER BY post_id  DESC limit 4");
                            $sts->execute(array($info['groupid']));
                            $sts = $sts->fetchAll();
                            foreach($sts as $last_act){ 
                        ?>
                        <div class="post-item clearfix">
                            <img src="admin/uploads/<?php echo $last_act['post_image'] ;?>" alt="">
                            <h4><?php echo $last_act['post_name']; ?></h4>
                            <time datetime="2020-01-01"><?php echo $last_act['post_data']; ?></time>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
</main>
<?php
include $tpl . 'footer.php'; 
include $tpl . 'scripts.php'; 
}else {
    header('Location: 404-error.php');
    exit();
}
}else {
    header('Location: index.php');
    exit();
}
ob_end_flush();
?>