<link rel="stylesheet" href="public/css/index.css">
<section class="light">
	<div class="container py-2">
		<div class="h1 text-center text-dark" id="pageHeaderTitle">TẤT CẢ TIN TỨC</div>
    <?php
        foreach ($getAllPost as $key => $value) {
?>
<article class="postcard light blue">
			<a class="postcard__img_link" href="index.php?type=detail&id=<?php echo $value['id_post'];?>">
				<img class="postcard__img" src="<?php echo $value['postImage'];?>" alt="Image Title" />
			</a>
			<div class="postcard__text t-dark">
				<h1 class="postcard__title blue"><a href="index.php?type=detail&id=<?php echo $value['id_post'];?>"><?php echo $value['postName'];?></a></h1>
				<div class="postcard__subtitle small">
					<time datetime="2020-05-25 12:00:00">
						<i class="fas fa-calendar-alt mr-2"></i><?php echo $value['postDate'];?>
					</time>
				</div>
				<div class="postcard__bar"></div>
				<div class="postcard__preview-txt"><?php echo $value['postDescription'];?></div>
				<ul class="postcard__tagbox">
					<li class="tag__item"><i class="fas fa-tag mr-2"></i>Tác giả: <?php echo $value['fullName'];?></li>
				</ul>
			</div>
		</article>
<?php
        }
    ?>
		
	</div>
</section>