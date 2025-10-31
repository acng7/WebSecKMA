<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết tin tức</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <!-- Bắt đầu phần tin tức -->
    <div class="row mt-5">
        <!-- Nội dung tin tức chính -->
        <div class="col-lg-8">
            <!-- Tiêu đề tin tức -->
            <h1 class="display-4 mt-5"><?php echo $getPostById1['postName'];?></h1>
            <!-- Thông tin tác giả và ngày tháng -->
            <p class="text-muted">Đăng bởi <strong><?php echo $getPostById1['fullName'];?></strong> vào ngày <em><?php echo $getPostById1['postDate'];?></em></p>
            <!-- Ảnh đại diện của tin tức -->
            <img src="<?php echo $getPostById1['postImage'];?>" alt="Ảnh tin tức" class="img-fluid rounded mb-4">
            <!-- Nội dung chi tiết của tin tức -->
            <p class="lead"><?php echo $getPostById1['postContent'];?>
            <!-- Phần chia sẻ bài viết -->
            <div class="my-4">
                <h5>Chia sẻ bài viết:</h5>
                <a href="#" class="btn btn-primary">Facebook</a>
                <a href="#" class="btn btn-info">Twitter</a>
                <a href="#" class="btn btn-danger">LinkedIn</a>
            </div>
            
            
        </div>
        
       
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
