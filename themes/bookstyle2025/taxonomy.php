<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); 
    /* ループ開始 */?>
    <div class="post">
		<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
		<?php the_post_thumbnail(); ?>
		<?php the_excerpt(); ?>
        <a class="more-link" href="<?php the_permalink() ?>">詳しく見る</a>
    </div>
	<?php endwhile; ?>
<?php else : ?>
    <div class="post">
		<h3>製品がありません</h3>
		<p>表示する製品がありませんでした</p>
    </div>
<?php endif; ?>
