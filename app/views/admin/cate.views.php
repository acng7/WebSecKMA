<h1>QUẢN LÝ DANH MỤC</h1>
<a href="index.php?type=cate&type1=addcate">THÊM DANH MỤC</a>
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
            echo'
            <tr>
      <th scope="row">'.$i++.'</th>
      <td>'.$key['nameCategory'].'</td>
    <td><a href="index.php?type=cate&type1=fixcate&id='.$key['id_post_category'].'">Sửa</a></td>';
    if($key['delCategory']==0){
        echo'
        <td><a href="index.php?type=cate&hide='.$key['id_post_category'].'">Ẩn</a></td>';
    }else if($key['delCategory']==1){
        echo'
        <td><a href="index.php?type=cate&unhide='.$key['id_post_category'].'">Bỏ ẩn</a></td>';
    }
    
    echo'
    </tr>
            ';
        }
    ?>
    
  </tbody>
</table>