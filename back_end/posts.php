<?php
    ob_start();
    if(!isset($_SESSION)){session_start();} 
    $pageTitle = 'posts';
    $Title = 'posts';
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
            <h2 class="mt-2 text-right">المقالات</h2>
            <ol>
                <li><a href="index.php">الرئيسية</a></li>
                <li>المقالات</li>
            </ol>
            </div>
        </div>
    </section>
    <section id="blog" class="blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 entries">
                <article class="entry" data-aos="fade-up">
                    <div class="entry-img">
                        <img src="assets/img/blog-1.jpg" alt="main" class="img-fluid" width="100%">
                    </div>
                    <h2 class="entry-title">
                        <a href="log.php">عشرة أسباب تدفعك إلى تعلّم اللغة الفرنسية</a>
                    </h2>
                    <div class="entry-meta">
                        <ul>
                            <li class="d-flex align-items-center"><i class="bx bx-user"></i> <a href="log.php">  احمد الطارون  </a></li>
                            <li class="d-flex align-items-center"><i class="bx bx-time-five"></i> <a href="log.php"><time datetime="2020-01-01">  19 مارس 2021  </time></a></li>
                        </ul>
                    </div>
                    <div class="entry-content">
                        <p>
                        1- لغة محكية في العالم أجمع
                        يتحدث 300 مليون شخص باللغة الفرنسية في القارات الخمس، فهي اللغة الأجنبية الأكثر تعلمًا على نطاق واسع بعد اللغة الإنكليزية، واللغة الخامسة الأكثر تداولًا في العالم. وهي أيضًا اللغة الوحيدة إلى جانب اللغة الإنكليزية التي يمكن تعلمها في كل بلدان العالم تقريبًا، إذ يتعلّم 132 مليون شخص اللغة الفرنسية في العالم أو يدرسون باللغة الفرنسية.
                        </p>
                        <div class="read-more">
                            <a href="log.php">المزيد</a>
                        </div>
                    </div>
                </article>
                <article class="entry" data-aos="fade-up">
                    <div class="entry-img">
                        <img src="assets/img/blog-2.jpg" alt="" class="img-fluid">
                    </div>
                    <h2 class="entry-title">
                        <a href="log.php">فوائد القراءة</a>
                    </h2>
                    <div class="entry-meta">
                        <ul>
                        <li class="d-flex align-items-center"><i class="bx bx-user"></i> <a href="log.php">  احمد الطارون  </a></li>
                        <li class="d-flex align-items-center"><i class="bx bx-time-five"></i> <a href="log.php"><time datetime="2020-01-01">  19 مارس 2021  </time></a></li>
                        </ul>
                    </div>
                    <div class="entry-content">
                        <p>
                        زيادة التركيز <br>
                        يقوم المخ بعدة عمليات في أثناء القراءة، وتتمثل هذه العمليات في التفكير، والتأمل، والتخيل، وكذلك ربط العلاقات بين الظواهر والمفاهيم، ويعمل ذلك على زيادة القدرة التأملية والتعبيرية، والكتابية، وهي كذلك تعمل على تطوير القدرة التحليلية للإنسان، والعمل على زيادة مستوى التركيز، حيث يقوم العقل ببذل جهد زائد تتبع السياق ورب الأحداث وتسلسلها.
                        </p>
                        <div class="read-more">
                        <a href="log.php">المزيد</a>
                        </div>
                    </div>
                </article><!-- End blog entry -->
                <article class="entry" data-aos="fade-up">
                    <div class="entry-img">
                        <img src="assets/img/blog-3.jpg" alt="" class="img-fluid">
                    </div>
                    <h2 class="entry-title">
                        <a href="log.php">مفاتيح أساسية للنجاح</a>
                    </h2>
                    <div class="entry-meta">
                        <ul>
                            <li class="d-flex align-items-center"><i class="bx bx-user"></i> <a href="log.php">  احمد الطارون  </a></li>
                            <li class="d-flex align-items-center"><i class="bx bx-time-five"></i> <a href="log.php"><time datetime="2020-01-01">  19 مارس 2021  </time></a></li>
                        </ul>
                    </div>
                    <div class="entry-content">
                        <p>
                        1- الطموح كنز لا يفنى:  <br>
                        لا يسعى للنجاح من لا يملك طموحاً ولذلك كان الطموح هو الكنز الذي لا يفنى، فكن طموحاً وانظر إلى المعالي، هذا عمر بن عبد العزيز خامس الخلفاء الراشدين يقول معبراً عن طموحه: "إن لي نفساً تواقة، تمنت الإمارة فنالتها، وتمنيت الخلافة فنالتها، وأنا الآن أتوق إلى الجنة وأرجو أن أنالها".  
                        </p>
                        <div class="read-more">
                        <a href="log.php">المزيد</a>
                        </div>
                    </div>
                </article>
            </div>
            <div class="col-lg-4">
                <div class="sidebar text-right" data-aos="fade-left">
                    <h3 class="sidebar-title">اخر المقالات</h3>
                    <div class="sidebar-item recent-posts">
                        <div class="post-item clearfix">
                            <img src="assets/img/blog-1.jpg" alt="">
                            <h4><a href="log.php">عشرة أسباب تدفعك إلى تعلّم اللغة الفرنسية</a></h4>
                            <time datetime="2020-01-01">19 مارس 2021</time>
                        </div>
                        <div class="post-item clearfix">
                            <img src="assets/img/blog-2.jpg" alt="">
                            <h4><a href="log.php">فوائد القراءة</a></h4>
                            <time datetime="2020-01-01">19 مارس 2021</time>
                        </div>
                        <div class="post-item clearfix">
                            <img src="assets/img/blog-3.jpg" alt="">
                            <h4><a href="log.php">مفاتيح أساسية للنجاح</a></h4>
                            <time datetime="2020-01-01">19 مارس 2021</time>
                        </div>
                    </div>
                    <hr>
                    <h3 class="sidebar-title">اخر المنشورات</h3>
                    <div class="sidebar-item recent-posts">
                        <div class="post-item clearfix">
                            <img src="assets/img/blog-4.jpg" alt="">
                            <h4><a href="log.php">موعد البث المباشر</a></h4>
                            <time datetime="2020-01-01">19 مارس 2021</time>
                        </div>
                        <div class="post-item clearfix">
                            <img src="assets/img/blog-5.jpg" alt="">
                            <h4><a href="log.php">موعد اول حصة بالترم الثانى</a></h4>
                            <time datetime="2020-01-01">19 مارس 2021</time>
                        </div>
                        <div class="post-item clearfix">
                            <img src="assets/img/blog-6.jpg" alt="">
                            <h4><a href="log.php">اختبار تسميع للكلمات</a></h4>
                            <time datetime="2020-01-01">19 مارس 2021</time>
                        </div>
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
    ob_end_flush();
?>