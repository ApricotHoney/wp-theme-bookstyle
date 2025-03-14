<?php
/*
Template Name: works_template
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
<h2 class="h2">Worksページについて</h2>
<p>Book Styleのデザインがどのようなところで使われているかをご紹介！<br>
配布・その他利用につきましては「MAIL」よりお問い合わせください。</p>

<?php
// タクソノミ取得
$catargs = array(
	'taxonomy' => 'works_add-tag'
);
$catlists = get_categories( $catargs );
foreach($catlists as $cat) : // 取得したカテゴリの配列でループを回す
?>
<section>
<h3 class="h3"><?php echo $cat->name; ?></h3>
<ul class="workList">
<?php
$args = array(
	'posts_per_page' => '-1', //表示件数。-1なら全件表示
	'post_type' => 'works_add',
	'works_add-tag' => $cat->slug
);
$my_posts = get_posts( $args );
if ( $my_posts ) { // 該当する投稿があったら
	foreach ( $my_posts as $post ) :
		setup_postdata( $post );
		?>
		<li>
			<?php
			$days = 7;
			$today = date('U');
			$date = get_the_time('U');
			$period = date('U', ($today - $date)) / 86400;
			if ($days > $period) {
			echo '<div class="newIcon--second">New!</div>';
			}
			?>
			<div class="workList__tit"><?php the_time('Y/m/d'); ?> | <?php the_title(); ?></div>
			<div class="workList__cont"><?php the_content(); ?></div>
		</li>
		<?php
	endforeach;
} else {
	echo 'このカテゴリに投稿はありません';
}
wp_reset_postdata();
?>
</ul>
</section>
<?php endforeach; ?>

</section>
<!-- ===============▲メインエリアここまで▲=================== -->

</div><!-- .l_main -->
</div><!-- .l_wrap -->
<?php get_footer(); ?>