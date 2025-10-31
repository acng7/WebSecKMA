<h1>QUẢN LÝ NGƯỜI DÙNG</h1>
<table class="table">
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
            echo'
            <tr>
      <th scope="row">'.$i++.'</th>
      <td>'.$key['userName'].'</td>
      <td>'.$key['fullName'].'</td>
      <td>'.$key['nameRole'].'</td>
    ';
    if($key['isActive']==0){
        echo'
      <td>Đã kích hoạt</td>
        <td><a href="index.php?type=user&unactive='.$key['id_user'].'">Bỏ kích hoạt</a></td>';
    }else if($key['isActive']==1){
        echo'
      <td>Chưa kích hoạt</td>
        <td><a href="index.php?type=user&active='.$key['id_user'].'">Kích hoạt</a></td>';
    }
    
    echo'
    </tr>
            ';
        }
    ?>
    
  </tbody>
</table>