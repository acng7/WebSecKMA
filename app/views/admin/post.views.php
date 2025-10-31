<h1>QUẢN LÝ BÀI VIẾT</h1>
<table class="table">
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
            echo'
            <tr>
      <th scope="row">'.$i++.'</th>
      <td><img src="'.$key['postImage'].'" width="50" /></td>
      <td>'.$key['postName'].'</td>
      <td>'.$key['postDescription'].'</td>
      <td>'.$key['postDate'].'</td>
      <td>'.$key['nameCategory'].'</td>
      <td>'.$key['fullName'].'</td>';
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
      echo'
      <td><a href="index.php?type=post&type1=seepost&id='.$key['id_post'].'">Xem</a></td>
      ';
      switch ($key['isAccepted']) {
        case 0:
          echo'
          <td><a href="index.php?type=post&hide='.$key['id_post'].'">Ẩn</a></td>';
            break;
            case 1:
              echo'
              <td><a href="index.php?type=post&confirm='.$key['id_post'].'">Duyệt đăng</a></td>';
            
                break;
                case 2:
                  echo'
                  <td><a href="index.php?type=post&confirm='.$key['id_post'].'">Duyệt sửa</a></td>';
            
                    break;
                    case 3:
                      echo'
                      <td><a href="index.php?type=post&del='.$key['id_post'].'">Duyệt xóa</a></td>';
                        break;
                        case 4:
                          echo'
                          <td><a href="index.php?type=post&unhide='.$key['id_post'].'">Bỏ ẩn</a></td>';
                            break;
        default:
            break;
      }
      // if($key['isAccepted']==0){
      //   echo'
      //   <td><a href="index.php?type=postself&del='.$key['id_post'].'">Xóa</a></td>';
      // }else if($key['isAccepted']==3){
      //   echo'
      //   <td><a href="index.php?type=postself&restore='.$key['id_post'].'">Khôi phục</a></td>';
      // }else{
      //   echo'
      //   <td><a>Chưa hoàn tất phê duyệt</a></td>';
      // }
      echo'
    </tr>
            ';
        }
    ?>
    
  </tbody>
</table>