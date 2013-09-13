<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="<?= site_url(); ?>js/bootstrap.min.js"></script>
<script src="<?= site_url(); ?>js/bootstrap-fileupload.min.js"></script>
<script src="<?= site_url(); ?>js/bootstrap-transition.min.js"></script>
<script>
var url = window.location;
	// Will only work if string in href matches with location
	$('ul.nav a[href="'+ url +'"]').parent().addClass('active');
	// Will also work for relative and absolute hrefs
	$('ul.nav a').filter(function() {
		return this.href == url;
	}).parent().addClass('active');
</script>
</body>
</html>