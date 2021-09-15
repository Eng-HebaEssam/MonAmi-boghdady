<?php 
ob_start();
session_start();
if (isset($_SESSION['username'])) {
    $pageTitle = 'Dashboard';
    include 'inital.php';
    $numUsers = 8;
    $latestUsers = getLatest("*", "members", "userid", $numUsers);
    $numlessons = 6;
    $latestlessons = getLatest("*", 'lessons', 'lesson_id', $numlessons);
    $numposts = 6;
    $latestposts = getLatest("*", 'post', 'post_id', $numposts);
    $nummessage = 7;
    $message = getLatest("*", 'message', 'id', $nummessage);
    $numComments = 4;
include 'includes/templates/header.php';
include 'includes/templates/side.php';
?>
<div class="main-panel ">
    <div class="content-wrapper ">
        <div class="page-header ">
            <h3 class="page-title ">
                <span class="page-title-icon bg-gradient-primary text-white mr-2 ">
                <i class="mdi mdi-home "></i>
                </span>&nbsp; الصفحه الرئيسية
            </h3>
        </div>
        <div class="row">
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                    <div class="card-body">
                        <img src="layout/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image">
                        <h4 class="font-weight-normal mb-3"> عدد الطلاب <i class="mdi mdi-account-multiple-plus mdi-24px float-right"></i>
                        </h4>
                        <h2 class="mb-5"> <?php echo countItems('userid', 'members') ?> طالب </h2>
                        
                    </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                  <div class="card-body">
                    <img src="layout/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image">
                    <h4 class="font-weight-normal mb-3"> عدد الامتحانات <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5"> <?php echo countItems('exam_id', 'exams') ?> امتحان</h2>
                   
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                  <div class="card-body">
                    <img src="layout/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image">
                    <h4 class="font-weight-normal mb-3"> عدد الدروس <i class="mdi mdi-note-multiple-outline mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5"> <?php echo countItems('lesson_id', 'lessons') ?> درس </h2>
                  </div>
                </div>
              </div>
            </div>
        <div class="row ">
            <div class="col-12 grid-margin ">
                <div class="card ">
                    <div class="card-body ">
                        <h2> اخرالطلاب</h2>
                        <div class="table-responsive ">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th>الرقم التعريفي</th>
                                        <th> اسم المستخدم </th>
                                        <th> الايميل  </th>
                                        <th>حاله التسجيل</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if (! empty($latestUsers)) {
                                            foreach ($latestUsers as $user) {
                                                    echo '<tr>';
                                                        echo '<td>'.$user['userid']. '</td>';
                                                        echo '<td>'.$user['username']. '</td>';
                                                        echo '<td>'.$user['email']. '</td>';
                                                        echo '<td>';
                                                            if($user['regstatus']==0){echo'<label class="badge badge-gradient-warning">غير مفعل</label>';}
                                                            else {echo'<label class="badge badge-gradient-success"> مفعل</label>';}
                                                        echo '</td>';
                                                    echo '</tr>';
                                                }
                                            } else {
                                                echo 'لا يوجد اعضاء';
                                            }
                                        ?> 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 grid-margin ">
                <div class="card ">
                    <div class="card-body ">
                        <h4> اخر الدروس</h4>
                        <div class="table-responsive ">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th>الرقم التعريفي</th>
                                        <th> اسم الدرس</th>
                                        <th> ورق الشرح</th>
                                        <th> تاريخ النشر</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    if (! empty($latestlessons)) {
										foreach ($latestlessons as $lesson) {
                                                echo '<tr>';
                                                    echo '<td>'.$lesson['lesson_id']. '</td>';
                                                    echo '<td>'.$lesson['lesson_name']. '</td>';
                                                    echo '<td>';
                                                        if($lesson['pdf']==''){echo'<label class="badge badge-gradient-warning">لا يوجد</label>';}
                                                        else {echo'<label class="badge badge-gradient-success"> يوجد ورق شرح</label>';}
                                                    echo '</td>';
                                                    echo '<td>'.$lesson['lesson_data']. '</td>';
                                                echo '</tr>';
                                            }
                                        } else {
                                            echo 'لا يوجد اعضاء';
                                        }
                                    ?> 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 grid-margin ">
                <div class="card ">
                    <div class="card-body ">
                        <h4> اخر الرسائل</h4>
                        <div class="table-responsive ">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th>كاتب الرسالة</th>
                                        <th>الرسالة</th>
                                        <th>التاريخ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
									$stmt = $con->prepare("SELECT 
																message.*, members.username AS Member  
															FROM 
                                                                message
															INNER JOIN 
																members 
															ON 
																members.userid = message.user_id
															ORDER BY 
                                                                id DESC
															LIMIT $nummessage");
									$stmt->execute();
									$comments = $stmt->fetchAll();
									if (! empty($comments)) {
										foreach ($comments as $comment) {
                                                echo '<tr>';
                                                    echo '<td>'; 
                                                        if($comment['user_id']==''){echo $comment['username'];}
                                                        else {echo $comment['Member'];}
                                                    echo '</td>';
                                                    echo '<td>'. $comment['message']. '</td>';
                                                    echo '<td>'. $comment['date']. '</td>';
                                                echo '</tr>';
                                            }
                                        } else {
                                            echo 'لا يوجد اعضاء';
                                        }
                                    ?> 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </div>
<?php 
include 'includes/templates/footer.php';
} else {
    header('Location: index.php');
    exit();
}
ob_end_flush(); 
?>