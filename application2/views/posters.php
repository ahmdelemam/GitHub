<img class="fill" src="<?= site_url(); ?>_/images/posters/postarsbg.jpg" alt=" ">
<img class="t7sh" src="<?= site_url(); ?>_/images/posters/amrpostars.png" alt=" ">
<?php require_once('menu.php'); ?>
<div><section class="container minimum">
        <article class="span5 paper pull-left " ><h1> بوسترات</h1>
        <div class="span4 innerpapernews scrollbox3">
           <div class="span3 rings" style="min-height:350px;">        
                       <h1 style="font-size:5em;">قريبا...</h1>
                       
                </div>
            </div>
</article>
      </section></div>
      <!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="<?= site_url(); ?>_/fancyBox/lib/jquery.mousewheel-3.0.6.pack.js"></script>

	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="<?= site_url(); ?>_/fancyBox/source/jquery.fancybox.pack.js"></script>
	<link rel="stylesheet" type="text/css" href="<?= site_url(); ?>_/fancyBox/source/jquery.fancybox.css" media="screen" />

    <script type="text/javascript">
		$(document).ready(function(e) {
			$("a.fancy").fancybox({
				'transitionIn'	:	'elastic',
				'transitionOut'	:	'elastic',
				'speedIn'		:	600, 
				'speedOut'		:	200, 
				'overlayShow'	:	true,
				'showNavArrows' : true,
				
			});
		});
	</script>