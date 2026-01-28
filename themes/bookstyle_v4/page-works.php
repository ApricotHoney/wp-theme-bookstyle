<?php
/**
 * Template Name: Works Page
 */
get_header(); ?>

<main id="main" class="l_main">
    <div class="l_wrap">

        <div class="content-container">
            <header class="unified-header">
                <h1 class="unified-title-en">Works</h1>
                <p class="unified-title-jp">Worksページについて</p>
            </header>

            <section class="unified-section">
                <p>Book Styleのデザインがどのようなところで使われているかをご紹介！<br>
                配布・その他利用につきましては「MAIL」よりお問い合わせください。</p>

                <?php
                // Custom Loop: Group by 'works_add-tag'
                $terms = get_categories( array(
                    'taxonomy' => 'works_add-tag'
                ) );

                if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) :
                    foreach ( $terms as $term ) : ?>
                    
                    <section class="unified-section">
                        <h3 class="icon-heading"><?php echo esc_html( $term->name ); ?></h3>
                        
                        <ul class="workList">
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
                            <li>
                                <?php
                                $days = 7;
                                $today = current_time('timestamp');
                                $post_time = get_the_time('U');
                                $diff = ($today - $post_time) / 86400;
                                if ($days > $diff) {
                                    echo '<div class="newIcon--second">New!</div>';
                                }
                                ?>
                                <div class="workList__tit">
                                    <?php the_time('Y/m/d'); ?> | <?php the_title(); ?>
                                </div>
                                <div class="workList__cont">
                                    <?php the_content(); ?>
                                </div>
                            </li>
                            <?php endwhile; 
                            else:
                                echo '<p>このカテゴリに投稿はありません</p>';
                            endif; 
                            wp_reset_postdata(); ?>
                        </ul>
                    </section>
        
                    <?php endforeach;
                endif;
                ?>
            </section>
        </div>

    </div>
</main>

<?php get_footer(); ?>
