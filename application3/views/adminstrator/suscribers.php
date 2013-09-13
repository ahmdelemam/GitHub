<div id="offers" class="span6" style="margin-left:350px; margin-top:50px;">
<?php
echo form_open_multipart("adminstrator/admin/mail_to_subscribers");
if($this->session->flashdata('message')){
	echo '<div class="alert alert-error" style="text-align:center">'.$this->session->flashdata('message').'</div>';
}
echo "<div class='clearfix' ></div>";
$attributes = array(
    'class' => 'span3',
);

echo "<div class='clearfix' ></div>";
$attributes = array(
    'class' => 'span3',
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
    'class' => 'span3',
);
echo form_label("الرسالة", "msg", $attributes);
$attributes = array(
	"name" => "msg",
	"id" => "message",
	"value" => set_value('msg'),
);	
echo form_textarea($attributes);

echo "<div class='clearfix' ></div>";
$attributes = array(
    'class' => 'span3',
);
echo form_label("المرفقات", "image1", $attributes);
$attributes = array(
	"type" => "file",
	"name" => "image1",
	"id" => "image1",
	"value" => set_value('image1'),
);	
echo form_input($attributes);
echo "<div class='clearfix' ></div>";
$attributes = array(
	'class' => 'btn gess',
	'value' => 'ارسل',
	'name' => 'send'
);
echo form_submit( $attributes);
echo form_close();
?>
</div>