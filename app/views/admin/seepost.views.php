<link rel="stylesheet" href="public/css/login.css">
<div id="container4">
  <div id="title-container4">
    <h1>XEM BÀI VIẾT</h1>
  </div>
<form action="" method="post">
  <div class="form-outline mb-4">
    <img width="20%" src="<?php echo $getPostById['postImage'];?>" alt="" srcset="">
    <input type="text" id="" name="postImage" value="<?php echo $getPostById['postImage'];?>" class="form-control" readonly />
    <label for="">Link Ảnh</label>
  </div>
  <div class="form-outline mb-4">
    <input type="text" id="" name="postName" value="<?php echo $getPostById['postName'];?>" class="form-control" readonly />
    <label for="">Tên bài viết</label>
  </div>
  <div class="form-outline mb-4">
    <input type="text" id="" name="postDescription" value="<?php echo $getPostById['postDescription'];?>" class="form-control" readonly />
    <label for="">Mô tả bài viết</label>
  </div>
  <div class="form-outline mb-4">
    <textarea name="postContent" class="form-control" id="" readonly><?php echo $getPostById['postContent'];?></textarea>
    <label for="">Nội dung bài viết</label>
  </div>
  </form>
<form action="" method="post">
<h3>Bạn chỉ có thể cập nhật ghi chú và thể loại!</h3>
<div class="form-outline mb-4">
  <input type="text" id="" name="note" value="<?php echo $getPostById['note'];?>" class="form-control"  />
    <label for="">Ghi chú</label>
  </div>
  <div class="form-outline mb-4">
  <select name="category_id" class="form-control" id="" required>
      <?php
      foreach ($getAllCategory as $key => $value) {
        if($value['id_post_category']==$getPostById['category_id']){
          echo'<option value="'.$value['id_post_category'].'" selected>'.$value['nameCategory'].'</option>';
        }else{
          echo'<option value="'.$value['id_post_category'].'">'.$value['nameCategory'].'</option>';
        }
      }
      ?>
    </select>
    <label for="">Nội dung bài viết</label>
  </div>
  <button type="submit" name="btn-save-post" class="btn btn-primary btn-block mb-4">LƯU</button>
</form>
</div>
