<!--add ob function-->



<!--it is a function that hold all info of php before send it to browser-->
<!--this function didnt slow your programming and your web page open quickly-->

 <!--php is a interprener language that inter pre info line by line-->

<!--add database file-->
<?php include "../includes/db.php" ; ?>

<!--function file-->
<?php include "admin_functions.php"; ?>

<?php  ob_start(); ?>

<?php session_start(); ?>
<?php
//checking for users

if(!isset($_SESSION['user_role'])){

    header("Location:../index.php");  
}
 
?>











<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-latest.min.js"></script>


    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
