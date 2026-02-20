<?php get_header(); ?>

<main id="main" class="l_main">
    <div class="l_wrap">

        <?php if (have_posts()):
            while (have_posts()):
                the_post(); ?>
                <header class="unified-header">
                    <h1 class="unified-title-en"><?php the_title(); ?></h1>
                    <?php
                    $jp_title = get_post_meta(get_the_ID(), 'jp_title', true);
                    if ($jp_title): ?>
                        <p class="unified-title-jp"><?php echo esc_html($jp_title); ?></p>
                    <?php endif; ?>
                </header>

                <div class="content-container">
                    <section class="unified-section">
                        <?php the_content(); ?>
                    </section>
                </div>
            <?php endwhile; endif; ?>

    </div>
</main>

<?php get_footer(); ?>