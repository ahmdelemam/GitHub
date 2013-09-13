<div class="container" style=" text-align:center;" class="row-fluid">
    
   <div id="offers" class="row">
       
<?php 
	foreach($offers as $offer){
		echo '<div class="one_item span2">';
		$image_properties = array(
		  'src' => 'uploads/'.$offer->image,
		  'alt' => 'qatar offers',
		  'class' => 'item-img  img-rounded',
		  'width' => '150',
		  'height' => '150',
		  'title' => '',
		  'rel' => '',
		);
		echo img($image_properties);
		echo "<div class='clearfix'></div>";
		echo $offer->offer_name ;
		echo "<div class='clearfix'></div>";
		echo $offer->offer_price ;
		echo "<div class='clearfix'></div>";
		echo $offer->offer_text1 ;
		echo "<div class='clearfix'></div>";
		echo $offer->offer_text1;
		echo "<div class='clearfix'></div>";
?>
					<img src="<?php echo base_url(); ?>img/stars.png">
					<a href="<?php echo base_url(); ?>site/seemore/<?php echo $offer->id; ?>"><img src="<?php echo base_url(); ?>img/seemore.png"></a>
			<?php		
					echo '</div>';
                }
            ?>
    </div>
</div>