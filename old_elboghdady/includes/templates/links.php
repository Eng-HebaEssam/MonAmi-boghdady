<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="layouts/css/bootstrap.min.css">
    <link rel="stylesheet" href="layouts/css/alls.min.css">
    <link rel="stylesheet" href="layouts/css/styles.css">
    <link rel="stylesheet" type="text/css" href="layouts/css/jquery.jscrollpane.css" media="all" />
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Kufam:wght@600&display=swap" rel="stylesheet">
<link rel="icon" type="image/ico"  href="layouts/img/favicon.ico">
    <?php 
    if ($pageTitle == 'course_content') {
        echo'
            <link rel="stylesheet" href="layouts/css/sty.css">
            <link rel="stylesheet" href="layouts/css/course_content.css">
            ';
        }?>
    <?php 
    if ($pageTitle == 'Homepage') {
        echo'
            <link rel="stylesheet" href="layouts/css/index_sty.css">
            ';
        } else {
            echo'
            <link rel="stylesheet" href="layouts/css/main_i.css">
            <link rel="stylesheet" href="layouts/css/mains.css">
            ';
        }
    ?>
    <?php 
    if ($Title == 'exams') {
            echo'
            <link rel="stylesheet" href="layouts/css/countdown-lights.css" />
            ';
    }?>
    <title>French</title>
</head>