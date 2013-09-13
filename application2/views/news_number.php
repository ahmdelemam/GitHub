<img class="fill" src="<?= site_url(); ?>_/images/newsbg.jpg" alt=" ">
<img class="t7sh" src="<?= site_url(); ?>_/images/amrnews.png" alt=" ">
<?php require_once('menu.php'); ?>
<div><section class="container minimum">
        <article class="span5 paper pull-left " ><h1><a href="<?= site_url(); ?>site/news"> العودة للأخبار</a></h1>
        <div class="span4 innerpapernews scrollbox3">
       <?php foreach ($allnews as $news) {
	   ?>
<div class="span3 news" style="border:none;">  
<strong>
	<?= $news->title; ?>
    <span class="date"><?= $news->date; ?> </span>
</strong><br />
<?php
if($news->type == 1){
	echo '<br /><a data-target="#video" href="' . site_url() .'site/audio/'.$news->audio.'" role="button" data-toggle="modal">';
    echo '<h4><i class="audio"> </i><span class="ringName">الاستماع للصوت</span></a><br /><br />';
	
}else if($news->type == 2){
	echo '<br /><a data-target="#video" href="' . site_url() .'site/video/'. 
	$news->video1 .'/'.
	$news->video2 .'/'.
	$news->video3 .'" role="button" data-toggle="modal">';
	echo '<h4><i class="video"> </i><span class="ringName">مشاهدة الفيديو</span></a><br /><br />';
}else if($news->type == 3 && isset($news->image) && $news->image != ""){
	echo '<img class="newsImage thumbnail" src="'. site_url() .'assets/uploads/files'. $news->image .'" alt=" " />';
}else{
	echo "<br/>";
}
?>
<p><?= $news->content; ?></p>

</div>
<?php } ?>
</div>
</article>
      </section></div>