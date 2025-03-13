<?php
/*
Template Name: lastup_template
*/
?>
<?php remove_filter('the_content', 'wpautop'); ?>
<?php get_header(); ?>
<!-- ============================================== -->
<!--            maincontents                        -->
<!-- ============================================== -->
<div class="l_wrap--second">
<?php get_sidebar(); ?>
<div class="l_main--second">
<!-- ===============▼メインエリアここから▼=================== -->
<section>
	<h2 class="h2">更新履歴</h2>
<?php
// タクソノミ取得
$catargs = array(
	'taxonomy' => 'lastup-tag'
);
$catlists = get_categories( $catargs );
foreach($catlists as $cat) : // 取得したカテゴリの配列でループを回す
?>
<h3 class="h3"><?php echo $cat->name; ?>年</h3>
<div class="lustUp--second">
<dl>
<?php
$args = array(
	'posts_per_page' => '-1', //表示件数。-1なら全件表示
	'post_type' => 'lastup',
	'lastup-tag' => $cat->slug
);
$my_posts = get_posts( $args );
if ( $my_posts ) { // 該当する投稿があったら
	foreach ( $my_posts as $post ) :
		setup_postdata( $post );
		?>
		<dt><?php the_time('Y/m/d'); ?></dt>
		<dd><?php the_content(); ?></dd>
		<?php
	endforeach;
} else {
	echo 'このカテゴリに投稿はありません';
}
wp_reset_postdata();
?>
</dl>
</div><!-- .lustUp -->
<?php endforeach; ?>
</section>
<!-- ===============▲メインエリアここまで▲=================== -->

</div><!-- .l_main -->
</div><!-- .l_wrap -->
<?php get_footer(); ?>