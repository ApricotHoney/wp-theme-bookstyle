<?php get_header(); ?>

<main id="main" class="l_main">
    <div class="l_wrap">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                    <div class="entry-meta">
                        <span class="date"><?php the_time('Y/m/d'); ?></span>
                        <span class="category"><?php the_category(', '); ?></span>
                    </div>
                </header>

                <div class="entry-content">
                    <?php the_content(); ?>
                </div>

                <footer class="entry-footer">
                    <?php the_tags('<div class="tags-links">Tags: ', ', ', '</div>'); ?>
                </footer>
                
                <div class="post-navigation">
                    <div class="nav-previous"><?php previous_post_link('%link', '<< %title'); ?></div>
                    <div class="nav-next"><?php next_post_link('%link', '%title >>'); ?></div>
                </div>

            </article>
        <?php endwhile; endif; ?>
    </div>
</main>

<?php get_footer(); ?>
