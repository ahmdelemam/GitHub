<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>QATAR</title>

<link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>css/bootstrap-responsive.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet" type="text/css">
<!-- HTML5 shim for IE backwards compatibility -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>

<body>

<div class="container" style="text-align:center;">
  
  
  <div class="modal loginform"><?php
  if(validation_errors()){
			echo "<div class='alert alert-error centrize'>";
			echo validation_errors();
			echo "</div>";
		}
echo form_open('adminstrator/admin/admin_login_validation');

$attributes = array(
    'class' => 'span2',
);
echo form_label("البريد الالكترونى", "email", $attributes);
$attributes = array(
	"name" => "email",
	"id" => "email",
	"value" => "",
);	
echo form_input($attributes);
echo "<div class='clearfix' ></div>";
$attributes = array(
    'class' => 'span2',
);
echo form_label("كلمة المرور", "password", $attributes);
$attributes = array(
	"name" => "password",
	"id" => "password",
	"value" => "",
);	
echo form_password($attributes);
echo "<div class='clearfix' ></div>";
$attributes = array(
			"class" => "btn  btn-primary",
			"name" => "submit",
			"value" => "دخول",
		);	
echo form_submit($attributes);
echo form_close();
?></div>
</div>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/myscript.js"></script>
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>

</body>
</html>
