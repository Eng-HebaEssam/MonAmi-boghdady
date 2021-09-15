<header id="header" class="fixed-top">
  <div class="container d-flex align-items-center">
      <a href="index.php" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>
      <nav class="nav-menu d-none d-lg-block">
          <ul style="direction: rtl;">
              <li class="<?php if($pageTitle == 'main'){ echo 'active';}?>"><a href="main.php">الرئيسية</a></li>
              <li class="<?php if($pageTitle == 'posts2'){ echo 'active';}?>"><a href="posts_2.php">المقالات</a></li>
              <li class="<?php if($pageTitle == 'activities'){ echo 'active';}?>"><a href="activities.php">المنشورات</a></li>
              <li class="<?php if($pageTitle == 'events'){ echo 'active';}?>"><a href="events.php">المهام</a></li>
              <li class="<?php if($pageTitle == 'account'){ echo 'active';}?>"><a href="account.php">الحساب</a></li>
              <li><a href="logout.php">تسجيل الخروج</a></li>
          </ul>
      </nav><!-- .nav-menu -->
      <div class="header-social-links">
          <a href="https://wa.me/+0201111784242"><i class="bx bxl-whatsapp"></i></a>
        <a href="https://www.facebook.com/groups/646058849298314/?ref=share"><i class=" bx bxl-facebook-circle "></i></a>
        <a href="https://www.youtube.com/channel/UCPTVpli6kpi08OdsMkLFwlQ/featured"><i class="bx bxl-youtube"></i></a>
        <a href="https://www.linkedin.com/mynetwork/"><i class="bx bxl-linkedin-square"></i></a>
      </div>

  </div>
</header>