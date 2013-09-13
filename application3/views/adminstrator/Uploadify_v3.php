<!DOCTYPE HTML>
<html lang="en-GB">
<head>
    <meta charset="UTF-8">
    <title>Uploadify V3 &amp; CodeIgniter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" type="text/css" media="screen" rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>assets/js/jquery/uploadify_31/uploadify.css" type="text/css" media="screen" rel="stylesheet"/>
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
<!-- Main Content -->
<div class="container">
    <h1 class="page-header">Uploadify V3 &amp; CodeIgniter</h1>
    <p></p>
    <?php echo form_open_multipart(); ?>
    <ul class="unstyled">
        <li>
            <?php echo form_upload('userfile','','id="userfile"'); ?>
            <?php echo (isset($error)) ? $error : ''; ?>
        </li>
        <li>
            <?php echo form_button(array('content'=> 'Upload', 'id'=>'upload-file', 'class'=>'btn btn-large btn-primary')); ?>
        </li>
    </ul>
    <?php echo form_close(); ?>
</div>
<!-- End Of Main Content -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php echo base_url(); ?>assets/js/jquery/jquery-1.8.0.min.js"><\/script>')</script>
<script src="<?php echo base_url(); ?>assets/js/jquery/uploadify_31/jquery.uploadify-3.1.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {

        var base_url = '<?php echo base_url(); ?>';
        $('#upload-file').click(function (e) {
            e.preventDefault();
            $('#userfile').uploadify('upload', '*');
        });
        $('#userfile').uploadify({
            'debug':true,
            'auto':false,
            'swf': base_url + 'assets/js/jquery/uploadify_31/uploadify.swf',
            'uploader': base_url + 'adminstrator/uploadify_v3/do_upload',
            'cancelImg': base_url + 'assets/javascript/jquery/uploadify_31/uploadify-cancel.png',
            'fileTypeExts':'*.jpg;*.bmp;*.png;*.tif',
            'fileTypeDesc':'Image Files (.jpg,.bmp,.png,.tif)',
            'fileSizeLimit':'2MB',
            'fileObjName':'userfile',
            'buttonText':'Select Photo(s)',
            'multi':true,
            'removeCompleted':false,
			'onUploadComplete' : function(file, errorCode, errorMsg, errorString) {
                alert(file.name);
            },
            'onUploadError' : function(file, errorCode, errorMsg, errorString) {
                alert('The file ' + file.name + ' could not be uploaded: ' + errorString);
            }//,
//			'onUploadComplete' : function() {
//				//var name = $('#name').val();
//				//var slug = $('#slug').val();
//				//var des = $('#description').val();
//				//var data = "name="+name+"slug="+slug+"description="+des;
//				var url = base_url+"adminstrator/uploadify_v3/add";
//				$.ajax({
//					url:url,
//					type:'post',
//					cache:false,
//					data:data,
//					success:function() {
//						alert('Success');
//					}
//				});
//				
//				
//				 $.ajax({
//					url : base_url + 'index.php/uploadify/filemanipulation/' + fileObj.type +'/' + fileObj.name,
//					success : function(response){
//					   
//					   if(response == 'image')
//						 {
//							
//						   var images = $('<li><a target="_blank" href="'+base_url+'uploads/'+fileObj.name+'"><img src="'+base_url + 'uploads/thumbs/' +fileObj.name+'" alt=""></a></li><a target="_blank" href="'+base_url+'uploads/'+fileObj.name+'">');
//						   $(images).hide().insertBefore('#displayFiles').slideDown('slow')
//						 }
//						  else
//						 {
//						   var files = $('</a><a href="'+base_url + 'uploads/thumbs/' +fileObj.name+'" target="_blank">'+fileObj.name+'</a>');
//						   $(files).hide().insertBefore('#displayFiles').slideDown('slow')
//						 }
//					}
//				})
//            }
			
        });
    });
</script>
</body>
</html>