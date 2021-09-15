<?php
	ob_start();
	session_start();
    $pageTitle = 'course_content';
    $Title = '';
	include 'inital.php';
    include "check_token.php";
    $getUser = $con->prepare("SELECT * FROM members WHERE username = ?");
    $getUser->execute(array($sessionUser));
    $info = $getUser->fetch();
    if (isset($_SESSION['user']) && $info['regstatus'] == 1) {
        $username  = $info['username'];
        $groupid  = $info['groupid'];
         // Check If Get Request item Is Numeric & Get Its Integer Value
        $category_id = isset($_GET['category_id']) && is_numeric($_GET['category_id']) ? intval($_GET['category_id']) : 0;
        $getlessons = $con->prepare("SELECT * FROM lessons WHERE cat_id = ?");
        $getlessons->execute(array($category_id));
        $count = $getlessons->rowCount();
        if ($count > 0) {
            $lessons = $getlessons->fetchAll();
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_POST['add'])) {
                    $lesson  = $_POST['lesson_id'];
                    $stmt = $con->prepare("SELECT * FROM lesson_member WHERE lesson_id = ? AND member_id = ?");
                    $stmt->execute(array($lesson, $_SESSION['uid']));
                    $count = $stmt->rowCount();
                    if ($count ==  0) { 
                        $stmt = $con->prepare("INSERT INTO 
                            lesson_member(lesson_id, member_id, date, type)
                            VALUES(:lesson, :member, NOW(), 1)");
                        $stmt->execute(array(
                            'lesson' 	=> $lesson,
                            'member' 	=> $_SESSION['uid']
                        ));
                    }
                }
            }
