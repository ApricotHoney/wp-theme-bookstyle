<?php get_header(); ?>

<main id="main" class="l_main">
    <div class="l_wrap">
        <header class="page-header">
            <h1 class="page-title">WORKS</h1>
            <p class="page-description">
                Book Styleのデザインがどのようなところで使われているかをご紹介！<br>
                配布・その他利用につきましては「MAIL」よりお問い合わせください。
            </p>
        </header>

        <?php
        // Custom Loop: Group by 'works_add-tag'
        $terms = get_terms( array(
            'taxonomy' => 'works_add-tag',
            'hide_empty' => true,
        ) );

        if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) :
            foreach ( $terms as $term ) : ?>
            
            <section class="works-section">
                <h3 class="works-category-title"><?php echo esc_html( $term->name ); ?></h3>
                
                <ul class="works-list">
                    <?php
                    $works_query = new WP_Query( array(
                        'post_type' => 'works_add',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'works_add-tag',
                                'field' => 'slug',
                                'terms' => $term->slug,
                            ),
                        ),
                        'posts_per_page' => -1,
                    ) );

                    if ( $works_query->have_posts() ) : while ( $works_query->have_posts() ) : $works_query->the_post(); ?>
                    <li class="works-item">
                        <?php
                        $days = 7;
                        $today = current_time('timestamp');
                        $post_time = get_the_time('U');
                        $diff = ($today - $post_time) / 86400;
                        if ($days > $diff) {
                            echo '<div class="new-badge">New!</div>';
                        }
                        ?>
                        <div class="works-title">
                            <span class="date"><?php the_time('Y/m/d'); ?></span> | <?php the_title(); ?>
                        </div>
                        <div class="works-content">
                            <?php the_content(); ?>
                        </div>
                    </li>
                    <?php endwhile; endif; wp_reset_postdata(); ?>
                </ul>
            </section>

            <?php endforeach;
        endif;
        ?>

    </div>
</main>

<?php get_footer(); ?>
