<?php
foreach($allnews as $news){
?>
<div class="well">
  <form action="<?= base_url(); ?>admin/editNews/<?= $news->id; ?>" method="post">
    <label>العنوان</label>
    <input type="text" value="<?= $news->title; ?>" name="title" class="input-xlarge">
    <label>المحتوى</label>
    <textarea name="content" rows="3" class="input-xlarge">
    <?= $news->content; ?>
    </textarea>

    <div>
        <input name="edit" type="submit" class="btn btn-primary" value="تعديل">
    </div>
  </form>
</div>
<?php
}
?>