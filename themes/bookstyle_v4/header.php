<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@700&display=swap" rel="stylesheet">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico">
    <?php wp_head(); ?>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-PK3ZT7XP');</script>
    <!-- End Google Tag Manager -->
</head>

<body <?php body_class(); ?>>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PK3ZT7XP"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    
    <div id="wrapper">

        <!-- SP Header -->
        <header class="sp-header">
            <h1 class="sp-header-title"><a href="<?php echo home_url('/'); ?>">Book Style</a></h1>

            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </header>

        <?php 
            $is_blog = is_post_type_archive('blog') || is_tax('blog_category') || is_singular('blog');
            $show_sp_search = !$is_blog && (is_front_page() || is_home() || is_category() || is_search() || is_archive() || get_query_var('color') || isset($_GET['color']) || isset($_GET['cat']) || isset($_GET['sort']));
            if ($show_sp_search): 
        ?>
            <!-- SP News Section -->
            <div class="sp-news-section sp-only">
                <span class="search-label">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/icon_news.png" alt="News" style="width:16px; vertical-align:middle;"> 更新情報
                </span>
                <?php
                $news_query = new WP_Query(array(
                    'post_type'      => 'blog',
                    'posts_per_page' => 1,
                    'post_status'    => 'publish',
                ));
                if ($news_query->have_posts()) :
                    while ($news_query->have_posts()) : $news_query->the_post();
                        $news_title = get_the_title();
                        ?>
                        <div class="news-item">
                            <div class="news-date"><?php echo get_the_time('Y/m/d'); ?></div>
                            <div class="news-title">
                                <a href="<?php the_permalink(); ?>"><?php echo esc_html($news_title); ?></a>
                            </div>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>

            <!-- SP Advanced Search -->
            <div class="sp-advanced-search">
                <form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
                    <div class="sp-search-flex">
                        <div class="search-item">
                            <select name="cat" class="search-select">
                                <option value="0">ジャンルをえらぶ</option>
                                <?php
                                $categories = get_categories(array('orderby' => 'name', 'order' => 'ASC'));
                                foreach ($categories as $category) {
                                    $label = !empty($category->description) ? $category->description : $category->name;
                                    $selected = (get_query_var('cat') == $category->term_id) ? 'selected' : '';
                                    echo '<option value="' . esc_attr($category->term_id) . '" ' . $selected . '>' . esc_html($label) . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="search-item">
                            <select name="sort" class="search-select">
                                <option value="">並び替え</option>
                                <option value="new" <?php selected(get_query_var('sort'), 'new'); ?>>新しいもの順</option>
                                <option value="old" <?php selected(get_query_var('sort'), 'old'); ?>>古いもの順</option>
                                <option value="rand" <?php selected(get_query_var('sort'), 'rand'); ?>>ランダム</option>
                            </select>
                        </div>
                    </div>
                    <div class="sp-color-search">
                        <span class="search-label sp-color-label">色でさがす</span>
                        <div class="color-dots sp-color-dots">
                            <?php
                            $colors = array('brown'=>'Brown', 'blue'=>'Blue', 'green'=>'Green', 'red'=>'Red', 'white'=>'White', 'colorful'=>'Colorful');
                            $current_color = get_query_var('color');
                            foreach ($colors as $slug => $label):
                                $checked = ($current_color === $slug) ? 'checked' : '';
                            ?>
                                <label class="color-dot-wrapper">
                                    <input type="radio" name="color" value="<?php echo esc_attr($slug); ?>" <?php echo $checked; ?>>
                                    <span class="color-dot color-<?php echo esc_attr($slug); ?>" title="<?php echo esc_attr($label); ?>"></span>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <button type="submit" class="search-submit" style="display:none;">Search</button>
                    <div style="margin-top: 5px; text-align: left;">
                        <a href="<?php echo home_url('/'); ?>" style="font-size: 13px; color: #666; text-decoration: underline;">検索条件をクリア</a>
                    </div>
                </form>
            </div>
        <?php endif; ?>

        <!-- SP Menu Overlay -->
        <div class="sp-menu-overlay">
            <nav class="sp-menu-nav">
                <?php wp_nav_menu(array(
                    'theme_location' => 'gMenu',
                    'container' => false,
                    'menu_class' => 'sp-menu-list',
                    'fallback_cb' => false
                )); ?>
                <?php if (!has_nav_menu('gMenu')): ?>
                    <ul class="sp-menu-list">
                        <li><a href="<?php echo home_url('/'); ?>">HOME</a></li>
                        <li><a href="<?php echo home_url('/about/'); ?>">ABOUT</a></li>
                        <li><a href="<?php echo home_url('/works/'); ?>">WORKS</a></li>
                        <li><a href="<?php echo home_url('/gallery/'); ?>">GALLERY</a></li>
                        <li><a href="<?php echo home_url('/blog/'); ?>">BLOG</a></li>
                        <li><a href="<?php echo home_url('/howto/'); ?>">HOWTO</a></li>
                        <li><a href="<?php echo home_url('/mail/'); ?>">MAIL</a></li>
                    </ul>
                <?php endif; ?>
            </nav>

            <div class="sp-menu-social">
                <a href="https://twitter.com/book_style_neri" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/icon_x.png" alt="X"></a>
                <a href="https://instagram.com/neri_bookstyle/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/icon_instagram.png" alt="Instagram"></a>
                <a href="https://bookstyle.booth.pm/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/icon_shopping.png" alt="BOOTH"></a>
            </div>
        </div>

        <!-- Sidebar (Desktop) -->
        <aside class="sidebar">
            <div class="sidebar-logo">
                <a href="<?php echo home_url('/'); ?>" class="logo-box">
                    <span>ブックカバーデザイン<br>無料配布サイト</span><br>
                    Book<br>Style
                </a>
            </div>

            <nav class="gMenu">
                <?php wp_nav_menu(array(
                    'theme_location' => 'gMenu',
                    'container' => false,
                    'menu_class' => 'gMenu-list',
                    'fallback_cb' => false
                )); ?>
                <!-- Fallback static menu if empty -->
                <?php if (!has_nav_menu('gMenu')): ?>
                    <ul class="gMenu-list">
                        <li><a href="<?php echo home_url('/'); ?>">> HOME</a></li>
                        <li><a href="<?php echo home_url('/about/'); ?>">> ABOUT</a></li>
                        <li><a href="<?php echo home_url('/works/'); ?>">> WORKS</a></li>
                        <li><a href="<?php echo home_url('/gallery/'); ?>">> GALLERY</a></li>
                        <li><a href="<?php echo home_url('/blog/'); ?>">> BLOG</a></li>
                        <li><a href="<?php echo home_url('/howto/'); ?>">> HOWTO</a></li>
                        <li><a href="<?php echo home_url('/mail/'); ?>">> MAIL</a></li>
                    </ul>
                <?php endif; ?>
            </nav>

            <div class="sidebar-news">
                <span class="search-label">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/icon_news.png" alt="News" style="width:16px; vertical-align:middle;"> 更新情報
                </span>
                <?php
                $news_query = new WP_Query(array(
                    'post_type'      => 'blog',
                    'posts_per_page' => 1,
                    'post_status'    => 'publish',
                ));
                if ($news_query->have_posts()) :
                    while ($news_query->have_posts()) : $news_query->the_post();
                        $news_title = get_the_title();
                        ?>
                        <div class="news-item">
                            <div class="news-date"><?php echo get_the_time('Y/m/d'); ?></div>
                            <div class="news-title">
                                <a href="<?php the_permalink(); ?>"><?php echo esc_html($news_title); ?></a>
                            </div>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>

            <div class="sidebar-search">
                <span class="search-label">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/icon_search.png" alt="Search"
                        style="width:16px; vertical-align:middle;"> ブックカバー検索
                </span>
                <form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
                    <!-- Category Select -->
                    <div class="search-item">
                        <select name="cat" id="cat" class="search-select">
                            <option value="0">ジャンルをえらぶ</option>
                            <?php
                            $categories = get_categories(array(
                                'orderby' => 'name',
                                'order' => 'ASC'
                            ));
                            foreach ($categories as $category) {
                                // Use description if available, otherwise name
                                $label = !empty($category->description) ? $category->description : $category->name;
                                $selected = (get_query_var('cat') == $category->term_id) ? 'selected' : '';
                                echo '<option value="' . esc_attr($category->term_id) . '" ' . $selected . '>' . esc_html($label) . '</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <!-- Sort Select -->
                    <div class="search-item">
                        <select name="sort" class="search-select">
                            <option value="">並び替え</option>
                            <option value="new" <?php selected(get_query_var('sort'), 'new'); ?>>新しいもの順</option>
                            <option value="old" <?php selected(get_query_var('sort'), 'old'); ?>>古いもの順</option>
                            <option value="rand" <?php selected(get_query_var('sort'), 'rand'); ?>>ランダム</option>
                        </select>
                    </div>

                    <!-- Color Search -->
                    <div class="sidebar-color-search" style="margin-top: 15px;">
                        <span class="search-label" style="font-size: 13px; margin-bottom: 5px;">色でさがす</span>
                        <div class="color-dots">
                            <?php
                            $colors = array(
                                'brown' => 'Brown',
                                'blue' => 'Blue',
                                'green' => 'Green',
                                'red' => 'Red',
                                'white' => 'White',
                                'colorful' => 'Colorful'
                            );
                            $current_color = get_query_var('color');
                            foreach ($colors as $slug => $label):
                                $checked = ($current_color === $slug) ? 'checked' : '';
                                ?>
                                <label class="color-dot-wrapper">
                                    <input type="radio" name="color" value="<?php echo esc_attr($slug); ?>" <?php echo $checked; ?>>
                                    <span class="color-dot color-<?php echo esc_attr($slug); ?>"
                                        title="<?php echo esc_attr($label); ?>"></span>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <button type="submit" class="search-submit" style="display:none;">Search</button>

                    <div style="margin-top: 10px; text-align: left;">
                        <a href="<?php echo home_url('/'); ?>"
                            style="font-size: 12px; color: #999; text-decoration: underline;">検索条件をクリア</a>
                    </div>
                </form>
            </div>

            <div class="sidebar-social">
                <a href="https://twitter.com/book_style_neri" target="_blank"><img
                        src="<?php echo get_template_directory_uri(); ?>/images/icon_x.png" alt="X"></a>
                <a href="https://instagram.com/neri_bookstyle/" target="_blank"><img
                        src="<?php echo get_template_directory_uri(); ?>/images/icon_instagram.png"
                        alt="Instagram"></a>
                <a href="https://bookstyle.booth.pm/" target="_blank"><img
                        src="<?php echo get_template_directory_uri(); ?>/images/icon_shopping.png"
                        alt="BOOTH"></a>
            </div>
        </aside>