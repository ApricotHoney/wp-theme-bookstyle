<?php get_header(); ?>

<main id="main" class="l_main">
    <div class="l_wrap">
        <?php if (have_posts()):
            while (have_posts()):
                the_post(); ?>
                <header class="unified-header">
                    <h1 class="unified-title-en">BLOG</h1>
                    <p class="unified-title-jp"><?php the_title(); ?></p>
                </header>

                <div class="content-container">
                    <article id="post-<?php the_ID(); ?>" <?php post_class('unified-section'); ?>>
                        <div class="post-meta-top">
                            <span class="date"><?php the_time('Y/m/d'); ?></span>
                            <span class="category"><?php the_category(', '); ?></span>
                        </div>

                        <div class="entry-content blog-body">
                            <?php the_content(); ?>
                        </div>

                        <footer class="entry-footer">
                            <?php the_tags('<div class="tags-links">#', ' #', '</div>'); ?>
                        </footer>

                        <div class="post-navigation">
                            <?php
                            the_post_navigation(array(
                                'prev_text' => '<span class="nav-label">PREV:</span> %title',
                                'next_text' => '<span class="nav-label">NEXT:</span> %title',
                            ));
                            ?>
                        </div>
                    </article>
                </div>
            <?php endwhile; endif; ?>
    </div>
</main>

<?php get_footer(); ?>