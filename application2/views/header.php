<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><title>:: Amr Katamesh ::</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= site_url(); ?>_/img/favicon.ico" rel="icon">
    <link href="<?= site_url(); ?>_/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="<?= site_url(); ?>_/css/bootstrap-responsive.css" rel="stylesheet" type="text/css">
    <link href="<?= site_url(); ?>_/fonts/stylesheet.css" rel="stylesheet" type="text/css" media="all">
    <link href="<?= site_url(); ?>_/css/style.css" rel="stylesheet" type="text/css">
    <!-- HTML5 shim for IE backwards compatibility -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
	<script type="text/javascript" src="<?= site_url(); ?>_/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="<?= site_url(); ?>_/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?= site_url(); ?>_/js/loader.js"></script>
    <script type="text/javascript" src="<?= site_url(); ?>_/js/menu.js"></script>
	<script type="text/javascript" src="<?= site_url(); ?>_/js/enscroll-0.3.0.min.js"></script>
    <script type="text/javascript" src="<?= site_url(); ?>_/js/jquery.zlayer.full.js"></script>
    <script type="text/javascript" src="<?= site_url(); ?>_/js/jquery.spritely-0.4.js"></script>
    <script type="text/javascript" src="<?= site_url(); ?>_/js/jquery.queryloader2.js"></script>
    <script type="text/javascript" src="<?= site_url(); ?>_/js/ajaxmodal.js"></script>
    <script type="text/javascript">
    $(document).ready(function () {
		$("body").queryLoader2({
			percentage: true,
			completeAnimation: "grow"
		});
	});
    </script>
	<script type="text/javascript">
		$(document).ready(function(e) {
		   $('.scrollbox3').enscroll({
				showOnHover: true,
				verticalTrackClass: 'track3',
				verticalHandleClass: 'handle3',
			});
			$('.t7sh').zlayer({mass:150,force:'push',confine:'y',canvas:'html'}); 
			/*$('.fill').zlayer({mass:200,force:'push',confine:'y',canvas:'html'});*/
		});
		(function($) {
			$(document).ready(function(e) {
				window.setInterval(function(){$('#bird').sprite({fps: 4,no_of_frames: 12, play_frames: 12})},7000);
			});
		})(jQuery);
	</script>
