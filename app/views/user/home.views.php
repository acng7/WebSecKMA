<link rel="stylesheet" href="public/css/index.css">
<section class="light">
  <div class="container py-2">
    <div class="h1 text-center text-dark" id="pageHeaderTitle">TẤT CẢ TIN TỨC</div>
    
    <?php if(empty($getAllPost)): ?>
      <div class="alert alert-info text-center">
        <p>Chưa có bài viết nào được đăng.</p>
      </div>
    <?php endif; ?>
    
    <?php foreach ($getAllPost as $post): ?>
      <article class="postcard light blue">
        <a class="postcard__img_link" href="index.php?type=detail&id=<?= e($post['id_post']) ?>">
          <img class="postcard__img" src="<?= e($post['postImage']) ?>" alt="<?= e($post['postName']) ?>" />
        </a>
        <div class="postcard__text t-dark">
          <h1 class="postcard__title blue">
            <a href="index.php?type=detail&id=<?= e($post['id_post']) ?>"><?= e($post['postName']) ?></a>
          </h1>
          <div class="postcard__subtitle small">
            <time datetime="<?= e($post['postDate']) ?>">
              <i class="fas fa-calendar-alt mr-2"></i><?= e($post['postDate']) ?>
            </time>
          </div>
          <div class="postcard__bar"></div>
          <div class="postcard__preview-txt"><?= e($post['postDescription']) ?></div>
          <ul class="postcard__tagbox">
            <li class="tag__item"><i class="fas fa-tag mr-2"></i>Tác giả: <?= e($post['fullName']) ?></li>
          </ul>
        </div>
      </article>
    <?php endforeach; ?>
  </div>
</section>
