<img class="fill" src="<?= site_url(); ?>_/images/albumsbg.jpg" alt=" ">
<img class="t7sh" src="<?= site_url(); ?>_/images/amralbums.png" alt=" ">
<?php require_once('menu.php'); ?>
<div><section class="container minimum">
    <article class="span5 paper pull-left " ><h1> ألبومات</h1>
    <div class="span3 innerpaper scrollbox3">
        <a class="fancy thumbnail" rel="group" href="<?= site_url(); ?>_/fancyBox/demo/4_b.jpg">
            <img class="clearfix" src="<?= site_url(); ?>_/fancyBox/demo/4_s.jpg" alt="" />
            <span class="albumName">اراب ايدل</span>
        </a>
        <a rel="group" class="fancy hide" href="<?= site_url(); ?>_/fancyBox/demo/2_b.jpg"></a>
        <a class="fancy hide" rel="group" href="<?= site_url(); ?>_/fancyBox/demo/3_b.jpg"></a>
        <a class="fancy hide" rel="group" href="<?= site_url(); ?>_/fancyBox/demo/1_b.jpg"></a>
        
        <a class="fancy thumbnail" rel="group" href="<?= site_url(); ?>_/fancyBox/demo/1_b.jpg"><img src="<?= site_url(); ?>_/fancyBox/demo/1_s.jpg" alt="" />
        <span class="albumName">اراب ايدل</span>
        </a>
        
        <a class="fancy hide" rel="group" href="<?= site_url(); ?>_/fancyBox/demo/2_b.jpg"></a>
        <a class="fancy hide" rel="group" href="<?= site_url(); ?>_/fancyBox/demo/3_b.jpg"></a>
        <a class="fancy hide" rel="group" href="<?= site_url(); ?>_/fancyBox/demo/4_b.jpg"></a>
        
        <a class="fancy thumbnail" rel="group" href="<?= site_url(); ?>_/fancyBox/demo/3_b.jpg"><img src="<?= site_url(); ?>_/fancyBox/demo/3_s.jpg" alt="" />
        <span class="albumName">اراب ايدل</span>
        </a>
        <a rel="group" class="fancy hide" href="<?= site_url(); ?>_/fancyBox/demo/2_b.jpg"></a>
        <a class="fancy hide" rel="group" href="<?= site_url(); ?>_/fancyBox/demo/4_b.jpg"></a>
        <a class="fancy hide" rel="group" href="<?= site_url(); ?>_/fancyBox/demo/1_b.jpg"></a>
        
        <a class="fancy thumbnail" rel="group" href="<?= site_url(); ?>_/fancyBox/demo/2_b.jpg"><img src="<?= site_url(); ?>_/fancyBox/demo/2_s.jpg" alt="" />
        <span class="albumName">اراب ايدل</span>
        </a>
        <a class="fancy hide" rel="group" href="<?= site_url(); ?>_/fancyBox/demo/1_b.jpg"></a>
        <a class="fancy hide" rel="group" href="<?= site_url(); ?>_/fancyBox/demo/3_b.jpg"></a>
        <a class="fancy hide" rel="group" href="<?= site_url(); ?>_/fancyBox/demo/4_b.jpg"></a>
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