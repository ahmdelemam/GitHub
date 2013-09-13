<html>
<head>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
    <script src="<?= site_url(); ?>_/js/jquery.queryloader2.js" type="text/javascript"></script>
    <script type="text/javascript">
    $(document).ready(function () {
		$("body").queryLoader2({
			percentage: true,
			completeAnimation: "grow"
		});
	});
    </script>
    <style type="text/css">
       
    body {
		background-color: #000 !important;
		background: url(_/images/bg.gif) no-repeat center center fixed;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
		margin-left: 0px;
		margin-top: 0px;
		margin-right: 0px;
		margin-bottom: 0px;
	}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><title>:: Amr Katamesh ::</title></head>
<body>
    <div id="loading-overlay"></div>
    <a href="<?= site_url(); ?>site/home"><img src="<?= site_url(); ?>_/images/mask.png" width="100%" height="100%" border="0"/></a> 

</body>
</html>