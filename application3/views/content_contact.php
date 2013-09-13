<div id="offers" class="span6" style="margin-left:350px;">
<?php
$this->load->helper('form');

echo $message;
if(validation_errors()){
echo "<div class='alert alert-error centrize' >";
echo validation_errors();
echo "</div>";
}
echo form_open("site/send_email");
$attributes = array(
    'class' => 'span2',
);
echo form_label("الاسم", "name", $attributes);
$attributes = array(
	"name" => "name",
	"id" => "name",
	"value" => set_value('name'),
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
	"value" => set_value('email'),
);	
echo form_input($attributes);
echo "<div class='clearfix' ></div>";
$attributes = array(
    'class' => 'span2',
);
echo form_label("عنوان الرسالة", "subject", $attributes);
$attributes = array(
	"name" => "subject",
	"id" => "subject",
	"value" => set_value('subject'),
);	
echo form_input($attributes);
echo "<div class='clearfix' ></div>";
$attributes = array(
    'class' => 'span2',
);
echo form_label("الرسالة", "message", $attributes);
$attributes = array(
	"name" => "message",
	"id" => "message",
	"value" => set_value('message'),
);	
echo form_textarea($attributes);
echo "<div class='clearfix' ></div>";
$attributes = array(
	'class' => 'btn gess',
	'value' => 'ارسل لنا',
	'name' => 'send'
);
echo form_submit( $attributes);
echo form_close();
?>
</div>