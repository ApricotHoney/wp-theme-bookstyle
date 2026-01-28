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
<!-- ===============▲メインエリアここまで▲=================== -->

</div><!-- .l_main -->
</div><!-- .l_wrap -->
<?php get_footer(); ?>