<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head() ?>
</head>
<body>
    <div uk-sticky="animation: uk-animation-slide-top; sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky">
        <nav class="uk-navbar-container" uk-navbar style="background-color: black">
            <!-- <div class="uk-container-expand"> -->
                <div uk-navbar class="uk-navbar">
                    <div class="uk-navbar-left">
                        <ul class="uk-navbar-nav">
                            <li class="uk-hidden@m"><a class="uk-navbar-toggle" uk-navbar-toggle-icon uk-toggle="target: #sideNav"></a></li>
                            <li><a class="uk-navbar-item uk-logo" href="<?php echo site_url('')?>">
                            <img src="<?php echo get_theme_file_uri('/static/images/common/logo_11.png') ?>" width="65px" class="uk-visible@m">
                            <img src="<?php echo get_theme_file_uri('/static/images/common/logo.png') ?>" width="40px" class="uk-hidden@m">
                            <span class="uk-margin-left" style="color: white; font-size: 1.5rem;">W</span>
                            <span style="color: white; font-size: 1.5rem;text-transform: lowercase">ealthfare</span>
                            </a></li>
                        </ul>
                    </div>
                    <div class="uk-navbar-right">
                        <ul class="uk-navbar-nav">
                            <li class="uk-hidden@m">
                                <a onclick="document.getElementById('mobile_search_wrapper').style.display = 'block'; document.getElementById('mobile_search').classList.add('mobile_search_final');" href="search" uk-scroll>
                                    <span uk-icon="search" style="color: white"></span>
                                </a>
                            </li>
                            <?php if(is_user_logged_in()){ ?>
                            <li class="uk-hidden@m">
                                <a><span uk-icon="user" style="color: white"></span></a>
                                <div uk-dropdown="pos: bottom-justify" class="uk-text-center">
                                    <a class="uk-button uk-margin-remove" href="<?php echo wp_logout_url('/') ?>">Logout</a>
                                </div>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            <!-- </div> -->
            <div class="uk-navbar-right uk-visible@m">
                <ul class="uk-navbar-nav">
                    <li><a href="<?php echo site_url('/blog')?>" <?php if (is_home()) echo 'class="current-menu-item"'?> >Blog</a>
                    <div uk-dropdown="pos: bottom-justify" class="uk-text-">
                    <?php
                        $categories = get_categories();
                        foreach($categories as $category) {
                        echo '<div class="category-dropdown"><img src="'.get_field('category_image', $category->taxonomy . '_' . $category->term_id ).'" width="25px" style="margin-right: 10px"/><a class="uk-link-heading" href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></div>';
                        }
                    ?>
                    </div></li>
                    <li><a href="<?php echo site_url('/meet-the-team')?>" <?php if (is_page('meet-the-team') or wp_get_post_parent_id(0) == 11) echo 'class="current-menu-item"' ?>>The Team</a></li>
                    <div class="uk-margin" style="display: flex">
                        <input class="uk-input uk-form-width-medium" type="search" placeholder="Search Wealthfare" id="search_input" value="<?php 
                            $search_term = get_search_query();
                            if(strlen($search_term)){
                                echo $search_term;
                            }
                        ?>">
                        <button class="uk-button uk-button-primary" type="button" onclick="
                            search_term = document.getElementById('search_input').value;
                            window.location = './?s='+search_term;
                        " uk-icon="search"></button>
                    </div>
                    <li class="uk-margin-small-right">
                        <a href="<?php echo site_url('/login')?>"><span uk-icon="user" style="padding-right: 10px"></span>
                        <?php global $current_user; wp_get_current_user(); ?>
                        <?php if ( is_user_logged_in() ) { 
                        echo $current_user->display_name;}
                        else { echo 'LOGIN'; } ?></a>
                        <?php 
                            if ( is_user_logged_in() ) {
                        ?>
                            <div uk-dropdown="pos: bottom-justify" class="uk-text-center">
                                <a class="uk-button uk-margin-remove" href="<?php echo wp_logout_url('/') ?>">Logout</a>
                            </div>
                        <?php
                            }
                        ?>
                    </li>
                </ul>
            </div>
        </nav>
    </div>


    <div id="sideNav" uk-offcanvas="overlay: true; mode: slide" style="background-color: rgb(0,0,0,0.35)">
        <div class="uk-offcanvas-bar">
            <div class="uk-grid">
                <button class="uk-offcanvas-close" type="button" uk-close id="sideNavCloseBtn"></button>
                <p class="uk-text-lead uk-text-center">
                    <a class="uk-logo" href="<?php echo site_url('')?>">
                        <img src="<?php echo get_theme_file_uri('/static/images/common/logo_no_bg.png') ?>" width="40px" class="uk-hidden@m">
                    </a>
                    <span>Wealthfare</span>
                </p>
            </div><hr>
            <div>
                <ul class="uk-nav uk-nav-primary uk-nav-center uk-margin-auto-vertical">
                    <li><a href="<?php echo site_url('')?>" <?php if (is_front_page()) echo 'class="current-menu-item"' ?>><span uk-icon="home" style="padding-right: 10px"></span>Home</a></li>
                    <li><a href="<?php echo site_url('/blog')?>" <?php if (is_home()) echo 'class="current-menu-item"'?>><span uk-icon="file-text" style="padding-right: 10px"></span>Blog</a></a></li>
                    <li><a href="<?php echo site_url('meet-the-team')?>" <?php if (is_page('meet-the-team') or wp_get_post_parent_id(0) == 11) echo 'class="current-menu-item"' ?>><span uk-icon="info" style="padding-right: 10px"></span>The Team</a></li>
                    <li><a onclick="
                    document.getElementById('sideNavCloseBtn').click();
                    document.getElementById('mobile_search_wrapper').style.display = 'block';
                    document.getElementById('mobile_search').classList.add('mobile_search_final');
                    " href="search" uk-scroll><span uk-icon="search" style="padding-right: 10px; color: #AAA"></span>Search</a></li>
                    <?php 
                        if (!is_user_logged_in()){ ?>
                            <li class="uk-margin-small-right"><a href="<?php echo site_url('/login')?>"><span uk-icon="user" style="padding-right: 10px"></span>Login</a></li>
                    <?php 
                    } ?>
                </ul>
            </div>
        </div>
    </div>
    <div href="search" uk-scroll class="mobile_search_wrapper" id="mobile_search_wrapper">
        <div class="mobile_search_initial uk-hidden@m" id="mobile_search" style="display: flex">
            <input class="uk-input" type="search" id="search_input_mobile" placeholder="Search Wealthfare" value="<?php 
                $search_term = get_search_query();
                if(strlen($search_term)){
                    echo $search_term;
                }
            ?>">
            <button class="uk-button uk-button-primary" type="button" onclick="
                search_term = document.getElementById('search_input_mobile').value;
                window.location = './?s='+search_term;
            " uk-icon="search"></button>
            <button class="uk-button uk-button-secondary" id="search_close_btn" type="button" style="padding: 0 15px" onclick = "document.getElementById('mobile_search').classList.remove('mobile_search_final')">X</button>
        </div>
    </div>
    <!-- <div class="uk-container uk-container-center open_sans"> -->