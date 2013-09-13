<img class="fill" src="<?= site_url(); ?>_/images/clips/clipsbg.jpg" alt=" ">
<img class="t7sh" src="<?= site_url(); ?>_/images/clips/amrclips.png" alt=" ">
<?php require_once('menu.php'); ?>
<div><section class="container minimum">
        <article class="span5 paper pull-left " ><h1> كليبات</h1>
        <div class="span4 innerpapernews scrollbox3">


<div class="span3 rings" style="min-height:350px;">  
<?php
if(!isset($allnews)){

echo '<center><h1> لا يوجد اى كليبات</h1></center>';
}else{
	 foreach ($allnews as $news) {
		 if($news->type == 1){
			 echo '<a data-target="#video" href="' . site_url() .'site/audio/'.$news->audio.'" role="button" data-toggle="modal">';
             echo '<h4><i class="audio"> </i><span class="ringName">';
		 }else{
			 echo '<a data-target="#video" href="' . site_url() .'site/video/'. 
			 $news->video1 .'/'.
			  $news->video2 .'/'.
			   $news->video3 .'" role="button" data-toggle="modal">';
			 echo '<h4><i class="video"> </i><span class="ringName">';
		 }
?>      
        <?php echo $news->title; ?> </span></h4>
       </a>
<?php
}//foreach

}//if
?>       
</div>
</div>
</article>

        
      </section></div>