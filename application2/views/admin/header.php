<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Back End</title>
<link href="<?= site_url(); ?>css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="<?= site_url(); ?>css/bootstrap-responsive.css" rel="stylesheet" type="text/css">
<link href="<?= site_url(); ?>css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css">
<link href="<?= site_url(); ?>css/bootstrap-responsive-rtl.min.css" rel="stylesheet" type="text/css">
<link href="<?= site_url(); ?>css/bootstrap-fileupload.min.css" rel="stylesheet" type="text/css">
<link href="<?= site_url(); ?>fonts/stylesheet.css" rel="stylesheet" type="text/css">
<link href="<?= site_url(); ?>css/style.css" rel="stylesheet" type="text/css">
<!-- HTML5 shim for IE backwards compatibility -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>

<body>

<nav class="navbar navbar-inverse">
	<div class="navbar-inner">
    	<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
		</a>
    
    <div class="nav-collapse">
    <ul class="nav">
      <li><a href="<?= site_url(); ?>admin/news">أخبار</a> </li>
      <li><a href="<?php echo site_url('Images_examples/example3')?>">ألبوم</a></li>
      <li><a href="<?= site_url(); ?>admin/rings">رنات</a></li>
      <li><a href="<?php echo site_url('admin/example1')?>">بوسترات</a></li>
      <li><a href="<?= site_url(); ?>">ميديا </a></li>
    </ul>
    <div class="btn-group pull-right">
        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="icon-user"></i> admin	<span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
            <li><a href="admin/setting"><i class="icon-wrench"></i> Settings</a></li>
            <li class="divider"></li>
            <li><a href="admin/logout"><i class="icon-share"></i> Logout</a></li>
        </ul>
    </div>
    </div>
    </div>
</nav>
