
<div class="container" style="text-align:center;">
 <div class="btn"> اضافة عرض جديد</div>
		
<div class="modal" style="margin-top:50px; padding:20px;">

	<?php	
		if($this->session->flashdata('message')){
			echo "<div class='alert alert-success centrize'>";
			echo $this->session->flashdata('message');
			echo "</div>";
		}
    	if(validation_errors()){
			echo "<div class='alert alert-error centrize'>";
			echo validation_errors();
			echo "</div>";
		}
		
		echo form_open_multipart('adminstrator/admin/new_offer_validation');
		echo "<div class='clearfix' ></div>";
		$attributes = array(
			'class' => 'span3',
		);
		echo form_label("اسم العرض", "offer_name", $attributes);
		$attributes = array(
				'name' =>'offer_name',
				'class' =>'span4',
				'value' => set_value('offer_name'),
				'type' => 'text'
		);
		echo form_input($attributes) ;
		echo "<div class='clearfix' ></div>";
		$attributes = array(
			'class' => 'span3',
		);
		echo form_label("سعر العرض", "price", $attributes);
		$attributes = array(
				'name' =>'price',
				'class' =>'span4',
				'value' => set_value('price'),
				'type' => 'text'
		);
		echo form_input($attributes) ;
		echo "<div class='clearfix' ></div>";
		$attributes = array(
			'class' => 'span3',
		);
		echo form_label("تفاصيل العرض 1", "offer_text1", $attributes);
		$attributes = array(
			'name' =>'offer_text1',
			'class' =>'span4',
			'value' => set_value('offer_text1'),
			'type' => 'text'
		);
		echo form_input($attributes) ;
		echo "<div class='clearfix' ></div>";
		$attributes = array(
			'class' => 'span3',
		);
		echo form_label("تفاصيل العرض 2", "offer_text2", $attributes);
		$attributes = array(
			'name' =>'offer_text2',
			'class' =>'span4',
			'value' => set_value('offer_text2'),
			'type' => 'text'
		);
		echo form_input($attributes) ;
		echo "<div class='clearfix' ></div>";
		$attributes = array(
			'class' => 'span3',
		);
		echo form_label("صورة مقاس 400*400", "image", $attributes);
		$attributes = array(
			'name' =>'image',
			'class' =>'span4 btn',
			'type' => 'file'
		);
		echo form_input($attributes) ;
		echo "<div class='clearfix' ></div>";
		$attributes = array(
			'name' =>'add',
			'class' =>'span4',
			'value' =>'اضافة عرض جديد',
			'class' =>'btn btn-primary',
			'type' => 'submit'
		);
		echo form_submit($attributes);
		echo form_close(); 
    ?>
</div>


</div>
</div>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/myscript.js"></script>
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>

</body>
</html>
