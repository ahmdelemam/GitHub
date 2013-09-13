<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>video</title>
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
<video width="500" height="300" controls="controls" preload="none">
    <!-- MP4 for Safari, IE9, iPhone, iPad, Android, and Windows Phone 7 -->
    <source type="video/mp4" src="<?= site_url(); ?>assets/uploads/files/<?= $allnews[0] ?>" />
    <!-- WebM/VP8 for Firefox4, Opera, and Chrome -->
    <source type="video/webm" src="<?= site_url(); ?>assets/uploads/files/<?= $allnews[1] ?>" />
    <!-- Ogg/Vorbis for older Firefox and Opera versions -->
    <source type="video/ogg" src="<?= site_url(); ?>assets/uploads/files/<?= $allnews[2] ?>" />
    
</video>
</center>
<script>
// using jQuery
$(document).ready(function(e) {
    $('video,audio').mediaelementplayer(/* Options */);
});

</script>
</body>
</html>