?>
<body>
    <div class="wrapper d-flex align-items-stretch">
		<nav id="sidebar" class="order-last text-right d-lg-block d-none" >
			<div class="">
                <?php 
                    $categories = $con->prepare("SELECT category_name, image FROM category where category_id = ?");
                    $categories->execute(array($category_id));
                    $category = $categories->fetch();
                ?>
                <?php
                    if (isset($category['image']) && $category['image'] !== '') {
                        echo '<img src="admin/uploads/'.$category['image'].'" class="card-img-top" alt="...">';
                    } else{
                        echo '<img src="layouts/img/default.jpg" class="card-img-top" alt="...">';
                    }
                ?>
				<h2 class="text-center"><a href="index.php" class="logo"><?php echo $category['category_name'];?></a></h2>
				<ul class="list-unstyled components mb-5">
                    <?php 
                        foreach($lessons as $key=>$lesson){
                            ?>
                                <li class="<?php 
                                            if($key==0){echo'active ';} 
                                            echo $key;
                                            ?>">
                                    <button value="<?php echo $key;?>"><?php echo $lesson['lesson_name'];?><span class="fas fa-play-circle mr-3"></span></button>
                                </li>
                            <?php } ?>
				</ul>
			</div>
		</nav>
		<!-- Page Content  -->
		<div id="content">
            <section class="header">
                <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand logo-image " href="index.php"><img src="layouts/img/logo_6.png" width="140"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0 text-center">
                            <li class="nav-item " style="margin-bottom: 9px;">
                                <a class="nav-link_cust" href="logout.php">تسجيل الخروج</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link_cust" href="account.php"> الحساب الشخصى</a>
                            </li>
                            <li class="nav-item" >
                                <a class="nav-link_cust" href="contact_us.php">تواصل معنا</a>
                            </li>
                            <li class="nav-item" >
                                <a class="nav-link_cust" href="activities.php"> المنشورات</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link_cust" href="posts.php">المقالات</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link_cust active_link_cust" href="main.php">الرئيسية <span class="sr-only">(current)</span></a>
                            </li>
                        </ul>
                    </div>
                    <button class="d-lg-block d-none" id="sidebarCollapse"><i class="fa fa-bars"></i></button>
                </nav>
            </section>
			<section class="section7">
				<div class="container content">
                <h2 class="dropdown-submenu d-block d-lg-none">
                    <a  class="dropdown-item" tabindex="-1" href="#">الدروس</a>
                    <ul class="dropdown-menu list-unstyled components">
                    <?php 
                        foreach($lessons as $key=>$lesson){
                            ?>
                                <li class="<?php 
                                            if($key==1){echo'active ';} 
                                            echo $key;
                                            ?>">
                                    <button value="<?php echo $key;?>"><?php echo $lesson['lesson_name'];?></button>
                                </li>
                            <?php
                        }
                    ?>
                    </ul>
                </h2>
                <?php 
                        foreach($lessons as $key=>$lesson){ ?> 
                                <div class="video <?php echo $key; ?> <?php if($key > 0){echo'hidden_val';} ?>" data-index="<?php echo $key; ?>">
                                    <?php
                                        $stmt = $con->prepare("SELECT 
                                                                answer.mark  
                                                            FROM 
                                                                answer
                                                            INNER JOIN 
                                                                exams 
                                                            ON 
                                                                exams.exam_id = answer.exam_id
                                                            where 
                                                                exams.lesson_id = ?
                                                            ");
                                    $stmt->execute(array($lesson['lesson_id']));
                                    $mark = $stmt->fetch();
                                    if ($lesson['Approve'] > 0 || $mark['mark'] > 5){
                                        ?>                            
                                            <div class="card text-right mt-md-3">
                                            <?php echo $lesson['video'];?>							
                                                <div class="card-body">
                                                    <h2><?php echo $lesson['lesson_name'];?></h2>
                                                    <p class="card-text"><?php echo $lesson['lesson_description'];?></p>
                                                    <?php 
                                                        $stmt = $con->prepare("SELECT * FROM lesson_member WHERE lesson_id = ? AND member_id = ?");
                                                        $stmt->execute(array($lesson['lesson_id'], $_SESSION['uid']));
                                                        $count = $stmt->rowCount();
                                                        if ($count ==  0) {
                                                    ?>
                                                    <form action="course_content.php?category_id=<?php echo $lesson['cat_id']?>" method="POST">
                                                        <input type="hidden" name="lesson_id" value="<?php echo $lesson['lesson_id'];?>">
                                                        <button name="add" type="submit" class="main_course_button">المشاهدة لاحقا</button>
                                                    </form>
                                                    <?php } ?>
                                                    <hr>
                                                    <h2>ملحقات الفيديو</h2>
                                                    <div class="buttons text-right">
                                                    <?php 
                                                        $getexam = $con->prepare("SELECT exam_id FROM exams WHERE lesson_id = ?");
                                                        $getexam->execute(array($lesson['lesson_id']));
                                                        $getexam = $getexam->fetch();
                                                        ?>
                                                        <button class="main main_course_button btn <?php if( $getexam['exam_id'] == ''){echo 'disabled';}?>
                                                            "><?php 
                                                                if($getexam['exam_id'] == ''){echo 'لا يوجد امتحان';} else {
                                                                    echo '<a href="exam.php?exam_id='. $getexam['exam_id'].'">الامتحان</a>';
                                                                }
                                                            ?>
                                                        </button>
                                                        <button class="main main_course_button btn <?php if( $lesson['pdf'] == ''){echo 'disabled';}?>
                                                        "><?php 
                                                            if($lesson['pdf'] == ''){echo 'لا يوجد ورق';} else {
                                                                echo '<a href="'. $lesson['pdf'].'">ورق الشرح</a>';
                                                            }
                                                        ?>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php } else {
                                        echo '
                                        <div class="alert alert-warning alert-dismissible fade show text-center" style="font-size:20px;margin-top:50px;" role="alert">
                                        هذا الدرس غير متوفر الا عند اداء الامتحان المخصص له 
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        ';
                                    }
                            echo '</div>';
                            ?><?php
                        }
                    ?>
                    <input type="hidden" class="index"value="<?php echo $key; ?>">
				</div>
				<div class="content_control text-center">
					<div class="center_content">
						<button class="btn" id="next">التالى</button>
						<button class="btn" id="previous">السابق</button>
					</div>
				</div>
			</section>
		</div>
	</div>
<?php include $tpl . 'partial/footer.php'; ?>
<div id="scroll-top">
    <i class="fa fa-chevron-up"></i>
</div>
</body>
<?php
include $tpl . 'scripts.php'; 
}else {
    ?>
    <body>
        <?php include $tpl . 'partial/header_2.php'; ?>
        <div class="container">
        <h2 class="text-center alert alert-danger" style="margin-top: 1.5rem;">لا يوجد دروس بهذا القسم بعد</h2>
            <div class="container"> <img src="layouts/img/opps.jpg" style="width: 100%; height:700px"></div>
        </div>
        <?php include $tpl . 'partial/footer.php'; ?>
    </body>
    <?php
}
}else {
    header('Location: reg.php');
    exit();
}
ob_end_flush();
?>