<img class="fill" src="<?= site_url(); ?>_/images/homebg.gif" alt=" ">
<img class="t7sh" src="<?= site_url(); ?>_/images/amr.png" alt=" ">
<?php require_once('menu.php'); ?>
<div>
    <section class="container minimum" style="min-height:591px;">
        <article class="span3 pull-right blackshadow box scrollbox3" >
				<?php
                    if(!isset($allnews)){
                    
                    echo '<center> لا يوجد اى اخبار</center>';
                    }else{
                         foreach ($allnews1 as $news) {
                    ?>       
                         
<a style="color:#000;" href="<?= site_url(); ?>site/newsNumber/<?php echo $news->id; ?>"><?php echo $news->title; ?></a><div class="clearfix"></div>
                    <?php
                        }//foreach
                        
                      }//if
                    ?>
        </article>
        
        <div class="clearfix visible-desktop"></div>
        <article class="span3 pull-right blackshadow box  scrollbox3">
        <?php
if(!isset($allnews)){

echo '<center> لا يوجد اى محتوي</center>';
}else{
	 foreach ($allnews2 as $news2) {
		 if($news2->type == 1){
			 echo '<a style="color:#000;" data-target="#video" href="' . site_url() .'site/audio/'.$news2->audio.'" role="button" data-toggle="modal">';
			 echo '<img src="'.site_url().'_/img/audioicon.png" width="20">';
		 }else{
			 echo '<a style="color:#000;" data-target="#video" href="' . site_url() .'site/video/'. 
			 $news2->video1 .'/'.
			 $news2->video2 .'/'.
			 $news2->video3 .'" role="button" data-toggle="modal">';
			 echo '<img src="'.site_url().'_/img/videoicon.png" width="20">';
		 }
?>      
        <?php echo $news2->title; ?>
        <div class="clearfix"></div>
       </a>
<?php
}//foreach

}//if
?>       
        
        </article>
        <div class="clearfix visible-desktop"></div>
    </section>
</div>
<?php foreach($allnews as $frame){ 
	echo '<img class="frame" src="'. site_url() .'assets/uploads/files/'.$frame->image.'" alt=" ">';
}?>
