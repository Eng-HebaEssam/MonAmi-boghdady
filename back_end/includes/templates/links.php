<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Mon Ami</title>
    <meta content="" name="description" content="موقع الاستاذ محمد البغدادى لتعليم اللغه الفرنسية">
    <meta content="" name="keywords" content="محمد البغدادى, فرنساوى, master code">
    <!-- Favicons -->
    <link href="assets/img/favicon.ico" rel="icon">
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
<link rel="stylesheet" media="screen" href="https://fontlibrary.org//face/droid-arabic-kufi" type="text/css"/>
    <?php 
        if($pageTitle == 'register' || $pageTitle == 'login' ){
            echo '<link href="assets/css/forms.css" rel="stylesheet">';
        }
        if($pageTitle == 'main' || $pageTitle == 'lesson' || $pageTitle == 'coursecontent' ){
            echo '<link rel="stylesheet" href="assets/css/main_content.css">';
        }
        if($pageTitle == 'exam' || $pageTitle == 'fullexam' ){
            echo '
                <link rel="stylesheet" href="assets/css/main_content.css">
                <link rel="stylesheet" href="assets/css/countdown-lights.css">
            ';
        }
        if($pageTitle == 'events'){
            echo '
                <link rel="stylesheet" href="assets/css/main.css">
                <link rel="stylesheet" href="assets/css/forms.css">
            ';
        }
        if($pageTitle == 'postContent'){
            echo '
                <link rel="stylesheet" href="assets/css/posts.css">
            ';
        }
        if($pageTitle == 'activities'){
            echo '
                <link rel="stylesheet" href="assets/css/posts.css">
                <link rel="stylesheet" href="assets/css/forms.css">
            ';
        }
        if($pageTitle == 'account'){
            echo '
            <link rel="stylesheet" href="assets/css/main_content.css">
            <link rel="stylesheet" href="assets/css/forms.css">
            ';
        }
    ?>
</head>