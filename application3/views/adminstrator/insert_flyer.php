
<div class="container" style="text-align:center;">
 <div class="btn"> اضافة فلاير جديد</div>
		
<div class="flyer_form">
    <form action="<?php echo base_url(); ?>adminstrator/admin/add_flyer_validation" method="post" enctype="multipart/form-data">
        <label>اسم الفلاير</label><input name="flyer" type="text" id="flyer" /><br /><label>صورة اللوجو</label><input name="image1" type="file" /><br />
        <input name="add_flyer_name" type="submit" class="btn btn-info" value="Add Flyer" />
        
    </form>
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
