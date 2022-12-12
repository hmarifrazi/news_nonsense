<!DOCTYPE html>
<html lang="en">

<head>
    <title>News Nonsense</title>

    <!-- Meta Information -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="News" name="keywords">
    <meta content="News minus the Sense." name="description">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo base_url(); ?>/img/favicon.ico">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>lib/slick/slick.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>lib/slick/slick-theme.css" rel="stylesheet">
</head>

<body>
    <!-- Top Bar Start -->
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="tb-contact">
                        <p><i class="fas fa-envelope"></i>info@hotmail.com</p>
                        <p><i class="fas fa-phone-alt"></i>+012 345 6789</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Top Bar End -->

    <!-- Brand Start -->
    <div class="brand">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-4">
                    <div class="b-logo">
                        <a href="<?php echo base_url('home'); ?>">
                            <img src="<?php echo base_url(); ?>img/logo.png" alt="Logo">
                        </a>
                        <h2 class="font-italic text-break text-*-center">NONSENSE</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4">
                    <div class="b-ads">
                        <?php 
                            $ad1 = $this->db->where('location', 1)->limit(1, 0)->get('advertisement')->row();
                        ?>
                        <a href="#">
                            <img src="<?= base_url('img/admin/ad/'.$ad1->image) ?>" alt="Advertisement Image">
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="b-search">
                        <form method="get" action="<?= base_url('search') ?>">
                            <input type="text" name="key_word" placeholder="Search">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Brand End -->

    <!-- Nav Bar Start -->
    <div class="nav-bar">
        <div class="container">
            <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                <a href="#" class="navbar-brand">MENU</a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto">
                        <a href="<?= base_url('home') ?>" class="nav-item nav-link">Home</a>
                        <div class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown">Category</a>
                            <div class="dropdown-menu">
                            <?php
                            
                            	$catdrop =$this->db->get('category')->result();

                                if($catdrop){
                                foreach($catdrop as $cd){
                            ?>
                                <a href="<?= base_url('category/'.$cd->id) ?>" class="dropdown-item"><?= $cd->name ?></a>
                            <?php } } ?>
                            </div>
                        </div>
                        <a href="<?= base_url('advertise') ?>" class="nav-item nav-link">Advertise</a>
                        <a href="<?= base_url('contact') ?>" class="nav-item nav-link">Contact Us</a>
                    </div>
                    <div class="social ml-auto">
                        <a href=""><i class="fab fa-twitter"></i></a>
                        <a href=""><i class="fab fa-facebook-f"></i></a>
                        <a href=""><i class="fab fa-linkedin-in"></i></a>
                        <a href=""><i class="fab fa-instagram"></i></a>
                        <a href=""><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Nav Bar End -->