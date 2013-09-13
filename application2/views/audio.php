<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>audio</title>
<!-- HTML5 shim for IE backwards compatibility -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="<?= site_url(); ?>build/mediaelement-and-player.min.js"></script>
<link rel="stylesheet" href="<?= site_url(); ?>build/mediaelementplayer.css" />
<center>
<img src="<?= site_url(); ?>media/audiobg.jpg" alt=" ">
<audio width="500" src="<?= site_url(); ?>assets/uploads/files/<?= $allnews ?>" type="audio/mp3" controls="controls">		</audio>
</center>
<script>
// using jQuery
$(document).ready(function(e) {
    $('video,audio').mediaelementplayer(/* Options */);
});

</script>
</body>
</html>


