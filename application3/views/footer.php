<div class="clearfix"></div>
<div class="row-fluid footer_div">
<a target="_blank" href="http://www.cubeadv.com"><p class="span6 pull-right">Designed by  : CUBE ADVERTISING SOLUTIONS | www.cubeadv.com</p></a>
</div>
</div>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/myscript.js"></script>
<script src="<?php echo base_url(); ?>js/bootstrap.js"></script>
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
<script type="text/javascript">
$(document).ready(function(e) {
    $("div.carousel-inner div:first-child").addClass("active");
});

</script>    
</body>
</html>