<h1>QUẢN LÝ BÀI VIẾT</h1>
<a href="index.php?type=postself&type1=addpost">THÊM BÀI VIẾT</a>
<table class="table">
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
            echo'
            <tr>
      <th scope="row">'.$i++.'</th>
      <td><img src="'.$key['postImage'].'" width="50" /></td>
      <td>'.$key['postName'].'</td>
      <td>'.$key['postDescription'].'</td>
      <td>'.$key['postDate'].'</td>
      <td>'.$key['nameCategory'].'</td>';
      switch ($key['isAccepted']) {
        case 0:
            echo '<td>Được duyệt</td>';
            break;
            case 1:
                echo '<td>Đang chờ duyệt đăng</td>';
            
                break;
                case 2:
                    echo '<td>Đang chờ duyệt sửa</td>';
            
                    break;
                    case 3:
                        echo '<td>Đang chờ duyệt xóa</td>';
                        break;
                        case 4:
                          echo '<td>Bị ẩn</td>';
                          break;
        
        default:
            # code...
            break;
      }
      if($key['isAccepted']==0 || $key['isAccepted']==2 ){
        echo'
      <td><a href="index.php?type=postself&type1=fixpost&id='.$key['id_post'].'">Sửa</a></td>';
      }else{
        echo'
        <td><a>Chưa hoàn tất phê duyệt</a></td>';
      }
      if($key['isAccepted']==0){
        echo'
        <td><a href="index.php?type=postself&del='.$key['id_post'].'">Xóa</a></td>';
      }else if($key['isAccepted']==3){
        echo'
        <td><a href="index.php?type=postself&restore='.$key['id_post'].'">Khôi phục</a></td>';
      }else{
        echo'
        <td><a>Chưa hoàn tất phê duyệt</a></td>';
      }
      echo'
    </tr>
            ';
        }
    ?>
    
  </tbody>
</table>