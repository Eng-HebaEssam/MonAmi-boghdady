<?php
    ob_start();
    session_start();
    $pageTitle = 'Homepage';
    $Title = '';
    if (isset($_SESSION['user'])) {
		header('Location: main.php');
	}
    include 'inital.php';
?>
<body style="font-family:'kufam'" data-spy="scroll" data-target=".fixed-top">   
    <!-- Navbar -->
<div>
    <nav class="navbar navbar-expand-md navbar-dark navbar-custom fixed-top">
        <a class="navbar-brand logo-image" href="index.php"><img src="layouts/img/logo_6.png" alt="alternative"></a>
        <!-- Mobile Menu Toggle Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation" style="margin-top: -20px;">
            <span class="navbar-toggler-awesome fas fa-bars"></span>
            <span class="navbar-toggler-awesome fas fa-times"></span>
        </button>
        <!-- end of mobile menu toggle button -->
        <div class="collapse navbar-collapse mb-3" id="navbarsExampleDefault" style="font-size: 25px;">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" data-target="#login" style="cursor: pointer;">تسجيل الدخول</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.php">انشاء حساب</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact_us.php">تواصل معنا</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="posts.php">المقالات</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="free.php">الكورسات المجانية</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link active_link" href="#header">الرئيسية <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <span class="nav-item social-icons">
                <span class="fa-stack">
                    <a href="https://www.facebook.com/groups/646058849298314/?ref=share">
                        <span class="hexagon"></span>
                        <i style="font-size: 16px;" class=" fab fa-facebook-f fa-stack-1x pr-1"></i>
                    </a>
                </span>
                <span class="fa-stack ">
                    <a href="https://wa.me/+201111784242">
                        <span class="hexagon "></span>
                        <i style="font-size: 16px;" class="fab fa-whatsapp fa-stack-1x pr-1"></i>
                    </a>
                </span>
            </span>
        </div>
    </nav>
