<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="wrapper">

    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-logo">
            <a href="<?php echo home_url('/'); ?>" class="logo-box">
                <img src="<?php echo get_template_directory_uri(); ?>/images/logo.svg" alt="Book Style" class="logo-img">
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

        <div class="sidebar-search">
            <span class="search-label">
                <img src="<?php echo get_template_directory_uri(); ?>/images/icon_search.png" alt="Search" style="width:16px; vertical-align:middle;"> ブックカバー検索
            </span>
            <form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
                <!-- Category Select -->
                <div class="search-item">
                    <?php
                    $cat_args = array(
                        'show_option_all' => 'ジャンルでさがす',
                        'orderby' => 'name',
                        'name' => 'cat',
                        'value_field' => 'term_id',
                        'class' => 'search-select',
                        'selected' => get_query_var('cat'),
                    );
                    wp_dropdown_categories($cat_args);
                    ?>
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
                            'black' => 'Black',
                            'blue' => 'Blue',
                            'green' => 'Green',
                            'orange' => 'Orange',
                            'red' => 'Red',
                            'white' => 'White'
                        );
                        $current_color = get_query_var('color');
                        foreach ($colors as $slug => $label) :
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
                
                <div style="margin-top: 10px; text-align: right;">
                    <a href="<?php echo home_url('/'); ?>" style="font-size: 12px; color: #999; text-decoration: underline;">検索条件をクリア</a>
                </div>
            </form>
        </div>

        <div class="sidebar-social">
            <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/icon_x.png" alt="X"></a>
            <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/icon_instagram.png" alt="Instagram"></a>
        </div>
    </aside>
