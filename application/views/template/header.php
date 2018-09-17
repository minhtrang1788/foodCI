<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<!-- Title -->
	<title>Yummy Blog - Food Blog Template</title>

	<!-- Favicon -->
	<link rel="icon" href="<?php echo base_url()?>style/img/core-img/favicon.ico">

	<!-- Core Stylesheet -->
	<link href="<?php echo base_url()?>style/style.css" rel="stylesheet">

	<!-- Responsive CSS -->
	<link href="<?php echo base_url()?>style/css/responsive/responsive.css" rel="stylesheet">
	<style>
	.dropdown-menu {
    position: absolute;
	top : 60;
    left: 0;
    z-index: 1000;
    display: none;
    float: left;
    text-align: left;
    list-style: none;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid rgba(0,0,0,.15);
	}
	</style>
</head>

<body>
<!-- Preloader Start -->
<div id="preloader">
	<div class="yummy-load"></div>
</div>

<div id="pattern-switcher">

	Bg Pattern
</div>
<div id="patter-close">
	<i class="fa fa-times" aria-hidden="true"></i>
</div>

<!-- ****** Top Header Area Start ****** -->
<div class="top_header_area">
	<div class="container">
		<div class="row">
			<div class="col-5 col-sm-6">
				<!--  Top Social bar start -->
				<div class="top_social_bar">
					<?php
					if($social_bar){
						foreach($social_bar as $sb){
						?>
							<a href="<?php echo $sb->link;?>"><i class="<?php echo $sb->name;?>" aria-hidden="true"></i></a>
						<?php }
					}
					?>
				</div>
			</div>
			<!--  Login Register Area -->
			<div class="col-7 col-sm-6">
				<div class="signup-search-area d-flex align-items-center justify-content-end">
					<div class="login_register_area d-flex">
						<div class="login">
							<a href="register.html">Sing in</a>
						</div>
						<div class="register">
							<a href="register.html">Sing up</a>
						</div>
					</div>
					<!-- Search Button Area -->
					<div class="search_button">
						<a class="searchBtn" href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
					</div>
					<!-- Search Form -->
					<div class="search-hidden-form">
						<form action="#" method="get">
							<input type="search" name="search" id="search-anything" placeholder="Search Anything...">
							<input type="submit" value="" class="d-none">
							<span class="searchBtn"><i class="fa fa-times" aria-hidden="true"></i></span>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- ****** Top Header Area End ****** -->