</div>
    <!-- end of navbar -->
    <!-- end of navbar -->
    <!-- Header -->
    <header id="header " class="header ">
        <div class="header-content ">
            <div class="container ">
                <div class="row ">
                    <div class="col-lg-12 ">
                        <div class="text-container ">
                            <h1>علمني فرنساوي </h1>
                            <p class="p-heading p-large ">موقع تعليميى يهتم بشرح كل مناهج اللغه الفرنسية</p>
                            <a class="btn-solid-lg page-scroll " href="opps.php ">اكتشف الان</a>
                        </div>
                    </div>
                    <!-- end of col -->
                </div>
                <!-- end of row -->
            </div>
            <!-- end of container -->
        </div>
        <!-- end of header-content -->
    </header>
    <!-- end of header -->
    <!-- end of header -->
    <!-- Intro -->
    <div id="intro " class="basic-1">
        <div class="container ">
            <h2>نبذه تعريفية &#9827;</h2>
            <div class="row ">
                <div class="col-lg-5 order-2 text-right ">
                    <div class="text-container ">
                        <h3>الأستاذ محمد البغدادى</h3>
                        <ul dir="rtl">
                            <li class="rtl ">حاصل على ليسانس اداب وتربية جامعة طنطا</li>
                            <li>حاصل على شهادة TCF (اختبار المعارف الفرنسية) من وزارة التعليم الفرنسية</li>
                            <li>دبلوم تربوى من جامعة بيكاردى 2006</li>
                            <li>بعثة تدريبية لدولة فرنسا 2006 </li>
                            <li>دبلوم خاص فى التربية من جامعة كفر الشيخ 2020</li>
                            <li>حاصل على دورة ICDL </li>
                            <li>حاصل على دورةIT (نظم وتكنولوجيا المعلومات) من جامعة كفر الشيخ 2020</li>
                        </ul>
                    </div>
                    <!-- end of text-container -->
                </div>
                <!-- end of col -->
                <div class="col-lg-7 order-1 ">
                    <div class="image-container ">
                        <img class="img-fluid " src="layouts/img/IMG-20210104-WA0031.jpg " alt="alternative ">
                    </div>
                    <!-- end of image-container -->
                </div>
                <!-- end of col -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container -->
    </div>
    <!-- end of intro -->
    <!-- Services -->
    <div id="services " class="section2_6">
        <div class="container ">
            <h2 style="color: #3f3332;"><span class="colored ">المقالات</span> &#9827;</h2>
            <div class="row text-center">
                    <!-- Card -->
                    <div class="col-lg-4 mb-2">
                        <div class="card ">
                            <div class="card-image ">
                                <img class="img-fluid " src="layouts/img/france11.jpg" alt="alternative ">
                            </div>
                            <div class="card-body ">
                                <h3 class="card-title ">لغة لتعلّم لغات أخرى</h3>
                                <p class="text-right">يساعد تعلم اللغة الفرنسية في تعلم لغات أخرى كثيرة ، لا سيما اللغات اللاتينية كالإسبانية والإيطالية والبرتغالية والرومانية، وكذلك الإنكليزية، مما قد يُثير القليل من الدهشة والاستغراب.</p>
                                <div class="button-container ">
                                    <a class="btn-solid-reg page-scroll mt-4 " href="opps.php  ">تفاصيل</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-2">
                        <div class="card ">
                            <div class="card-image ">
                                <img class="img-fluid " src="layouts/img/louvre-102840.jpg" alt="alternative ">
                            </div>
                            <div class="card-body ">
                                <h3 class="card-title ">اللغة الفرنسية</h3>
                                <p class="text-right">تحتل المركز الخامس من حيث اللغات الأكثر تحدثاً في العالم، حيث يتكلم بها نحو 80 مليون شخص في جميع أنحاء العالم كلغة رسمية أساسية، وحوالي 190 مليون شخص كلغة رسمية ثانية</p>
                                <div class="button-container ">
                                    <a class="btn-solid-reg page-scroll mt-4 " " href="opps.php ">تفاصيل</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-2">
                        <div class="card ">
                            <div class="card-image ">
                                <img class="img-fluid " src="layouts/img/france2.jpg " alt="alternative ">
                            </div>
                            <div class="card-body ">
                                <h3 class="card-title ">تعلّم اللغة الفرنسية</h3>
                                <p class="text-right">اللغة الفرنسية هي في الوقت نفسه لغة عمل ولغة رسمية في الأمم المتحدة والاتحاد الأوروبي ومنظمة اليونسكو ومنظمة حلف شمال الأطلسي واللجنة الأولمبية الدولية والصليب الأحمر الدولي وفي عدّة هيئات قانونية دولية</p>
                                <div class="button-container ">
                                    <a class="btn-solid-reg page-scroll mt-4 " " href="opps.php  ">تفاصيل</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
    <!-- end of services -->
    <!-- Details 1 -->
    <div id="details " class="accordion ">
        <div class="row ">
            <div style="height:554px; " class="leftside col-sm-12 col-lg-6 ">
            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/kws4Fzfvivo" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>            </div>
            <!-- end of area-1 on same line and no space between comments to eliminate margin white space -->
            <div dir="rtl" class="rightside col-sm-12 col-lg-6 ">
                <h2 class="mb-5 ">&#9827; طريقة استخدام المنصة </h2>
                <div class="item">
                    <div id="headingOne">
                        <span data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" role="button">
                            <span dir="rtl" class="circle-numbering">1</span><span class="accordion-title text-center">  من فضلك قم بانشاء حساب من أنشاء حساب &#8593; </span>
                        </span>
                    </div>
                </div>
                <!-- end of item -->
                <div class="item">
                    <div id="headingTwo">
                        <span class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" role="button">
                            <span class="circle-numbering">2</span><span class="accordion-title text-center">يمكنك تصفح المنصة من خلال الصفحة الرئيسية </span>
                        </span>
                    </div>
                </div>
                <!-- end of item -->
                <div class="item ">
                    <div id="headingThree">
                        <span class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree" role="button">
                                    <span class="circle-numbering">3</span><span class="accordion-title text-center">يمكنك مشاهدة الفيديوهات والمقالات والمنشورات عقب التسجيل </span>
                        </span>
                    </div>
                </div>
                <div class="item">
                    <div id="headingThree">
                        <span class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" role="button">
                                    <span class="circle-numbering">4</span><span class="accordion-title text-center">لمشاهدة الدروس يرجى الانتظار حتى يتم تفعيلك</span>
                        </span>
                    </div>
                </div>
                <!-- end of item -->
                <div class="item">
                    <div id="headingThree">
                        <span class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree" role="button">
                                    <span class="circle-numbering">5</span><span class="accordion-title text-center">بعد التفعيل يمكنك الدخول لصفحه الفيديوهات </span>
                        </span>
                    </div>
                </div>
            </div>
            <!-- end of accordion-container -->
        </div>
    </div>
    <!-- end of details 1 -->
    <!-- Services -->
    <section class="section2_6">
        <div class="container">
            <h2 style="color: #3f3332;">أخر الفيديوهات &#9827;</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-2">
                        <img src="layouts/img/services-1.jpg" alt="">
                        <i class="fab fa-youtube" data-toggle="modal" data-target="#exampleModal"></i>
<h3 class="text-center">الماضى الحديث</h3>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-2">
                        <img src="layouts/img/services-2.jpg" alt="">
                        <i class="fab fa-youtube" data-toggle="modal" data-target="#exampleModal_2"></i>
<h3 class="text-center">المستقبل القريب</h3>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="layouts/img/services-3.jpg" alt="">
                        <i class="fab fa-youtube" data-toggle="modal" data-target="#exampleModal_3"></i>
<h3 class="text-center">الماضى المركب</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end of cards-2 -->
    <!-- end of services -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <iframe width="100%" height="500" src="https://www.youtube.com/embed/6NV5RT7tmnk" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>            </div>
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
                    <iframe width="100%" height="500" src="https://www.youtube.com/embed/GFEO0ZHIFrw" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>                </div>
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
                    <iframe width="100%" height="500" src="https://www.youtube.com/embed/pgvjqSufd-s" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>                </div>
        </div>
        </div>
    </div>
    <?php include $tpl . 'partial/footer.php'; ?>
    <div id="scroll-top">
        <i class="fa fa-chevron-up"></i>
    </div>
    <?php include $tpl . 'partial/login.php'; ?>
</body>
<?php 
include $tpl . 'scripts.php'; 
ob_end_flush();
?>