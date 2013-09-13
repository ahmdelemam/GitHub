
<div class="container" style="text-align:center;>
 <div class="btn"> اضافة فلاير جديد</div>
		
<div class="flyer_form">

	<?php	echo form_open_multipart('adminstrator/admin/new_offer_validation'); ?>
    <input id="plus" class="btn" name="another" type="button" value=" اضافة صورة أخرى" /><br /><br />
	<input id="main_img" class="btn" name="image1" type="file" />
    	
	<input class="btn btn-info" name="upload" type="submit" value="رفع الملفات" />
    <?php echo form_close(); ?>
</div>


</div>
</div>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/myscript.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>uploadify/jquery.uploadify.min.js"></script>
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
<script type="text/javascript">
	
</script>
</body>
</html>
