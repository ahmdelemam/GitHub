<img class="fill" src="<?= site_url(); ?>_/images/newsbg.jpg" alt=" ">
<img class="t7sh" src="<?= site_url(); ?>_/images/amrnews.png" alt=" ">
<?php require_once('menu.php'); ?>
<div>
    <section class="container minimum">
            <article class="span5 paper pull-left">
                <h1> أخبار</h1>
                <div class="span4 innerpapernews scrollbox3">
                    <?php
                    if(!isset($allnews)){
                    
                    echo '<center><h1> لا يوجد اى اخبار</h1></center>';
                    }else{
                         foreach ($allnews as $news) {
                    ?>       
                    <div class="span3 news">  
                         
                            <b><?php echo $news->title; ?>   <span class="date"><?php echo $news->date; ?> </span></b><div class="clearfix"></div>
                    <a href="<?= site_url(); ?>site/newsNumber/<?php echo $news->id; ?>"><h2>المزيد...</h2></a>
                    </div>
                    <?php
                        }//foreach
                        
                      }//if
                    ?>
            </div>
        </article>
    </section>
</div>