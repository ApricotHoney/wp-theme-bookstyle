<?php get_header(); ?>
<!-- ============================================== -->
<!--            maincontents                        -->
<!-- ============================================== -->
<div class="l_wrap--second">
<?php get_sidebar(); ?>
<div class="l_main--second">
<!-- ===============▼メインエリアここから▼=================== -->
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<section>
	<?php the_content(); ?>
	</section>
	<?php endwhile; ?>

	<?php else : ?>
		<h2 class="title">記事が見つかりませんでした。</h2>
		<p>検索で見つかるかもしれません。</p><br />
		<?php get_search_form(); ?>

	<?php endif; ?>
<!-- ===============▲メインエリアここまで▲=================== -->

</div><!-- .l_main -->
</div><!-- .l_wrap -->
<?php get_footer(); ?>