<h1>QUẢN LÝ BÀI VIẾT</h1>

<?php if($error = getFlashMessage('error')): ?>
  <div class="alert alert-danger"><?= e($error) ?></div>
<?php endif; ?>

<?php if($success = getFlashMessage('success')): ?>
  <div class="alert alert-success"><?= e($success) ?></div>
<?php endif; ?>

<a href="index.php?type=postself&type1=addpost" class="btn btn-primary mb-3">THÊM BÀI VIẾT</a>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">ẢNH</th>
      <th scope="col">TÊN BÀI VIẾT</th>
      <th scope="col">MÔ TẢ BÀI VIẾT</th>
      <th scope="col">NGÀY ĐĂNG</th>
      <th scope="col">THỂ LOẠI</th>
      <th scope="col">TRẠNG THÁI</th>
      <th scope="col">SỬA</th>
      <th scope="col">XÓA</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $i=1;
    foreach ($getAllPostByIdAuthor as $key) {
        echo '<tr>';
        echo '<th scope="row">'.e($i++).'</th>';
        echo '<td><img src="'.e($key['postImage']).'" width="50" alt="Post" /></td>';
        echo '<td>'.e($key['postName']).'</td>';
        echo '<td>'.e($key['postDescription']).'</td>';
        echo '<td>'.e($key['postDate']).'</td>';
        echo '<td>'.e($key['nameCategory']).'</td>';
        
        switch ($key['isAccepted']) {
            case 0: echo '<td><span class="badge bg-success">Được duyệt</span></td>'; break;
            case 1: echo '<td><span class="badge bg-warning">Chờ duyệt đăng</span></td>'; break;
            case 2: echo '<td><span class="badge bg-info">Chờ duyệt sửa</span></td>'; break;
            case 3: echo '<td><span class="badge bg-danger">Chờ duyệt xóa</span></td>'; break;
            case 4: echo '<td><span class="badge bg-secondary">Bị ẩn</span></td>'; break;
            default: echo '<td><span class="badge bg-secondary">Không xác định</span></td>'; break;
        }
        
        if($key['isAccepted']==0 || $key['isAccepted']==2){
            echo '<td><a href="index.php?type=postself&type1=fixpost&id='.e($key['id_post']).'" class="btn btn-sm btn-warning">Sửa</a></td>';
        }else{
            echo '<td><span class="text-muted">Chưa hoàn tất</span></td>';
        }
        
        if($key['isAccepted']==0){
            echo '<td><a href="index.php?type=postself&del='.e($key['id_post']).'" class="btn btn-sm btn-danger" onclick="return confirm(\'Xóa bài viết này?\')">Xóa</a></td>';
        }elseif($key['isAccepted']==3){
            echo '<td><a href="index.php?type=postself&restore='.e($key['id_post']).'" class="btn btn-sm btn-success" onclick="return confirm(\'Khôi phục bài viết này?\')">Khôi phục</a></td>';
        }else{
            echo '<td><span class="text-muted">Chưa hoàn tất</span></td>';
        }
        
        echo '</tr>';
    }
    ?>
  </tbody>
</table>
