<?php
	ob_start();
	session_start();
    $pageTitle = 'course_content';
    $Title = 'exams';
	include 'inital.php';
    include "check_token.php";
    $getUser = $con->prepare("SELECT * FROM members WHERE username = ?");
    $getUser->execute(array($sessionUser));
    $info = $getUser->fetch();
    if (isset($_SESSION['user']) && $info['regstatus'] == 1) {
         // Check If Get Request item Is Numeric & Get Its Integer Value
        $exam_id = isset($_GET['exam_id']) && is_numeric($_GET['exam_id']) ? intval($_GET['exam_id']) : 0;
        $exams = $con->prepare("SELECT * FROM exams WHERE exam_id = ?");
        $exams->execute(array($exam_id));
        $count = $exams->rowCount();
        if ($count > 0) {
            $exam = $exams->fetch();
?>
<body>
<div class="wrapper d-flex align-items-stretch">
    <!-- Page Content  -->
    <div id="content">
        <?php include $tpl . 'partial/header_2.php'; ?>
        <section class="section7">
            <form class="sign" action="end.php?exam_id=<?php echo $exam['exam_id'];?>" method="POST">
                <div class="container exam">
                    <div class="card">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="ml-auto px-2"><?php echo $exam['exam_name'];?></li>
                                <li class="px-2"><a href="course_content.php"> / الرئيسية</a></li>
                            </ol>
                        </nav>
                        <h2 class="card-title text-center"><?php echo $exam['exam_name'];?></h2>
                        <div id="demoB" style="width: 100%;"></div>
                        <div class="card-body">
                                <div class="exam_content text-right">
                                 <?php
                                $answers = array();
                                $number = $exam['number']; 
                                $stmt = $con->prepare('SELECT 
                                                            * 
                                                        FROM 
                                                            question
                                                        where
                                                        exam_id = ?
                                                        
                                                        ORDER BY RAND() 
                                                        LIMIT ' . $number);
                                $stmt->execute(array($exam['exam_id']));
                                $exams = $stmt->fetchAll();
                                foreach ($exams as $exam ) { 
                                    if ($exam['answer'] == ''){ ?>
                                        <div class="question">
                                            <h4> ◈ <?php echo $exam['ques'];?></h4>
                                            <?php  
                                                if (isset($exam['photo'])&&$exam['photo']!=='') {
                                                    ?>
                                                        <img src="admin/uploads/<?php echo $exam['photo']; ?>" width="100%">
                                                    <?php
                                                }
                                            ?>
                                            <label for="chose1"><?php echo $exam['answer_1'];?></label>
                                            <input type="hidden" name="<?php echo $exam['id'];?>" value="<?php echo $exam['id'];?>">
                                            <input type="radio" id="chose1" name="<?php echo 'main'.$exam['id']; ?>" value="1"><br>
                                            <label for="chose2"><?php echo $exam['answer_2'];?></label>
                                            <input type="radio" id="chose2" name="<?php echo 'main'.$exam['id']; ?>" value="2"><br>
                                            <label for="chose3"><?php echo $exam['answer_3'];?></label>
                                            <input type="radio" id="chose3" name="<?php echo 'main'.$exam['id']; ?>" value="3"><br>
                                            <label for="chose4"><?php echo $exam['answer_4'];?></label>
                                            <input type="radio" id="chose4" name="<?php echo 'main'.$exam['id']; ?>" value="4"><br>
                                        </div>
                                        <hr>
                                    <?php } else { ?>
                                        <div class="question">
                                            <h4> ◈ <?php echo $exam['ques'];?></h4>
                                            <input type="hidden" name="<?php echo $exam['id'];?>" value="<?php echo $exam['id'];?>">
                                            <textarea placeholder="دون أجابتك" style="width: 100%;
    text-align: right;
    background-color: #eee;
    border: 0;
    min-height: 80px;
    padding: 10px;
    margin-bottom: 10px;" name="<?php echo 'main'.$exam['id']; ?>" required></textarea>
                                            </textarea>
                                        </div>
                            <?php } } ?>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="content_control text-center">
                    <div class="center_content">
                        <button class="submit" name="exam">ارسال الامتحان</button>
                    </div>
                </div>
            </form>
        </section>
    </div>
</div>
<?php include $tpl .'partial/footer.php'; ?>
<div id="scroll-top">
    <i class="fa fa-chevron-up"></i>
</div>
</body>
<?php
include $tpl .'scripts.php'; 
}else {
    echo '<div class="ads container text-right">';
        echo '<div class="alert alert-danger">لا يوجد امتحان بهذا العنوان حتى الان</div>';
    echo '</div>';
}
}else {
    header('Location: reg.php');
    exit();
}
ob_end_flush();
?>