<?php 
	foreach($pagination_photos as $pagi){
		$image_properties1 = array(
			  'src' => 'uploads/'.$pagi->center_image,
			  'alt' => 'qatar offers',
			  'class' => '',
			  'width' => '336',
			  'height' => '171',
			  'title' => '',
			  'rel' => '',
			);
		$image_properties2 = array(
			  'src' => 'uploads/'.$pagi->left_image,
			  'alt' => 'qatar offers',
			  'class' => '',
			  'width' => '205',
			  'height' => '266',
			  'title' => '',
			  'rel' => '',
		);
		$image_properties3 = array(
			  'src' => 'uploads/'.$pagi->right_image,
			  'alt' => 'qatar offers',
			  'style' => 'margin-right:50px',
			  'width' => '200',
			  'height' => '264',
			  'title' => '',
			  'rel' => '',
		);
			
	}
?>
<div class="span4 offset3" style="text-align:center"><?php //echo img($image_properties1); ?><?php if($this->session->flashdata('message')){
		echo "<div class='alert alert-success'>";
		echo $this->session->flashdata('message');
		echo "</div>";
	   }  ?></div>
            <div class="span3"><h5> <?php echo $pagi->headtext1; ?></h5> 
            <span><?php echo $pagi->headtext2; ?></span> </div>
            <div class='clearfix'></div>
            
			<?php echo $links;?>
			<div class="span12 offset1" style="text-align:center;">
            <div class="pull-left span2"><?php echo img($image_properties2); ?></div>
     <div class="span7" style="display:table">       
<?php
	foreach($results as $offer){
		
		echo '<div class="item-pagination span2">';
			$image_properties = array(
			  'src' => 'uploads/'.$offer->flyer_image,
			  'alt' => 'qatar offers',
			  'class' => 'item-img-pagination  img-rounded',
			  'width' => '100',
			  'height' => '100',
			  'title' => '',
			  'rel' => '',
			);
			echo img($image_properties);
			$image_logo = array(
			  'src' => 'uploads/'.$offer->logo,
			  'alt' => 'qatar offers',
			  'class' => 'img-rounded',
			  'style' => 'width:100px !important; height:50px !important;',
			  'width' => '100',
			  'height' => '50',
			  'title' => '',
			  'rel' => '',
		);
			echo "<div class='clearfix'></div><div style='width:100px;'>";
			
?></div>
					<?php if($offer->logo != NULL){echo img($image_logo);}else{echo "<div style='width:100px; height:50px;'></div>";}?>
					<a href="<?php echo base_url(); ?>site/seemore/<?php echo $offer->flyer_id; ?>"><img src="<?php echo base_url(); ?>img/seemore.png"></a>
			<?php	
					echo '</div>';
                }
            ?>
            </div>
			<div class="pull-right span2"><?php echo img($image_properties3); ?></div>
            </div>
	

