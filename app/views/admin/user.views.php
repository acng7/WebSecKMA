<h1>QUẢN LÝ NGƯỜI DÙNG</h1>

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
      <th scope="col">TÊN TÀI KHOẢN</th>
      <th scope="col">HỌ TÊN</th>
      <th scope="col">VAI TRÒ</th>
      <th scope="col">TRẠNG THÁI</th>
      <th scope="col">HÀNH ĐỘNG</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $i=1;
    foreach ($getAllUser as $key) {
        echo '<tr>';
        echo '<th scope="row">'.e($i++).'</th>';
        echo '<td>'.e($key['userName']).'</td>';
        echo '<td>'.e($key['fullName']).'</td>';
        echo '<td>'.e($key['nameRole']).'</td>';
        
        if($key['isActive']==0){
            echo '<td><span class="badge bg-success">Đã kích hoạt</span></td>';
            echo '<td><a href="index.php?type=user&unactive='.e($key['id_user']).'" class="btn btn-sm btn-warning" onclick="return confirm(\'Vô hiệu hóa tài khoản này?\')">Bỏ kích hoạt</a></td>';
        }elseif($key['isActive']==1){
            echo '<td><span class="badge bg-secondary">Chưa kích hoạt</span></td>';
            echo '<td><a href="index.php?type=user&active='.e($key['id_user']).'" class="btn btn-sm btn-success" onclick="return confirm(\'Kích hoạt tài khoản này?\')">Kích hoạt</a></td>';
        }
        
        echo '</tr>';
    }
    ?>
  </tbody>
</table>
