
<div class="container" style="text-align:center;">
 <div class="btn">تعديل الصفحة الرئيسية</div>
		
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
			echo $this->session->flashdata('message');
			echo "</div>";
		}
		
		echo form_open_multipart('adminstrator/admin/change_pagination_photos');
		echo "<div class='clearfix' ></div>";
		
		?>
		  <label for="head_text1" class="btn span3">النص الرئيسى</label><input class="btn" type="text" name="head_text1" /><div class='clearfix' ></div>
          <label for="head_text2" class="btn span3">النص   الثانى</label><input class="btn" type="text" name="head_text2" /><div class='clearfix' ></div>
          <label for="image1" class="btn span3"> الصورة الرئيسية</label><input class="span5" type="file" name="image1" /><div class='clearfix' ></div>
          <label for="image2" class="btn span3"> الصورة فى اليسار</label><input class="span5" type="file" name="image2" /><div class='clearfix' ></div>
          <label for="image3" class="btn span3"> الصورة فى اليمين</label><input class="span5" type="file" name="image3" /><div class='clearfix' ></div>
          
  <?php
		
		$attributes = array(
			'name' =>'change',
			'class' =>'span4',
			'value' =>'تعديل',
			'class' =>'btn btn-inverse',
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
