<!doctype html>
<html>
<head>
<meta charset="utf-8">
    <link href="<?= site_url(); ?>css/bootstrap.css" rel="stylesheet" type="text/css">
<title>login</title>
</head>

<body>

<!-- Button to trigger modal 
<a href="#myModal" role="button" class="btn" data-toggle="modal">Launch demo modal</a>
 -->
<!-- Modal -->
<div id="myModal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="gess" id="myModalLabel"><i class="icon-heart" style="margin:10px;"></i>مرحبا بك<i class="icon-heart" style="margin:10px;"></i></h4>
	<?php
		if(validation_errors()){
			echo "<div class='alert alert-error centrize'>";
			echo validation_errors();
			echo "</div>";
		}
	?>
  </div>
  <div class="modal-body">
    <?php
echo form_open('admin/admin_login_validation');

$attributes = array(
    'class' => 'span2',
);
echo form_label("البريد الالكترونى", "email", $attributes);
$attributes = array(
	"name" => "email",
	"id" => "email",
	"value" => set_value('email'),
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
	"value" => set_value('password'),
);	
echo form_password($attributes);

?>
</div>
  <div class="modal-footer">
  	
    <button id="close" class="btn" data-dismiss="modal" aria-hidden="true">اغلاق</button>
    <?php 
		$attributes = array(
			"class" => "btn  btn-primary",
			"name" => "submit",
			"value" => "دخول",
		);	
		echo form_submit($attributes);
	 ?>
    
  </div> 
<?php echo form_close(); ?>



</div>
</body>
</html>
