<!doctype html>

<html lang="en">

	<head>
		<meta charset="utf-8">
        <meta name="author" content="Jiaye Yuan">
		<meta name="robots" content="index, follow">

		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/css/style.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/bootstrap.min.css" >
        <link rel="stylesheet"href="<?php echo base_url(); ?>public/assets/css/carousel.css">
        <link rel="stylesheet"href="<?php echo base_url(); ?>public/assets/css/carousel.rtl.css">

        <script src="<?php echo base_url(); ?>public/assets/js/jquery-3.6.0.js"></script>
        <script src="<?php echo base_url(); ?>public/assets/js/jquery-3.6.0.min.js"></script>
        <script src="<?php echo base_url(); ?>public/assets/js/bootstrap.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

		<script src = "<?php echo base_url(); ?>public/assets/js/script.js"></script>
        <script src = "<?php echo base_url(); ?>public/assets/js/bootstrap.bundle.min.js"></script>
        
	</head>

    <!-- <style type="text/css">
		body {
            /* background-color: #e6e6e6; */
        }
	</style> -->
    

    <header data-bs-theme="dark">
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="home_page">LOGO</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>course_video">Free Course</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>course_video_2">Computer Basic</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Front End</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>course_video_3">Back End</a>
                    </li>
                    
                    </ul>
                    <!-- <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                    </form> -->
                    <ul class="nav">
                    <li class="nav-item">
                        <?php if (session()->get('username')) { ?>
                            <a class="mx-4" href="<?php echo base_url(); ?>profile_display"> Account </a>
                            <a class="mx-4" href="<?php echo base_url(); ?>login/logout"> Log out </a>
                        <?php } else { ?>
                            <a class="mx-4" href="<?php echo base_url(); ?>login"> Log in? </a>
                        <?php } ?>
                    </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>