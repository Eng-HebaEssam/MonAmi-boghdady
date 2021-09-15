<?php
	ob_start();
	session_start();
    $pageTitle = 'main';
    $Title = 'main';
	include 'inital.php';
    include "check_token.php";
    $getUser = $con->prepare("SELECT * FROM members WHERE username = ?");
    $getUser->execute(array($sessionUser));
    $info = $getUser->fetch();
    if (isset($_SESSION['user']) && $info['regstatus'] == 1) {
        include $tpl . 'header2.php'; 
        $username  = $info['username'];
        $groupid  = $info['groupid'];
        $category_id = isset($_GET['catygory_id']) && is_numeric($_GET['catygory_id']) ? intval($_GET['catygory_id']) : 0;
        $getlessons = $con->prepare("SELECT * FROM lessons WHERE cat_id = ?");
        $getlessons->execute(array($category_id));
        $count = $getlessons->rowCount();
        if ($count > 0) {
            $lessons = $getlessons->fetchAll();
            $categories = $con->prepare("SELECT category_name, image, category_description FROM category where category_id = ?");
            $categories->execute(array($category_id));
            $category = $categories->fetch();
?>
<main id="main" dir="rtl">
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
            <h2 class="mt-2 text-right">القسم</h2>
            <ol>
                <li><a href="main.php">الرئيسية</a></li>
                <li>القسم</li>
            </ol>
            </div>
        </div>
    </section>
    <section id="services" class="services section11">
        <div  class="container">
            <div class="row">
                <div class="card text-center">
                    <div class="card-header">
                        <h2><?php echo $category['category_name'];?></h2>
                        <p><?php echo $category['category_description'];?></p>
                    </div>
                    <img src="admin/uploads/<?php echo $category['image'];?>"  class="card-img-top">
                    <div class="card-footer text-muted pt-5">
                        <h3 style="font-weight: bold;">محتويات الكورس</h3>
                    </div>
                    <div class="card-body section-bg">
                        <div class="row">
                            <?php foreach($lessons as $index => $lesson){ ?>
                                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="100">
                                    <div class="icon-box iconbox-blue">
                                        <div class="icon">
                                            <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,521.0016835830174C376.1290562159157,517.8887921683347,466.0731472004068,529.7835943286574,510.70327084640275,468.03025145048787C554.3714126377745,407.6079735673963,508.03601936045806,328.9844924480964,491.2728898941984,256.3432110539036C474.5976632858925,184.082847569629,479.9380746630129,96.60480741107993,416.23090153303,58.64404602377083C348.86323505073057,18.502131276798302,261.93793281208167,40.57373210992963,193.5410806939664,78.93577620505333C130.42746243093433,114.334589627462,98.30271207620316,179.96522072025542,76.75703585869454,249.04625023123273C51.97151888228291,328.5150500222984,13.704378332031375,421.85034740162234,66.52175969318436,486.19268352777647C119.04800174914682,550.1803526380478,217.28368757567262,524.383925680826,300,521.0016835830174"></path>
                                            </svg>
                                            <?php 
                                                $vars = array("bx-blanket", "bx-book-open", "bx-camera-movie", "bx-cast", "bx-clipboard", "bx-food-menu");
                                                $key = array_rand($vars);
                                            ?>
                                            <i class="bx <?php echo $vars[$key]; ?>"></i>
                                            </div>
                                            <div class="card-body">
                                            <h4><?php echo $lesson['lesson_name']; ?></h4>
                                            <p>
                                            <?php
                                                $stringCut = substr( $lesson['lesson_description'], 0, 100);
                                                $endPoint = strrpos($stringCut, ' ');
                                                $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                                echo $string ;?>
                                            </p>
                                            <div class="second mt-4">
                                                <?php 
                                                    $getexam = $con->prepare("SELECT exam_id FROM exams WHERE lesson_id = ? AND type = 1 ");
                                                    $getexam->execute(array($lesson['lesson_id']));
                                                    $getexam = $getexam->fetch();
                                                    if(! empty($getexam)){
                                                        echo '<a href="exam.php?exam_id='.$getexam['exam_id'].'" >الامتحان</a>';
                                                    }
                                                ?>
                                                <a href="lesson.php?lesson_id=<?php echo $lesson['lesson_id']; ?>" >الدرس</a>
                                            </div>
                                        </div>
                                    </div>
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
        } else { 
            header('Location: none.php');
            exit();
        }
}else {
    header('Location: index.php');
    exit();
}
ob_end_flush();
?>