<h1>QUẢN LÝ BÀI VIẾT</h1>

<?php if($error = getFlashMessage('error')): ?>
  <div class="alert alert-danger"><?= e($error) ?></div>
<?php endif; ?>

<?php if($success = getFlashMessage('success')): ?>
  <div class="alert alert-success"><?= e($success) ?></div>
<?php endif; ?>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">ẢNH</th>
      <th scope="col">TÊN BÀI VIẾT</th>
      <th scope="col">MÔ TẢ BÀI VIẾT</th>
      <th scope="col">NGÀY ĐĂNG</th>
      <th scope="col">THỂ LOẠI</th>
      <th scope="col">TÁC GIẢ</th>
      <th scope="col">TRẠNG THÁI</th>
      <th scope="col">XEM</th>
      <th scope="col">HÀNH ĐỘNG</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $i=1;
    foreach ($getAllPost1 as $key) {
        echo '<tr>';
        echo '<th scope="row">'.e($i++).'</th>';
        echo '<td><img src="'.e($key['postImage']).'" width="50" alt="Post" /></td>';
        echo '<td>'.e($key['postName']).'</td>';
        echo '<td>'.e($key['postDescription']).'</td>';
        echo '<td>'.e($key['postDate']).'</td>';
        echo '<td>'.e($key['nameCategory']).'</td>';
        echo '<td>'.e($key['fullName']).'</td>';
        
        switch ($key['isAccepted']) {
            case 0: echo '<td><span class="badge bg-success">Được duyệt</span></td>'; break;
            case 1: echo '<td><span class="badge bg-warning">Chờ duyệt đăng</span></td>'; break;
            case 2: echo '<td><span class="badge bg-info">Chờ duyệt sửa</span></td>'; break;
            case 3: echo '<td><span class="badge bg-danger">Chờ duyệt xóa</span></td>'; break;
            case 4: echo '<td><span class="badge bg-secondary">Bị ẩn</span></td>'; break;
            default: echo '<td><span class="badge bg-secondary">Không xác định</span></td>'; break;
        }
        
        echo '<td><a href="index.php?type=post&type1=seepost&id='.e($key['id_post']).'" class="btn btn-sm btn-info">Xem</a></td>';
        
        switch ($key['isAccepted']) {
            case 0:
                echo '<td><a href="index.php?type=post&hide='.e($key['id_post']).'" class="btn btn-sm btn-secondary" onclick="return confirm(\'Ẩn bài viết này?\')">Ẩn</a></td>';
                break;
            case 1:
                echo '<td><a href="index.php?type=post&confirm='.e($key['id_post']).'" class="btn btn-sm btn-success" onclick="return confirm(\'Duyệt bài viết này?\')">Duyệt đăng</a></td>';
                break;
            case 2:
                echo '<td><a href="index.php?type=post&confirm='.e($key['id_post']).'" class="btn btn-sm btn-success" onclick="return confirm(\'Duyệt sửa bài viết này?\')">Duyệt sửa</a></td>';
                break;
            case 3:
                echo '<td><a href="index.php?type=post&del='.e($key['id_post']).'" class="btn btn-sm btn-danger" onclick="return confirm(\'Xóa vĩnh viễn bài viết này?\')">Duyệt xóa</a></td>';
                break;
            case 4:
                echo '<td><a href="index.php?type=post&unhide='.e($key['id_post']).'" class="btn btn-sm btn-success" onclick="return confirm(\'Bỏ ẩn bài viết này?\')">Bỏ ẩn</a></td>';
                break;
            default:
                echo '<td>-</td>';
                break;
        }
        
        echo '</tr>';
    }
    ?>
  </tbody>
</table>
