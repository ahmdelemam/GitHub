<div class="container" style="text-align:center;>
 <div class="btn"> اضافة فلاير جديد</div>
<div class="flyer_form">

	 <?php echo form_open_multipart(); ?>
    <ul class="unstyled">
        <li>
            <?php echo form_upload('userfile','','id="userfile"'); ?>
            <?php echo (isset($error)) ? $error : ''; ?>
            <?php echo $this->session->userdata('message');?>
        </li>
        
        <li>
            <?php echo form_button(array('content'=> 'Upload', 'id'=>'upload-file', 'class'=>'btn btn-large btn-primary')); ?>
        </li>
    </ul>
    <?php echo form_close(); ?>
</div>
</div>
</div>
<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>-->
<script src="<?php echo base_url(); ?>js/jquery.js"></script>
<script>window.jQuery || document.write('<script src="<?php echo base_url(); ?>assets/js/jquery/jquery-1.8.0.min.js"><\/script>')</script>
<script src="<?php echo base_url(); ?>assets/js/jquery/uploadify_31/jquery.uploadify-3.1.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/myscript.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        var base_url = '<?php echo base_url(); ?>';
        var forign = '<?php echo $this->session->userdata('some_name'); ?>';
        $('#upload-file').click(function (e) {
            e.preventDefault();
            $('#userfile').uploadify('upload', '*');
        });
        $('#userfile').uploadify({
            //'debug':true,
            'auto':false,
            'formData': {/*'image_name' : "",*/ 'foriegn_key' : forign},
            'swf': base_url + 'assets/js/jquery/uploadify_31/uploadify.swf',
            'uploader': base_url + 'adminstrator/admin/add',
            'cancelImg': base_url + 'assets/js/jquery/uploadify_31/uploadify-cancel.png',
            'fileTypeExts':'*.jpg;*.bmp;*.png;*.tif',
            'fileTypeDesc':'Image Files (.jpg,.bmp,.png,.tif)',
            'fileSizeLimit':'2MB',
            'fileObjName':'userfile',
            'buttonText':'Select Photos',
            'multi':true,
            'removeCompleted':true,
			'onInit'   : function(instance) {
            //console.log(instance.settings.fileObjName);
				
        	},
            'onSelect' : function(file) {
            //alert('The file ' + file.name + ' was added to the queue.');
        	},
            'onUploadStart' : function(file) {
            //alert('The file ' + file.name + ' was added to the queue.');
                $("#userfile").uploadify("settings", "formData",{/*'image_name' : "",*/ 'foriegn_key' : forign});
        	},
			'onUploadComplete' : function(file, data, response) {
              var url = base_url+'adminstrator/admin/add';
				$.ajax({
					url:url,
					type:'post',
                    data:{/*'image_name' : "",*/ 'foriegn_key' : forign},
					success:function() {
						console.log('Success');
					},
					error:function() {
						console.log('Faild');
					}
				});
            },
            'onUploadError' : function(file, errorCode, errorMsg, errorString) {
                
            }
        });
    });
</script>
</body>
</html>
