<?php
/*
Template Name: gallery_template
*/
?>
<?php $removed = remove_filter('the_content', 'wpautop'); ?>
<?php get_header(); ?>
<!-- ============================================== -->
<!--            maincontents                        -->
<!-- ============================================== -->
<div class="l_wrap--second">
<?php get_sidebar(); ?>
<div class="l_main--second">
<!-- ===============▼メインエリアここから▼=================== -->
<section>
	<h2 class="h2">Galleryページについて</h2>
	<p>BookStyleのデザインを実際に使用している写真を、使用者の方からご提供頂き、展示しています。<br>
	ぜひ、Book Styleのデザインを使用している写真をお送りください！<a href="<?php echo esc_url(get_site_url()); ?>/photo-form">募集はこちらから！</a></p>
	</section>
	<section>
	<ul class="gallery">
		<?php
		$wp_query = new WP_Query();
		$param = array(
			'posts_per_page' => '-1', //表示件数。-1なら全件表示
			'post_type' => 'gallery_add', //カスタム投稿タイプの名称を入れる
			'post_status' => 'publish', //取得するステータス。publishなら一般公開のもののみ
			'orderby' => 'ID', //ID順に並び替え
			'order' => 'DESC'
		);
		$wp_query->query($param);
		if($wp_query->have_posts()): while($wp_query->have_posts()) : $wp_query->the_post();
		?>
		<li>
			<p class="gallery__date ta-r"><?php the_time('Y/m/d'); ?></p>
			<?php if(has_post_thumbnail()): //アイキャッチ画像がある場合 ?>
			<div class="gallery__photo"><a href="<?php echo esc_url(wp_get_attachment_url(get_post_thumbnail_id())); ?>" rel="lightbox[gallery]"><?php the_post_thumbnail('gallery-thumbnail'); ?></a></div>
			<?php endif; ?>
			<ul class="gallery__tagbox">
				<?php echo get_the_term_list_nolink( $post->ID, 'gallery_add-tag', '<li>', '</li><li>', '</li>' ); ?>
			</ul>
			<p class="gallery__client">
				<?php $ctm = get_post_meta($post->ID, 'リンクを追加', true);?>
				<?php if(empty($ctm)):?>
					<?php the_title(); ?>
				<?php else:?>
					<a href="<?php echo esc_url(get_post_meta($post->ID, 'リンクを追加', true)); ?>" target="_blank"><?php the_title(); ?></a>
				<?php endif;?>
			</p>
			<p class="gallery__content"><?php the_content(); ?></p>
		</li>
		<?php endwhile; endif; ?>
	</ul><!-- .gallery -->
</section>
<!-- ===============▲メインエリアここまで▲=================== -->

</div><!-- .l_main -->
</div><!-- .l_wrap -->
<?php get_footer(); ?>