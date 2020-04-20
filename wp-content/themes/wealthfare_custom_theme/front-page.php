<?php get_header() ?>

<div class="uk-position-relative uk-visible-toggle uk-light uk-text-center" tabindex="-1" uk-slider="center: true; autoplay: true; autoplay-interval: 3500; pause-on-hover: true" style="background-color: #D6EFF6">
    <ul class="uk-slider-items uk-grid">
        <!-- Need to put 4 coz does not come back to 1st if only 2 pictures  -->
        <li class="uk-width-1-1">
            <div class="uk-panel hero-slider uk-visible@m" style="background-image: url(<?php echo get_theme_file_uri('/static/images/hero_slider/laptop_1.png') ?>)">
                <!-- <div class="uk-position-center uk-panel"><h1>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Animi, aliquid.</h1></div> -->
            </div>
            <div class="uk-panel hero-slider uk-hidden@m" style="background-image: url(<?php echo get_theme_file_uri('/static/images/hero_slider/mobile_1.jpeg') ?>)"></div>
        </li>
        <li class="uk-width-1-1">
            <div class="uk-panel hero-slider uk-visible@m" style="background-image: url(<?php echo get_theme_file_uri('/static/images/hero_slider/laptop_2.jpeg') ?>)"></div>
            <div class="uk-panel hero-slider uk-hidden@m" style="background-image: url(<?php echo get_theme_file_uri('/static/images/hero_slider/mobile_2.jpeg') ?>)"></div>
        </li>
        <li class="uk-width-1-1">
            <div class="uk-panel hero-slider uk-visible@m" style="background-image: url(<?php echo get_theme_file_uri('/static/images/hero_slider/laptop_1.png') ?>)">
            </div>
            <div class="uk-panel hero-slider uk-hidden@m" style="background-image: url(<?php echo get_theme_file_uri('/static/images/hero_slider/mobile_1.jpeg') ?>)"></div>
        </li>
        <li class="uk-width-1-1">
            <div class="uk-panel hero-slider uk-visible@m" style="background-image: url(<?php echo get_theme_file_uri('/static/images/hero_slider/laptop_2.jpeg') ?>)"></div>
            <div class="uk-panel hero-slider uk-hidden@m" style="background-image: url(<?php echo get_theme_file_uri('/static/images/hero_slider/mobile_2.jpeg') ?>)"></div>
        </li>
    </ul>

    <a class="uk-position-center-left uk-position-small uk-hidden-hover" style="color: black" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
    <a class="uk-position-center-right uk-position-small uk-hidden-hover" style="color: black" href="#" uk-slidenav-next uk-slider-item="next"></a>
</div>

<div class="uk-section uk-text-medium" style="background-color: #ededed">
    <div class="why-wealthfare uk-container open_sans">
        <div class="third-para">
            <p><span class="uk-text-lead">Wealthfare</span> is an amalgamation of everything money, with educational and interactive articles covering a wide assortment of finance related topics like insurance, home loans, banking services, mutual funds, tax planning, stock markets, and much more.</p>
        </div>
        <div class="fourth-para">
            <p>We also offer our two cents on corporate finance, economics of start-ups and government finance, with an emphasis on economy, along with a bit of micro-finance, as well as trade related economies.</p>
        </div>
        <div class="fifth-para">
            <p>With a unique and informative blog-related style of penning our thoughts and advice down, we have got you covered, whether you are a high school or university student, budding entrepreneur, businessman or employee, or just share our love for finance!</p>
        </div>
        <div class="fifth-para">
            <p class="uk-text-lead">Welcome to Wealthfare, your fiscal cup of tea!</p>
            <a href="#subscribe" uk-scroll>New here ? Subscribe to our mailing list</a>
        </div>
    </div>
</div>
</div>
</div>


