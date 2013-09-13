<?php
if(!isset($allnews)){

echo '<center><h1> لا يوجد اى اخبار</h1></center>';

}else{
?>


  
    <div class="well">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#news" data-toggle="tab">ادارة الاخبار</a></li>
        <li><a href="#create" data-toggle="tab">ادخال خبر جديد</a></li>
      </ul>
      <div id="myTabContent" class="tab-content">
        <div class="tab-pane  fade active in" id="news">
          <table class="table table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>العنوان</th>
                  <th>التاريخ</th>
                  <th>تعديل</th>
                  <th>حذف</th>
                </tr>
              </thead>
              <?php foreach ($allnews as $news) {
                ?>  
             
              <tbody>
                <tr>
                  <td><?= $news->id; ?></td>
                  <td><?= $news->title; ?></td>
                  <td><?= $news->date; ?></td>
                  <td><a href="<?= base_url(); ?>admin/editNews/<?= $news->id; ?>"><i class="icon-edit"></i></a></td>
                  <td><a href="<?= base_url(); ?>admin/deleteNews/<?= $news->id; ?>"><i class="icon-trash"></i></a></td>
                </tr>
              </tbody>
              <?php
                }//foreach
                
              }//if
                ?>
            </table>               
        </div>
        <div class="tab-pane fade" id="create">
          <form id="tab" action="<?= base_url(); ?>admin/addNews" method="post" enctype="multipart/form-data">
            <label>العنوان</label>
            <input type="text" value="" name="title" class="input-xlarge">
            <label>التاريخ</label>
            <input type="date" value="" name="date" class="input-xlarge">
            <label>صورة</label>
            <div class="fileupload fileupload-new" data-provides="fileupload">
              <div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;"></div>
              <div>
                  <span class="btn btn-file"><span class="fileupload-new">اختر صورة</span><span class="fileupload-exists">تغيير الصورة</span><input type="file" name="image" /></span>
                <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">حذف الصورة</a>
              </div>
            </div>
            <label>المحتوى</label>
            <textarea name="content" value="Smith" rows="3" class="input-xlarge">
            </textarea>

            <div>
                <input name="add" type="submit" class="btn btn-primary" value="اضافة خبر جديد">
            </div>
          </form>
        </div>
    </div>
  </div>
