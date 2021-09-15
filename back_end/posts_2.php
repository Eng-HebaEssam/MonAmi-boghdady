<?php
ob_start();
session_start();
$pageTitle = 'posts2';
$Title = 'posts2';
include 'inital.php';
include "check_token.php";
$getUser = $con->prepare("SELECT * FROM members WHERE username = ?");
$getUser->execute(array($sessionUser));
$info = $getUser->fetch();
if (isset($_SESSION['user']) && $info['regstatus'] == 1) { 
    include $tpl . 'header2.php'; 
    $getposts = $con->prepare("SELECT * FROM post where type = 1 ORDER BY post_id  DESC");
    $getposts->execute();
    $posts = $getposts->fetchAll();
?>
<main id="main" style="direction: rtl;">
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
            <h2 class="mt-2 text-right">المقالات</h2>
            <ol>
                <li><a href="main.php">الرئيسية</a></li>
                <li>المقالات</li>
            </ol>
            </div>
        </div>
    </section>
    <section id="blog" class="blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 entries">
                    <?php foreach ($posts as $post){ ?>
                        <article class="entry" data-aos="fade-up">
                            <div class="entry-img">
                                <img src="admin/uploads/<?php echo $post['post_image'] ;?>" alt="main" width="100%">
                            </div>
                            <h2 class="entry-title">
                                <a href="postcontent.php?postid=<?php echo $post['post_id'] ;?>"><?php echo $post['post_name'] ;?></a>
                            </h2>
                            <div class="entry-meta">
                                <ul>
                                <li class="d-flex align-items-center"><i class="bx bx-user"></i> <a href="blog-single.html">  مسيو محمد البغدادى  </a></li>
                                <li class="d-flex align-items-center"><i class="bx bx-time-five"></i> <a href="blog-single.html"><time datetime="2020-01-01">  <?php echo $post['post_data'] ;?>  </time></a></li>
                                </ul>
                            </div>
                            <div class="entry-content">
                                    <p>
                                        <?php
                                            $stringCut = substr( $post['post_description'], 0, 300);
                                            $endPoint = strrpos($stringCut, ' ');
                                            $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                            echo $string ;
                                        ?>
                                    </p>
                                    <div class="read-more"><a href="postcontent.php?postid=<?php echo $post['post_id'] ;?>"><i class="bx bx-chevron-left"></i>المزيد</a></div>
                            </div>
                        </article>
                    <?php } ?>
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
    header('Location: index.php');
    exit();
}
ob_end_flush();
?>