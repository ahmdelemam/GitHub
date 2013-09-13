
<!-- Button to trigger modal 
<a href="#myModal" role="button" class="btn" data-toggle="modal">Launch demo modal</a>
 -->
<!-- Modal -->
<div id="Modal_register" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <p id="myModalLabel">سجل معنا وستصلك رسائل بأحدث و أفضل العروض</p>
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
echo form_open('site/register_validation');
$attributes = array(
    'class' => 'span2',
);
echo form_label("الاسم", "name", $attributes);
$attributes = array(
	"name" => "name",
	"id" => "name",
	"value" => "",
);	
echo form_input($attributes);
echo "<div class='clearfix' ></div>";
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
    'class' => 'span2',
);
echo form_label(" تكرار كلمة المرور", "passwordc", $attributes);
$attributes = array(
	"name" => "passwordc",
	"id" => "passwordc",
	"value" => "",
);	
echo form_password($attributes);
echo "<div class='clearfix' ></div>";
$attributes = array(
    'class' => 'span2',
);
echo form_label("العنوان", "address", $attributes);
$attributes = array(
	"name" => "address",
	"id" => "address",
	"value" => "",
);	
echo form_input($attributes);
echo "<div class='clearfix' ></div>";
$attributes = array(
    'class' => 'span2',
);
echo form_label("الموبايل", "mobile", $attributes);
$attributes = array(
	"name" => "phone",
	"id" => "mobile",
	"value" => "",
);	
echo form_input($attributes);

?>
</div>
  <div class="modal-footer">
  	
    <button id="close" class="btn" data-dismiss="modal" aria-hidden="true">اغلاق</button>
    <?php 
		$attributes = array(
			"class" => "btn  btn-primary",
			"value" => "تسجيل",
			"name" => "submit2"
		);	
		echo form_submit($attributes);
	 ?>
    
  </div> 
<?php echo form_close(); ?>



</div>