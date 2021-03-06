<?php
    ob_start();
    if(!isset($_SESSION)){session_start();} 
    $pageTitle = 'Homepage';
    $Title = 'Homepage';
    if (isset($_SESSION['user'])) {
		header('Location: main.php');
	}
    include 'inital.php';
    include $tpl . 'header.php';   
?>
<section id="hero">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
            <!-- Slide 1 -->
            <div class="carousel-item active" style="background-image: url(assets/img/slide/slide-1.jpg);">
                <div class="carousel-container">
                    <div class="carousel-content animate__animated animate__fadeInUp text-center">
                    <h2>علمني فرنساوي</h2>
                    <p>موقع تعليميى يهتم بشرح كل مناهج اللغه الفرنسية باسلوب جديد وممتع </p>
                    <div class="text-center"><a href="login.php" class="btn-get-started">تسجيل الدخول</a></div>
                    </div>
                </div>
            </div>
            <!-- Slide 2 -->
            <div class="carousel-item" style="background-image: url(assets/img/slide/slide-2.jpg);width: 100%;">
                <div class="carousel-container">
                    <div class="carousel-content animate__animated animate__fadeInUp text-center">
                    <h2>ليس فقط فيديو</h2>
                    <p>الدرس ليس عبارة عن فيديو فقط بل هو عبارة عن موضوع له مرفقات من فيديو وورق شرح وامتحانات جزئية</p>
                    <div class="text-center"><a href="free.php" class="btn-get-started">الدروس المجانية</a></div>
                    </div>
                </div>
            </div>
            <!-- Slide 3 -->
            <div class="carousel-item" style="background-image: url(assets/img/slide/slide-3.jpg);">
                <div class="carousel-container">
                    <div class="carousel-content animate__animated animate__fadeInUp text-center">
                    <h2>المقالات</h2>
                    <p>يوجد الكثير من المقالات التي يمكنك الاطلاع عليها ومناقشة معلمك واصدقائك فيها</p>
                    <div class="text-center"><a href="posts.php" class="btn-get-started">المقالات المجانية</a></div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon bx bx-chevrons-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon bx bx-chevrons-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
    </div>
