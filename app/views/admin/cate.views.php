<h1>QUẢN LÝ DANH MỤC</h1>

<?php
// Display flash messages
if($error = getFlashMessage('error')): ?>
  <div class="alert alert-danger"><?= e($error) ?></div>
<?php endif; ?>

<?php if($success = getFlashMessage('success')): ?>
  <div class="alert alert-success"><?= e($success) ?></div>
<?php endif; ?>

<a href="index.php?type=cate&type1=addcate" class="btn btn-primary mb-3">THÊM DANH MỤC</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">TÊN DANH MỤC</th>
      <th scope="col">SỬA</th>
      <th scope="col">HÀNH ĐỘNG</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $i=1;
    foreach ($getAllCategory1 as $key) {
        echo '<tr>';
        echo '<th scope="row">'.e($i++).'</th>';
        echo '<td>'.e($key['nameCategory']).'</td>';
        echo '<td><a href="index.php?type=cate&type1=fixcate&id='.e($key['id_post_category']).'" class="btn btn-sm btn-warning">Sửa</a></td>';
        
        if($key['delCategory']==0){
            echo '<td><a href="index.php?type=cate&hide='.e($key['id_post_category']).'" class="btn btn-sm btn-secondary" onclick="return confirm(\'Bạn có chắc muốn ẩn danh mục này?\')">Ẩn</a></td>';
        }else if($key['delCategory']==1){
            echo '<td><a href="index.php?type=cate&unhide='.e($key['id_post_category']).'" class="btn btn-sm btn-success" onclick="return confirm(\'Bạn có chắc muốn bỏ ẩn danh mục này?\')">Bỏ ẩn</a></td>';
        }
        
        echo '</tr>';
    }
    ?>
  </tbody>
</table>
