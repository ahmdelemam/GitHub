<div class="container" style="text-align:center;" class="row-fluid">
<div id="offers-end" class="row">
<div class="alert-success">
<?php echo $this->session->flashdata('message'); ?>
</div>
<?php 
foreach($flyers as $flyer){
	echo '<div class="one_item span2">';
	$image_properties = array(
		'src' => 'uploads/'.$flyer->flyer_image,
		'alt' => 'qatar offers',
		'class' => 'item-img  img-rounded',
		'width' => '150',
		'height' => '150',
		'title' => '',
		'rel' => '',
	);
	echo img($image_properties);
	echo "<div class='clearfix'></div>";                  
	?>
	<img src="<?php echo base_url(); ?>img/stars.png">
	<a href="<?php echo base_url(); ?>adminstrator/admin/seemore/<?php echo $flyer->flyer_id; ?>"><img src="<?php echo base_url(); ?>img/seemore.png"></a>
	<a href="<?php echo base_url(); ?>adminstrator/admin/delete/<?php echo $flyer->flyer_id; ?>"><i class="icon-trash" style="cursor:pointer;"></i></a>
	<?php		
	echo '</div>';
}
?>
</div>
</div>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/myscript.js"></script>
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>

</body>
</html>
