<?php
ob_start(); // Output Buffering Start
	session_start(); // Start The Session
    $pageTitle = 'logout';
    include 'inital.php';
    session_unset(); // Unset The Data
	session_destroy(); // Destory The Session
	header('Location: index.php');
	exit();
ob_end_flush(); 
?>