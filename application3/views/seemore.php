<div class="container" style="text-align:center; margin-top:50px;" class="row-fluid">
   <div class="span9 offset1">
       <div id="myCarousel" class="carousel slide">
       		<div class="carousel-inner">
		   <?php 
                foreach($one_flyer as $flyer){
                    echo "<div class='item'>";
					
					$image_properties = array(
					  'src' => 'uploads/'.$flyer->image,
					  'alt' => 'qatar offers  '.$flyer->name,
					  'title' => '',
					  'rel' => '',
					);
                    echo img($image_properties);
					echo '<div class="carousel-caption">
                      '.$flyer->name.'</div>';
                    
					echo '</div>';
                }
            ?>
            </div>
            <!-- Carousel nav -->
  <a class="carousel-control left" href="#myCarousel" data-slide="prev" dir="ltr" style="text-align:center">&lsaquo;</a>
  <a class="carousel-control right" href="#myCarousel" data-slide="next"  dir="ltr" style="text-align:center">&rsaquo;</a>
</div>
    </div>
</div>

