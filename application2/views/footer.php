    
<div id="footer"><footer class="container">
        <div class="pull-left" id="bird"></div>
        <ul class="breadcrumb span3 pull-right" id="social">
            <li><a href="https://www.facebook.com/katameshofficial?ref=hl"><img src="<?= site_url(); ?>_/img/social/facebook.png" alt=" "></a></li>
            <li><a href="https://www.facebook.com/l.php?u=https%3A%2F%2Ftwitter.com%2FAmrKatamesh1&h=lAQGAxEUp"><img src="<?= site_url(); ?>_/img/social/twitter.png" alt=" "></a></li>
            <li><a href="http://www.facebook.com/l.php?u=http%3A%2F%2Fwww.youtube.com%2Fchannel%2FUC-JT6RB3gDUTw87ZYWg9QpQ&h=lAQGAxEUp"><img src="<?= site_url(); ?>_/img/social/youtube.png" alt=" "></a></li>
        </ul>
    </footer></div>
</div>
<div class="container" style="z-index: 9999;position: relative;">
    <span class="pull-left" style="color:#ccc;font-size:12px;">All Rights Reserved www.amrkatamesh.com - 2013 </span>
    <span class="pull-right" style="color:#ccc;font-size:12px;"> Developed by<a href="http://www.inkmix.net" target="_blank"> INK MIX Co.</a></span>
</div>

<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">راسلنى</h3>
        <?php
        if (isset($_POST['send']) && validation_errors()) {
            echo '<script>$(function() {$("#myModal").modal("show");});</script>';
            echo "<div class='alert alert-error centrize'>";
            echo validation_errors();
            echo "</div>";
        }
        ?>
    </div>
    <form action="<?= site_url(); ?>site/send_email" method="post">
        <div class="modal-body">
            <label for="name">الاسم</label><input type="text" name="name"><br/><br/>
            <label for="email">البريد الالكترونى</label><input type="text" name="email"><br/><br/>
            <label for="phone">الموبايل</label><input type="text" name="phone"><br/><br/>
            <label for="title">عنوان الرسالة</label><input type="text" name="title"><br/><br/>
            <label for="msg">الرسالة</label><textarea name="msg"></textarea>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">اغلاق</button>
            <button type="submit" name="send" class="btn btn-primary">ارسال</button>
        </div>
    </form>
</div>

<!-- Modal video-->
<div id="video" class="modal hide fade paper2" tabindex="-1" role="dialog" aria-labelledby="videoLabel" aria-hidden="true">
    <div class="modal-body" style="overflow:hidden">
    </div>
</div>
<center  style="position: relative; z-index: 9999;">
    <audio autoplay controls="controls" style="position: relative; z-index: 9999;">
  <source src="<?= site_url(); ?>media/sound.ogg" type="audio/ogg">
  <source src="<?= site_url(); ?>media/sound.mp3" type="audio/mpeg">
  <source src="<?= site_url(); ?>media/sound.wav" type="audio/wav">
</audio>
</center>
</body>
</html>