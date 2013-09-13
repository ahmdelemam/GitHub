
<div class="container" style="border:1px solid #ccc; text-align:center;" class="row-fluid">
    
   <div id="offers-end" class="row">
   
       <div class="alert-success">
        <?php echo $this->session->flashdata('message'); ?>
       </div>
<?php
                foreach($offers as $offer){
					echo '<div class="item span2">';
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
                    echo $offer->name;
                    echo "<div class='clearfix'></div>";
                    echo $offer->price;
                    echo "<div class='clearfix'></div>";
                    echo $offer->details;
                    echo "<div class='clearfix'></div>";
                    
?>
					<img src="<?php echo base_url(); ?>img/stars.png">
					<a href="<?php echo base_url(); ?>site/seemoreweek/<?php echo $offer->id; ?>"><img src="<?php echo base_url(); ?>img/seemore.png"></a>
                    <a href="<?php echo base_url(); ?>adminstrator/admin/delete/<?php echo $offer->id; ?>"><i class="icon-trash" style="cursor:pointer;"></i></a>
			<?php		
					echo '</div>';
                }
            ?>
    </div>
</div>