</section><!-- End Hero -->
<main id="main">
    <section id="features" class="features">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>لماذا تختار منصتنا لدراسة اللغة الفرنسية ؟</h2>
                <p>هدفنا هو اتقان اللغة الفرنسية والتفوق فيها عن طريق اساليب التعليم الجديدة والمعاصرة</p>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 mt-4 mt-md-0">
                    <div class="icon-box">
                    <i class="ri-bar-chart-box-line" style="color: #5578ff;"></i>
                    <h3>تدرب علي جميع الدروس</h3>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 mt-4 mt-md-0">
                    <div class="icon-box">
                    <i class="ri-calendar-todo-line" style="color: #e80368;"></i>
                    <h3>أحصل علي مهارات جديدة</h3>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 mt-4 mt-lg-0">
                    <div class="icon-box">
                    <i class="ri-base-station-line" style="color: #e361ff;"></i>
                    <h3>تواصل مع معلمك</h3>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 mt-4">
                    <div class="icon-box">
                    <i class="ri-gradienter-line" style="color: #ffa76e;"></i>
                    <h3>احصل عل الكثير من الامتحانات</h3>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 mt-4">
                    <div class="icon-box">
                    <i class="ri-file-list-3-line" style="color: #11dbcf;"></i>
                    <h3>التطبيق الجيد على المعلومات الجديدة</h3>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 mt-4">
                    <div class="icon-box">
                    <i class="ri-price-tag-2-line" style="color: #4233ff;"></i>
                    <h3>تناقش مع الجميع في الكثير من المقالات</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="services" class="services section-bg">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
            <h2>مميزات المنصة</strong></h2>
            <p>المنصة تحتوى على الكثير من المميزات التى يجب ان تتطلع عليها</p>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box iconbox-blue">
                    <div class="icon">
                        <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                        <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,521.0016835830174C376.1290562159157,517.8887921683347,466.0731472004068,529.7835943286574,510.70327084640275,468.03025145048787C554.3714126377745,407.6079735673963,508.03601936045806,328.9844924480964,491.2728898941984,256.3432110539036C474.5976632858925,184.082847569629,479.9380746630129,96.60480741107993,416.23090153303,58.64404602377083C348.86323505073057,18.502131276798302,261.93793281208167,40.57373210992963,193.5410806939664,78.93577620505333C130.42746243093433,114.334589627462,98.30271207620316,179.96522072025542,76.75703585869454,249.04625023123273C51.97151888228291,328.5150500222984,13.704378332031375,421.85034740162234,66.52175969318436,486.19268352777647C119.04800174914682,550.1803526380478,217.28368757567262,524.383925680826,300,521.0016835830174"></path>
                        </svg>
                        <i class="bx bxl-dribbble"></i>
                    </div>
                    <h4>الكثير من المنشورات</h4>
                    <p>عند الدخول للمنصة يوجد الكثير من المنشورات التى تخبرك بكل جديد عن المنصة </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
                    <div class="icon-box iconbox-orange ">
                    <div class="icon">
                        <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                        <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,582.0697525312426C382.5290701553225,586.8405444964366,449.9789794690241,525.3245884688669,502.5850820975895,461.55621195738473C556.606425686781,396.0723002908107,615.8543463187945,314.28637112970534,586.6730223649479,234.56875336149918C558.9533121215079,158.8439757836574,454.9685369536778,164.00468322053177,381.49747125262974,130.76875717737553C312.15926192815925,99.40240125094834,248.97055460311594,18.661163978235184,179.8680185752513,50.54337015887873C110.5421016452524,82.52863877960104,119.82277516462835,180.83849132639028,109.12597500060166,256.43424936330496C100.08760227029461,320.3096726198365,92.17705696193138,384.0621239912766,124.79988738764834,439.7174275375508C164.83382741302287,508.01625554203684,220.96474134820875,577.5009287672846,300,582.0697525312426"></path>
                        </svg>
                        <i class="bx bx-file"></i>
                    </div>
                    <h4>الكثير من الملفات</h4>
                    <p>بعد الاطلاع على الدرس ستجد مرفقات للدرس من ملف ورقي تستطيع قرائته وتحميلة</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon-box iconbox-pink">
                    <div class="icon">
                        <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                        <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,541.5067337569781C382.14930387511276,545.0595476570109,479.8736841581634,548.3450877840088,526.4010558755058,480.5488172755941C571.5218469581645,414.80211281144784,517.5187510058486,332.0715597781072,496.52539010469104,255.14436215662573C477.37192572678356,184.95920475031193,473.57363656557914,105.61284051026155,413.0603344069578,65.22779650032875C343.27470386102294,18.654635553484475,251.2091493199835,5.337323636656869,175.0934190732945,40.62881213300186C97.87086631185822,76.43348514350839,51.98124368387456,156.15599469081315,36.44837278890362,239.84606092416172C21.716077023791087,319.22268207091537,43.775223500013084,401.1760424656574,96.891909868211,461.97329694683043C147.22146801428983,519.5804099606455,223.5754009179313,538.201503339737,300,541.5067337569781"></path>
                        </svg>
                        <i class="bx bx-tachometer"></i>
                    </div>
                    <h4>الامتحانات الشاملة والجزئية</h4>
                    <p>احرص على اداء جميع الامتحانات الجزيئية الخاصة بالدرس وجميع الامتحانات الشاملة</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box iconbox-yellow">
                    <div class="icon">
                        <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                        <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,503.46388370962813C374.79870501325706,506.71871716319447,464.8034551963731,527.1746412648533,510.4981551193396,467.86667711651364C555.9287308511215,408.9015244558933,512.6030010748507,327.5744911775523,490.211057578863,256.5855673507754C471.097692560561,195.9906835881958,447.69079081568157,138.11976852964426,395.19560036434837,102.3242989838813C329.3053358748298,57.3949838291264,248.02791733380457,8.279543830951368,175.87071277845988,42.242879143198664C103.41431057327972,76.34704239035025,93.79494320519305,170.9812938413882,81.28167332365135,250.07896920659033C70.17666984294237,320.27484674793965,64.84698225790005,396.69656628748305,111.28512138212992,450.4950937839243C156.20124167950087,502.5303643271138,231.32542653798444,500.4755392045468,300,503.46388370962813"></path>
                        </svg>
                        <i class="bx bx-layer"></i>
                    </div>
                    <h4>المقالات</h4>
                    <p>يوجد الكثير من المقالات التي يمكنك الاطلاع عليها ومناقشة معلمك واصدقائك فيها</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="200">
                    <div class="icon-box iconbox-red">
                    <div class="icon">
                        <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                        <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,532.3542879108572C369.38199826031484,532.3153073249985,429.10787420159085,491.63046689027357,474.5244479745417,439.17860296908856C522.8885846962883,383.3225815378663,569.1668002868075,314.3205725914397,550.7432151929288,242.7694973846089C532.6665558377875,172.5657663291529,456.2379748765914,142.6223662098291,390.3689995646985,112.34683881706744C326.66090330228417,83.06452184765237,258.84405631176094,53.51806209861945,193.32584062364296,78.48882559362697C121.61183558270385,105.82097193414197,62.805066853699245,167.19869350419734,48.57481801355237,242.6138429142374C34.843463184063346,315.3850353017275,76.69343916112496,383.4422959591041,125.22947124332185,439.3748458443577C170.7312796277747,491.8107796887764,230.57421082200815,532.3932930995766,300,532.3542879108572"></path>
                        </svg>
                        <i class="bx bx-slideshow"></i>
                    </div>
                    <h4>ليس فقط فيديو</h4>
                    <p>الدرس ليس عبارة عن فيديو فقط بل هو عبارة عن موضوع له مرفقات من فيديو وورق شرح وامتحانات جزئية</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon-box iconbox-teal">
                    <div class="icon">
                        <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                        <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,566.797414625762C385.7384707136149,576.1784315230908,478.7894351017131,552.8928747891023,531.9192734346935,484.94944893311C584.6109503024035,417.5663521118492,582.489472248146,322.67544863468447,553.9536738515405,242.03673114598146C529.1557734026468,171.96086150256528,465.24506316201064,127.66468636344209,395.9583748389544,100.7403814666027C334.2173773831606,76.7482773500951,269.4350130405921,84.62216499799875,207.1952322260088,107.2889140133804C132.92018162631612,134.33871894543012,41.79353780512637,160.00259165414826,22.644507872594943,236.69541883565114C3.319112789854554,314.0945973066697,72.72355303640163,379.243833228382,124.04198916343866,440.3218312028393C172.9286146004772,498.5055451809895,224.45579914871206,558.5317968840102,300,566.797414625762"></path>
                        </svg>
                        <i class="bx bx-arch"></i>
                    </div>
                    <h4>المهمات</h4>
                    <p>عند الدخول للمنصة يوجد الكثير من المهمات التي يجب الاطلاع عليها</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="portfolio" class="portfolio">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
            <h2>أخر الأعمال</h2>
            </div>
            <div class="row" data-aos="fade-up">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="portfolio-flters">
                    <li data-filter="*" class="filter-active">جميع الاعمال</li>
                    <li data-filter=".filter-app">الفيديوهات</li>
                    <li data-filter=".filter-card">المقالات</li>
                    <li data-filter=".filter-web">اخري</li>
                    </ul>
                </div>
            </div>
            <div class="row portfolio-container" data-aos="fade-up">
                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <img src="assets/img/portfolio/france1.jpg" class="img-fluid" alt="">
                    <div class="portfolio-info">
                    <h4>الماضى المركب</h4>
                    <a href="https://www.youtube.com/watch?v=pgvjqSufd-s" data-gall="portfolioGallery" class="venobox preview-link" data-vbtype="video" data-autoplay="true" title="الماضى المركب"><i class="bx bx-plus"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                    <img src="assets/img/portfolio/p2.jpg" class="img-fluid" alt="">
                    <div class="portfolio-info">
                    <h4>المنشورات</h4>
                    <a href="assets/img/portfolio/p2.jpg" data-gall="portfolioGallery" class="venobox preview-link" title="المنشورات"><i class="bx bx-plus"></i></a>
                    <a href="log.php" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <img src="assets/img/portfolio/slide-2.JPG" class="img-fluid" alt="">
                    <div class="portfolio-info">
                    <h4>الماضى الحديث</h4>
                    <a href="https://www.youtube.com/watch?v=6NV5RT7tmnk&feature=emb_logo" data-gall="portfolioGallery" class="venobox preview-link" data-vbtype="video" data-autoplay="true" title="الماضى الحديث"><i class="bx bx-plus"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                    <img src="assets/img/portfolio/4.jpg" class="img-fluid" alt="">
                    <div class="portfolio-info">
                    <h4>اللغة الفرنسية</h4>
                    <a href="assets/img/portfolio/4.jpg" data-gall="portfolioGallery" class="venobox preview-link" title="مقالات"><i class="bx bx-plus"></i></a>
                    <a href="log.php" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                    <img src="assets/img/portfolio/p1.jpg" class="img-fluid" alt="">
                    <div class="portfolio-info">
                    <h4>المهمات</h4>
                    <a href="assets/img/portfolio/p1.jpg" data-gall="portfolioGallery" class="venobox preview-link" title="المهمات"><i class="bx bx-plus"></i></a>
                    <a href="log.php" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <img src="assets/img/portfolio/france11.jpg" class="img-fluid" alt="">
                    <div class="portfolio-info">
                    <h4>المستقبل القريب</h4>
                    <a href="https://www.youtube.com/watch?v=GFEO0ZHIFrw" data-gall="portfolioGallery" class="venobox preview-link" data-vbtype="video" data-autoplay="true" title="المستقبل القريب"><i class="bx bx-plus"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                    <img src="assets/img/portfolio/france2.jpg" class="img-fluid" alt="">
                    <div class="portfolio-info">
                    <h4>تعلّم اللغة الفرنسية</h4>
                    <a href="assets/img/portfolio/france2.jpg" data-gall="portfolioGallery" class="venobox preview-link" title="مقالات"><i class="bx bx-plus"></i></a>
                    <a href="log.php" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                    <img src="assets/img/portfolio/f23.jpg" class="img-fluid" alt="">
                    <div class="portfolio-info">
                    <h4>لغة لتعلّم لغات أخرى</h4>
                    <a href="assets/img/portfolio/f23.jpg" data-gall="portfolioGallery" class="venobox preview-link" title="مقالات"><i class="bx bx-plus"></i></a>
                    <a href="log.php" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Portfolio Section -->
    <section id="team" class="team section-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 order-lg-2 col-md-6 order-2 d-flex align-items-stretch">
                    <div class="member" data-aos="fade-up">
                    <div class="member-img">
                        <img src="assets/img/team/mohamed.png" class="img-fluid" alt="">
                        <div class="social">
                        <a href="https://wa.me/+0201111784242"><i class="bx bxl-whatsapp"></i></a>
                        <a href="https://www.facebook.com/groups/646058849298314/?ref=share"><i class="bx bxl-facebook"></i></a>
                        <a href="https://www.youtube.com/channel/UCPTVpli6kpi08OdsMkLFwlQ/featured"><i class="bx bxl-youtube"></i></a>
                        <a href=""><i class="bx bxl-linkedin"></i></a>
                        </div>
                    </div>
                    <div class="member-info">
                        <h4>الأستاذ محمد البغدادى
                        </h4>
                        <span>معلم اللغة الفرنسية</span>
                    </div>
                    </div>
                </div>
                <div class="col-lg-4 order-lg-1 col-md-6 order-3 d-flex align-items-stretch">
                    <div class="member" data-aos="fade-up" data-aos-delay="100">
                    <div class="member-img">
                        <img src="assets/img/team/master.png" class="img-fluid" alt="">
                        <div class="social">
                        <a href="https://api.whatsapp.com/send?phone=01066343874"><i class="bx bxl-whatsapp"></i></a>
                        <a href="https://www.facebook.com/MasterC0de"><i class="bx bxl-facebook"></i></a>
                        <a href=""><i class="bx bxl-instagram"></i></a>
                        <a href="https://www.linkedin.com/mynetwork/"><i class="bx bxl-linkedin"></i></a>
                        </div>
                    </div>
                    <div class="member-info">
                        <h4>MasterCode
                        </h4>
                        <span>التصميم والأعمال البرمجية</span>
                    </div>
                    </div>
                </div>
                <div class="col-lg-4 order-lg-3 col-md-12 order-1 d-flex align-items-stretch">
                    <div class="section-title text-center" style="width: 100%;">
                    <h2 >فريق العمل</h2>
                    <p>هدفنا الاول والاخير هو التفوق دائما</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="pricing" class="pricing">
        <div class="container" data-aos="fade-up">
            <div class="section-title" data-aos="fade-up">
            <h2>تكلفة الاشتراك في المنصة</h2>
            </div>
            <div class="row">
                <?php 
                    $sts = $con->prepare("select * from main");
                    $sts->execute();
                    $all = $sts->fetch();
                ?>
                <div class="col-lg-4 col-md-4 ">
                    <div class="box">
                    <h3>الصف الثانى الثانوى</h3>
                    <h4 style="direction: rtl;"><span>الشهر / </span><?php echo $all['first'];?><sup>جنية</sup></h4>
                    <ul style="direction: rtl;">
                        <li>محتوى الشرح الخاص بالعام الدراسى :</li>
                        <li>فيديوهات الشرح</li>
                        <li>ورق الشرح</li>
                        <li>امتحانات المتابعة</li>
                        <li>حصص لتطبيق Zoom</li>
                        <li>المقالات الهامة</li>
                    </ul>
                    <div class="btn-wrap">
                        <a href="register.php" class="btn-buy">اشترك الان</a>
                    </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 mt-4  mt-md-0">
                    <div class="box featured">
                    <h3>الصف الثالث الثانوى</h3>
                    <h4 style="direction: rtl;"><span>الشهر / </span><?php echo $all['second'];?><sup>جنية</sup></h4>
                    <ul style="direction: rtl;">
                        <li>محتوى الشرح الخاص بالعام الدراسى :</li>
                        <li>فيديوهات الشرح</li>
                        <li>ورق الشرح</li>
                        <li>امتحانات المتابعة</li>
                        <li>حصص لتطبيق Zoom</li>
                        <li>المقالات الهامة</li>
                    </ul>
                    <div class="btn-wrap">
                        <a href="register.php" class="btn-buy">اشترك الان</a>
                    </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 mt-4  mt-md-0">
                    <div class="box">
                    <h3>الصف الاول الثانوى</h3>
                    <h4 style="direction: rtl;"><span>الشهر / </span><?php echo $all['third'];?><sup>جنية</sup></h4>
                    <ul style="direction: rtl;">
                        <li>محتوى الشرح الخاص بالعام الدراسى :</li>
                        <li>فيديوهات الشرح</li>
                        <li>ورق الشرح</li>
                        <li>امتحانات المتابعة</li>
                        <li>حصص لتطبيق Zoom</li>
                        <li>المقالات الهامة</li>
                    </ul>
                    <div class="btn-wrap">
                        <a href="register.php" class="btn-buy">اشترك الان</a>
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