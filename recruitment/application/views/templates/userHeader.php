<?php
if (isset($this->session->userdata['logged_in'])) {
    $username = ($this->session->userdata['logged_in']['username']);
    $user_id = ($this->session->userdata['logged_in']['user_id']);
} else {
    redirect("logout");
}
?>
<!DOCTYPE html>
<html class="no-js">
<head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="icon" href="assets/user/images/scislogo.png" type="image/ico" />
    <title>SCIS Recruitment Portal</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <!-- Mobile Specific Metas
    ================================================== -->
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Template CSS Files
    ================================================== -->
    <!-- Twitter Bootstrs CSS -->
    <link rel="stylesheet" href="assets/user/plugins/bootstrap/bootstrap.min.css">
    <!-- Ionicons Fonts Css -->
    <link rel="stylesheet" href="assets/user/plugins/ionicons/ionicons.min.css">
    <!-- animate css -->
    <link rel="stylesheet" href="assets/user/plugins/animate-css/animate.css">
    <!-- Hero area slider css-->
    <link rel="stylesheet" href="assets/user/plugins/slider/slider.css">
    <!-- owl craousel css -->
    <link rel="stylesheet" href="assets/user/plugins/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="assets/user/plugins/owl-carousel/owl.theme.css">
    <!-- Fancybox -->
    <link rel="stylesheet" href="assets/user/plugins/facncybox/jquery.fancybox.css">
    <!-- template main css file -->
    <link rel="stylesheet" href="assets/user/css/style.css">
    <!--bootstrap table-->
    <link rel="stylesheet" href="assets/bootstrap-table/bootstrap-table.min.css">
</head>
<body>


<!--
==================================================
Header Section Start
================================================== -->
<header id="top-bar" class="navbar-fixed-top animated-header">
    <div class="container">
        <div class="navbar-header">
            <!-- responsive nav button -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- /responsive nav button -->

            <!-- logo -->
            <div class="navbar-brand">
                <a>
                    <img src="assets/images/userlogo.png" alt="">
                </a>
            </div>
            <!-- /logo -->
        </div>
        <!-- main menu -->
        <nav class="collapse navbar-collapse navbar-right" role="navigation">
            <div class="main-menu">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="dashboard" >Home</a>
                    </li>
                    <li class="dropdown"><a data-toggle="dropdown" class="dropdown-toggle" href="#">Appointments<span class="caret"></span></a>
                        <div class="dropdown-menu">
                            <ul>
                                <li><a href="userAppointment">Ongoing</a></li>
                                <li><a href="finAppointments">Finished</a></li>
                            </ul>
                        </div></li>
                    <li><a href="userCompanies">Companies</a></li>
                    <li><a href="userInquire">Inquire</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Registration<span class="caret"></span></a>
                        <div class="dropdown-menu">
                            <ul>
                                <li><a href="userInternship">Internship</a></li>
                                <li><a href="userEmployment">Employment</a></li>
                                <li><a href="userSchedulesExam">Orientation</a></li>
                                <li><a href="userSchedulesSeminar">Seminar</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="dropdown pull-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <?php
                                echo $this->session->userdata['logged_in']['name'];
                            ?>
                        </a>
                        <div class="dropdown-menu">
                            <ul>
                                <li><a href="Accounts/logout">Logout</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- /main nav -->
    </div>
</header>