<?php 
    $categories = get_categories();
    $the_query = new WP_Query(array(
        'posts_per_page' => 5
        )
    );

    //Get the most viewed posts
    $popularpost = new WP_Query(array('posts_per_page' => 5, 'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'));

    $most_viewed_posts = array();
    while ( $popularpost->have_posts() ){
        $popularpost->the_post();
        $articleTemp = '<article class="uk-article"><div>';
        $articleTemp .= '<a class="uk-article-title" href="'.get_the_permalink().'">'.get_the_title().'</a>';
        $articleTemp .= '<p class="uk-article-meta">Written by '.get_the_author_posts_link().' on <span uk-icon="calendar"></span>'.get_the_date('d-m-Y').' in '.get_the_category_list(', ');
        $articleTemp .= '<div class="uk-text">'.get_the_excerpt().'</div><br>';
        $articleTemp .= '<div class="uk-grid-small uk-child-width-auto read-more" uk-grid><div><a class="uk-button uk-button-text" href="'.get_the_permalink().'">Read more</a></div><div><a class="uk-button uk-button-text" href="'.get_the_permalink().'">'.get_comments_number($post_id).' Comments</a></div></div>';
        $articleTemp .= '</div></article>';
        array_push($most_viewed_posts, $articleTemp);
    }
    
    $featuredImage = array();
    $article = array();
    // Get the most recent posts
    if ( $the_query->have_posts() ) {
        while( $the_query->have_posts() ){
            $the_query->the_post();
            $articleTemp = '<article class="uk-article"><div>';
            $articleTemp .= '<a class="uk-article-title" href="'.get_the_permalink().'">'.get_the_title().'</a>';
            $articleTemp .= '<p class="uk-article-meta">Written by '.get_the_author_posts_link().' on <span uk-icon="calendar"></span>'.get_the_date('d-m-Y').' in '.get_the_category_list(', ');
            $articleTemp .= '<div class="uk-text">'.get_the_excerpt().'</div><br>';
            $articleTemp .= '<div class="uk-grid-small uk-child-width-auto read-more" uk-grid><div><a class="uk-button uk-button-text" href="'.get_the_permalink().'">Read more</a></div><div><a class="uk-button uk-button-text" href="'.get_the_permalink().'">'.get_comments_number($post_id).' Comments</a></div></div>';
            $articleTemp .= '</div></article>';
            array_push($article, $articleTemp);

            if(has_post_thumbnail()){
                array_push($featuredImage, '<a href="'.get_the_permalink().'"class="post-featured-image-link" rel="bookmark">'.get_the_post_thumbnail($post_id, array(300, 200)).'</a>');
            } else {
                // No Featured Image for Article
                array_push($featuredImage, '<a href="'.get_the_permalink().'"class="post-featured-image-link" rel="bookmark"><img src="https://picsum.photos/300/200" /></a>');
            }
        }
    } else {
        // no posts found
        array_push($article, '<p>No posts found! Check again in some time</p>');
    }
    
    ?>
    <div class="uk-section uk-text-medium" style="background-color: #f4f4f4">
    <div class="uk-container">
    <?php
    echo '<div class="uk-grid uk-grid-match categories-text-align" uk-grid>';

    $leftDiv = '<div class="uk-width-3-5@m left-div" uk-scrollspy="cls:uk-animation-fade"><div style="font-size: 2rem; margin-bottom: 2rem; color: #1e90ff">Latest Posts</div>';
    $rightDiv = '<div class="uk-grid uk-width-2-5@m" uk-scrollspy="cls:uk-animation-fade"><div style="font-size: 2rem; color: #1e90ff" class="most-read-posts-wrapper">Most Read Posts</div>';

    $len = count($featuredImage);
    for($i = 0; $i < $len; $i++){
        $leftDiv .= '
            <div class="uk-width-1-3@m" style="padding-bottom: 1rem">
                '.$featuredImage[$i].'
            </div>
            <div class="uk-width-2-3@m article-data">
                '.$article[$i].'
            </div>';
        $rightDiv .= $most_viewed_posts[$i];
    }
    $leftDiv .= '</div>';
    $rightDiv .= '</div>';
    echo $leftDiv;
    echo $rightDiv;

    echo '</div>';

    /* Restore original Post Data */
    wp_reset_postdata();
    ?>
    </div>
    </div>
    
    
<div class="uk-section uk-text-medium" style="background-color: #ededed">
<div class="uk-container">
<h1>All Categories</h1><hr>
<div class="uk-grid uk-grid-match uk-grid-small">
<?php
$i = 0;
foreach($categories as $category) {
    ?>
        <div style="margin-bottom: 1rem" class="uk-width-1-2 uk-width-1-6@m">
            <?php
            $image = get_field('category_image', $category->taxonomy . '_' . $category->term_id );
            echo '<a href="./category/'.$category->slug.'"><img src="'.$image.'" uk-img/></a>';?>
        </div>
        <div class="uk-width-4-5 uk-grid uk-visible@m">
            <a style="text-decoration: none" href="./category/<?php echo $category->slug?>" class="uk-text-large"><?php echo $category->name ?></a>
            <div><?php echo $category->description ?></div>
        </div>
    <?php
    $i++;
}?>
<div class="uk-hidden@m uk-width-1-2"><a href="./blog"><img src="<?php echo get_theme_file_uri('/static/images/icons/view_all_posts.jpg') ?>" uk-img/></a></div>
<div class="uk-visible@m"><a href="./blog">Alternatively, See all our Blog Posts</a></div>
</div>
</div>
</div>

<div class="uk-section uk-text-medium" style="background-color: #009688; color: white" id="subscribe">
    <div class="uk-container">
        <h2>Subscribe to our Mailing list</h2>
        <p>Get our free weekly newsletter to save and invest your hard earned money</p>
        <div class="uk-grid">
            <div class="uk-width-1-3@m">
                <input class="uk-input" style="margin-bottom: 10px" type="email" placeholder="Enter email address">
            </div>
            <div class="uk-width-1-3">
                <button class="uk-button" type="button" style="background-color: #292929; letter-spacing: 1px">Subscribe</button>
            </div>
        </div>
    </div>
</div>

<?php get_footer() ?>