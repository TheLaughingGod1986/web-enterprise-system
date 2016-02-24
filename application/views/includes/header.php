<!DOCTYPE html>

<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>PHP i love you</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/build/style.min.css" type="text/css" media="screen" charset="uft-8">
</head>

<body>
<!--<nav class="navbar navbar-inverse">-->
<!--    <div class="container-fluid">-->
<!--        <div class="navbar-header">-->
<!--            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"-->
<!--                    data-target="#bs-example-navbar-collapse-9" aria-expanded="false"><span class="sr-only">Toggle navigation</span>-->
<!--                <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button>-->
<!--            <a class="navbar-brand" --><?php //echo anchor('main/index', 'Scrumptious Seven'); ?><!--</a></div>-->
<!--        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-9">-->
<!--            <ul class="nav navbar-nav">-->
<!--                <li class="active"><a --><?php //echo anchor('main/index', 'Home'); ?><!--</a></li>-->
<!--                <li><a --><?php //echo anchor('main/about', 'About'); ?><!--</a></li>-->
<!--                <li><a href="#">Link</a></li>-->
<!--            </ul>-->
<!--        </div>-->
<!--    </div>-->
<!--</nav>-->
<div id="wrap">
    <!-- Fixed navbar -->
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="brand" href="#">Project name</a>
                <div class="nav-collapse collapse">
                    <ul class="nav">
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#contact">Contact</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li class="divider"></li>
                                <li class="nav-header">Nav header</li>
                                <li><a href="#">Separated link</a></li>
                                <li><a href="#">One more separated link</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>
    </div>
</div>
