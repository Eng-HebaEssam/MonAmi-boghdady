<?php
    ob_start();
    if(!isset($_SESSION)){session_start();} 
    $pageTitle = 'contact';
    $Title = 'contact';
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
                <h2 class="mt-2 text-right">تواصل معنا</h2>
                <ol>
                    <li><a href="index.php">الرئيسية</a></li>
                    <li>تواصل معنا</li>
                </ol>
            </div>
        </div>
    </section>
    <!-- End Breadcrumbs -->
    <!-- ======= Contact Section ======= -->
    <div class="map-section">
        <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d638578.8656879187!2d30.85574933025395!3d30.795411189402884!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sar!2seg!4v1603370690272!5m2!1sar!2seg" frameborder="0" allowfullscreen></iframe>
    </div>
    <section id="contact" class="contact">
        <div class="container">
        <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $username 	= filter_var($_POST['username'], FILTER_SANITIZE_STRING);
                    $email 	    = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
                    $comment 	= filter_var($_POST['message'], FILTER_SANITIZE_STRING);
                    if (! empty($comment)) {
                        $stmt = $con->prepare("INSERT INTO 
                            message(message, username, email, date)
                            VALUES(:message, :username, :email, NOW())");
                        $stmt->execute(array(
                            'message'   => $comment,
                            'username'  => $username,
                            'email'     => $email
                        ));
                        if ($stmt) {
                            echo '<div class="alert alert-success text-center alert-dismissible fade show" role="alert" id="alert-message">
                                    تم ارسال الرسالة بنجاح
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>';
                        }
                    } else {
                        echo '<div class="alert alert-warning alert-dismissible text-center fade show" role="alert" id="alert-message">
                                يجب عليك اضافة الرساله
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>';
                    }
                }
            ?>
            <div class="row justify-content-center" data-aos="fade-up">
                <div class="col-lg-10">
                    <div class="info-wrap text-right">
                        <div class="row">
                            <div class="col-lg-4 info">
                                <i class="bx bx-map"></i>
                                <h4>الموقع:</h4>
                                <p>كفر الشيخ</p>
                            </div>
                            <div class="col-lg-4 info mt-4 mt-lg-0">
                                <i class="bx bx-envelope"></i>
                                <h4>الايميل:</h4>
                                <p>mohamedbaghday1977@gmail
                            </div>
                            <div class="col-lg-4 info mt-4 mt-lg-0">
                                <i class="bx bx-phone"></i>
                                <h4>رقم الهاتف:</h4>
                                <p>⁦+20 111 178 4242⁩ </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5 justify-content-center" data-aos="fade-up">
                <div class="col-lg-10">
                <form action="contact.php" method="post" role="form" class="php-email-form mt-4">
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" id="name" placeholder="الأسم"  />
                    </div>
                    <div class=" form-group">
                        <input type="email" class="form-control" name="email" id="email" placeholder="البريد الألكترونى"  />
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="message" rows="5" placeholder="الرسالة"></textarea>
                    </div>
                    <div class="text-center"><button type="submit">أرسال</button></div>
                </form>
                </div>
            </div>
        </div>
    </section>
</main>
<?php 
    include $tpl . 'footer.php'; 
    include $tpl . 'scripts.php'; 
    ob_end_flush();
?>