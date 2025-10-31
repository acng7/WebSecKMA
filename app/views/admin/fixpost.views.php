<link rel="stylesheet" href="public/css/login.css">
<div id="container4">
  <div id="title-container4">
    <h1>SỬA BÀI VIẾT</h1>
  </div>
<form action="" method="post">
  <div class="form-outline mb-4">
    <img width="20%" src="<?php echo $getPostByIdAndIdAuthor['postImage'];?>" alt="" srcset="">
    <input type="text" id="" name="postImage" value="<?php echo $getPostByIdAndIdAuthor['postImage'];?>" class="form-control" required />
    <label for="">Link Ảnh</label>
  </div>
  <div class="form-outline mb-4">
    <input type="text" id="" name="postName" value="<?php echo $getPostByIdAndIdAuthor['postName'];?>" class="form-control" required />
    <label for="">Tên bài viết</label>
  </div>
  <div class="form-outline mb-4">
    <input type="text" id="" name="postDescription" value="<?php echo $getPostByIdAndIdAuthor['postDescription'];?>" class="form-control" required />
    <label for="">Mô tả bài viết</label>
  </div>
  <div class="form-outline mb-4">
    <textarea name="postContent" class="form-control" id="" required><?php echo $getPostByIdAndIdAuthor['postContent'];?></textarea>
    <label for="">Nội dung bài viết</label>
  </div>
  <button type="submit" name="btn-save-post" class="btn btn-primary btn-block mb-4">LƯU</button>
</form>
</div>
