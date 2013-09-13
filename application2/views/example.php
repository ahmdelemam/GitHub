<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <link href="<?= site_url(); ?>css/bootstrap.css" rel="stylesheet" type="text/css">

<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
<style type='text/css'>
body
{
	font-family: Arial;
	font-size: 14px;
}
a {
    color: blue;
    text-decoration: none;
    font-size: 14px;
}
a:hover
{
	text-decoration: underline;
}
</style>
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
      <li><a href="<?= site_url(); ?>admin/news">أخبار</a> </li><li class="divider-vertical"></li>
      <li><a href="<?php echo site_url('admin/gallery')?>">ألبوم</a></li><li class="divider-vertical"></li>
      <li><a href="<?= site_url(); ?>admin/rings">رنات</a></li><li class="divider-vertical"></li>
      <li><a href="<?php echo site_url('images_examples/example2')?>">بوسترات</a></li><li class="divider-vertical"></li>
      <li><a href="<?= site_url(); ?>admin/media">ميديا </a></li><li class="divider-vertical"></li>
      <li><a href="<?= site_url(); ?>admin/users">مستخدم </a></li><li class="divider-vertical"></li>
      <li><a href="<?= site_url(); ?>img/Frame.rar">Download frame PSD</a></li><li class="divider-vertical"></li>
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
	<!--<div>
		<a href='<?php echo site_url('examples/news')?>'>أخبار</a> |
		<a href='<?php echo site_url('examples/orders_management')?>'>Orders</a> |
		<a href='<?php echo site_url('examples/products_management')?>'>Products</a> |
		<a href='<?php echo site_url('examples/offices_management')?>'>Offices</a> | 
		<a href='<?php echo site_url('examples/media')?>'>ميديا</a> |		 
		<a href='<?php echo site_url('examples/film_management')?>'>Films</a> |
        <a href='<?php echo site_url('images_examples/example1')?>'>example1</a> |
		<a href='<?php echo site_url('images_examples/example2')?>'>بوسترات</a> |
		<a href='<?php echo site_url('images_examples/example3')?>'>example3</a> |
		<a href='<?php echo site_url('images_examples/example4')?>'>example4</a> | 
		<a href='<?php echo site_url('images_examples/simple_photo_gallery')?>'>simple_photo_gallery</a> |		 
	</div>-->
	<div style='height:20px;'></div>  
    <div>
		<?php echo $output; ?>
    </div>
    <script>
$(document).ready(function(e) {

$("#video1_field_box,#video2_field_box,#video3_field_box,#audio_field_box").css({display: "none"});
    $("#field-type").change(function() {
		if($(this).val() == '1'){
			 $("#audio_field_box").show();
			 $("#video1_field_box,#video2_field_box,#video3_field_box,#image_field_box").hide() ;
		}else if($(this).val() == '2'){
			  $("#video1_field_box,#video2_field_box,#video3_field_box").show() ;
			  $("#audio_field_box,#image_field_box").hide();
		}else{
			$("#image_field_box").show();
			 $("#video1_field_box,#video2_field_box,#video3_field_box,#audio_field_box").hide() ;
		}
	}); 
	
});  
    </script>
</body>
</html>
