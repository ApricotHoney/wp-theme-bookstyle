<?php get_header(); ?>

<main id="main" class="l_main">
    <div class="l_wrap">
        <?php if (have_posts()):
            while (have_posts()):
                the_post(); ?>
                <header class="unified-header">
                    <h1 class="unified-title-en">BLOG</h1>
                    <p class="unified-title-jp">ブログ記事</p>
                </header>

                <div class="content-container">
                    <article id="post-<?php the_ID(); ?>" <?php post_class('unified-section'); ?>>
                        <h2 class="unified-h2"><?php the_title(); ?></h2>

                        <div class="post-meta-top" style="text-align: center; margin-bottom: 40px;">
                            <span class="date">
                                <?php the_time('Y/m/d'); ?>
                            </span>
                            <?php
                            $blog_cats = get_the_terms(get_the_ID(), 'blog_category');
                            if ($blog_cats && !is_wp_error($blog_cats)): ?>
                                <span class="category" style="margin-left: 20px; color: #6AACB8;">
                                    <?php echo esc_html($blog_cats[0]->name); ?>
                                </span>
                            <?php endif; ?>
                        </div>

                        <div class="entry-content blog-body">
                            <?php the_content(); ?>
                        </div>

                        <footer class="entry-footer" style="margin-top: 50px; border-top: 1px dashed #ccc; padding-top: 20px;">
                            <?php
                            $blog_tags = get_the_terms(get_the_ID(), 'blog_tag');
                            if ($blog_tags && !is_wp_error($blog_tags)): ?>
                                <div class="tags-links" style="color: #888;">
                                    #<?php echo join(' #', wp_list_pluck($blog_tags, 'name')); ?></div>
                            <?php endif; ?>
                        </footer>

                        <div class="post-navigation" style="margin-top: 40px;">
                            <?php
                            the_post_navigation(array(
                                'prev_text' => '<span class="nav-label" style="font-weight: bold; color: #6AACB8;">PREV:</span> %title',
                                'next_text' => '<span class="nav-label" style="font-weight: bold; color: #6AACB8;">NEXT:</span> %title',
                            ));
                            ?>
                        </div>
                    </article>
                </div>
            <?php endwhile; endif; ?>
    </div>
</main>

<?php get_footer(); ?>