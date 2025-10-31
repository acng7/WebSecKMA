<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($getPostById1['postName']) ?> - Chi tiết tin tức</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="row mt-5">
        <div class="col-lg-8">
            <h1 class="display-4 mt-5"><?= e($getPostById1['postName']) ?></h1>
            <p class="text-muted">
              Đăng bởi <strong><?= e($getPostById1['fullName']) ?></strong> 
              vào ngày <em><?= e($getPostById1['postDate']) ?></em>
            </p>
            <img src="<?= e($getPostById1['postImage']) ?>" alt="<?= e($getPostById1['postName']) ?>" class="img-fluid rounded mb-4">
            
            <div class="lead">
              <?= nl2br(e($getPostById1['postContent'])) ?>
            </div>
            
            <div class="my-4">
                <h5>Chia sẻ bài viết:</h5>
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']) ?>" 
                   target="_blank" class="btn btn-primary">Facebook</a>
                <a href="https://twitter.com/intent/tweet?url=<?= urlencode('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']) ?>&text=<?= urlencode($getPostById1['postName']) ?>" 
                   target="_blank" class="btn btn-info">Twitter</a>
                <a href="https://www.linkedin.com/shareArticle?url=<?= urlencode('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']) ?>" 
                   target="_blank" class="btn btn-danger">LinkedIn</a>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
