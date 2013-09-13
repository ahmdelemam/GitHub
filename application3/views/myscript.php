</div>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  
	$("#close").click(function(event){
		 
		 window.location.replace("<?php echo base_url(); ?>site/index");
    });
 
});
</script>
<script type="text/javascript">
<?php if(isset($_POST['submit'])) { ?> /* Your (php) way of checking that the form has been submitted */
            $(function() {                       // On DOM ready
                $('#myModal').modal('show');     // Show the modal
            });
<?php } ?>                                    /* form has been submitted */
<?php if(isset($_POST['submit2'])) { ?> /* Your (php) way of checking that the form has been submitted */
            $(function() {                       // On DOM ready
                $('#Modal_register').modal('show');     // Show the modal
            });
<?php } ?>
</script>

</body>
</html>