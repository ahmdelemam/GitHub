<div class="container" style="text-align:center;" class="row-fluid">
    
   <div id="offers" class="row" style="margin-top:50px; line-height:50px;">
       
		   <?php 
                foreach($offers as $offer){
					echo '<div>';echo '<div class="pull-right">';
                    echo "<div class='clearfix'></div>";
					echo "<span class='btn span5' >اسم العرض </span>";
                    echo $offer->name ;
                    echo "<div class='clearfix'></div>";
					echo "<span class='btn span5' >سعر العرض </span>";
                    echo $offer->price ;
                    echo "<div class='clearfix'></div>";
					echo "<span class='btn span5' >تفاصيل العرض </span>";
                    echo $offer->details ;
                    echo "<div class='clearfix'></div>";
					
					echo '</div>';
					$image_properties = array(
					  'src' => 'uploads/'.$offer->image,
					  'alt' => 'qatar offers',
					  'class' => 'img-rounded span5 seemore_img',
					  'width' => '400',
					  'height' => '400',
					  'title' => '',
					  'rel' => '',
					);
                    echo img($image_properties);
					echo '</div>';
                }
            ?>
    </div>
</div>