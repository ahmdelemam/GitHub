
<div class="container" style="text-align:center;">
 <div class="btn"> اضافة عرض اسبوعى</div>
		
<div class="modal" style="margin-top:50px; padding:20px;">

	<?php	
		if($this->session->flashdata('message')){
			echo "<div class='alert alert-success centrize'>";
			echo $this->session->flashdata('message');
			echo "</div>";
		}
		if($this->session->flashdata('error')){
			echo "<div class='alert alert-error centrize'>";
			echo $this->session->flashdata('error');
			echo "</div>";
		}
    	if(validation_errors()){
			echo "<div class='alert alert-error centrize'>";
			echo validation_errors();
			echo $this->session->flashdata('message');
			echo "</div>";
		}
		
		echo form_open_multipart('adminstrator/admin/weekoffer_validation');
		echo "<div class='clearfix' ></div>";
		$attributes = array(
			'class' => 'span3',
		);
		echo form_label("اسم العرض", "name", $attributes);
		$attributes = array(
				'name' =>'name',
				'class' =>'span4',
				'value' => set_value('name'),
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
		echo form_label("تفاصيل العرض ", "details", $attributes);
		$attributes = array(
			'name' =>'details',
			'class' =>'span4',
			'value' => set_value('details'),
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
			'value' =>'اضافة عرض اسبوعى',
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
