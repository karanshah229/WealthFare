<?php get_header() ?>

<div class="uk-position-relative uk-visible-toggle uk-light uk-text-center" tabindex="-1" uk-slider="center: true" style="background-color: #CCCCCC77">
    <ul class="uk-slider-items uk-grid">
        <li class="uk-width-3-4">
            <div class="uk-panel">
                <img src="https://picsum.photos/seed/picsum/800/450" alt="">
                <!-- <div class="uk-position-center uk-panel"><h1>1</h1></div> -->
            </div>
        </li>
        <li class="uk-width-3-4">
            <div class="uk-panel">
                <img src="https://picsum.photos/seed/picsum/800/450" alt="">
            </div>
        </li>
        <li class="uk-width-3-4">
            <div class="uk-panel">
                <img src="https://picsum.photos/seed/picsum/800/450" alt="">
            </div>
        </li>
        <li class="uk-width-3-4">
            <div class="uk-panel">
                <img src="https://picsum.photos/seed/picsum/800/450" alt="">
            </div>
        </li>
    </ul>

    <a class="uk-position-center-left uk-position-small uk-hidden-hover" style="color: black" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
    <a class="uk-position-center-right uk-position-small uk-hidden-hover" style="color: black" href="#" uk-slidenav-next uk-slider-item="next"></a>
</div>

<div class="uk-section uk-text-medium" style="background-color: #dedede">
    <div class="why-wealthfare uk-container">
        <h1>Why Wealthfare ?</h1>
        <div class="first-para">
            <div>Does <span class="uk-text-bold">finance</span> related material sound daunting?<div>
            <div>Is it difficult for you to <span class="uk-text-italic">break down<span> your <span class="uk-text-bold">advisor analysis?</span></div>
            <div>Does <span class="uk-text-bold">investment</span> terminology look like jargon?</div>
            <div>Is it painful to go through an annual <span class="uk-text-bold">financial statement?</span></div>
        </div>
        <div class="second-para uk-text-lead uk-margin-top uk-text-italic">
            <p>You have come to the right place!</p>
        </div>
        <div class="third-para">
            <p><span class="uk-text-lead">Wealthfare</span> is an amalgamation of everything money 💰, with educational 🏫 and interactive articles 📝 covering a wide assortment of finance related topics like insurance, home loans 🏠, banking services 🏦, mutual funds, tax planning 💲, stock markets 📈, and much more.</p>
        </div>
        <div class="fourth-para">
            <p>We also offer our two cents on <span class="uk-text-bold">corporate finance</span>, economics of <span class="uk-text-bold">start-ups</span> and <span class="uk-text-bold">government finance</span>, with an emphasis on <span class="uk-text-bold">economy</span>, along with a bit of <span class="uk-text-bold">micro-finance</span>, as well as <span class="uk-text-bold">trade</span> related economies.</p>
        </div>
        <div class="fifth-para">
            <p>With a <span class="uk-text-bold">unique</span> and <span class="uk-text-bold">informative</span> blog-related style of penning our thoughts and advice down, we have got you covered, whether you are a high school or university <span class="uk-text-bold">student</span>, budding <span class="uk-text-bold">entrepreneur</span>, businessman or employee, or just share our <span class="uk-text-bold">love for finance</span>!</p>
        </div>
        <div class="fifth-para">
            <p>Welcome to <span class="uk-text-lead">Wealthfare</span>, your fiscal cup of tea!</p>
            <a href="#subscribe" uk-scroll>New here ? Subscribe to our mailing list</a>
        </div>
    </div>
</div>
</div>
</div>


<?php 
    $categories = get_categories();
    foreach($categories as $category) {
        $the_query = new WP_Query(array(
            'category_name' => $category->slug,
            'posts_per_page' => 3
            )
        );

        //Get the most viewed posts
        $popularpost = new WP_Query(array('posts_per_page' => 3, 'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC', 'category_name' => $category->slug));

        $most_viewed_posts = array();
        while ( $popularpost->have_posts() ){
            $popularpost->the_post();
            $articleTemp = '<article class="uk-article"><div>';
            $articleTemp .= '<a class="uk-article-title" href="'.get_the_permalink().'">'.get_the_title().'</a>';
            $articleTemp .= '<p class="uk-article-meta">Written by <a href="#">'.get_author_name().'</a> on <span uk-icon="calendar"></span>'.get_the_date('d-m-Y');
            $articleTemp .= '<div class="uk-text">'.get_the_excerpt().'</div>';
            $articleTemp .= '<div class="uk-grid-small uk-child-width-auto read-more" uk-grid><div><a class="uk-button uk-button-text" href="'.get_the_permalink().'">Read more</a></div><div><a class="uk-button uk-button-text" href="'.get_the_permalink().'">{x} Comments</a></div></div>';
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
                $articleTemp .= '<p class="uk-article-meta">Written by <a href="#">'.get_author_name().'</a> on <span uk-icon="calendar"></span>'.get_the_date('d-m-Y');
                $articleTemp .= '<div class="uk-text">'.get_the_excerpt().'</div>';
                $articleTemp .= '<div class="uk-grid-small uk-child-width-auto read-more" uk-grid><div><a class="uk-button uk-button-text" href="'.get_the_permalink().'">Read more</a></div><div><a class="uk-button uk-button-text" href="'.get_the_permalink().'">{x} Comments</a></div></div>';
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
        <div class="uk-section uk-text-medium" style="background-color: rgb(233,233,233)">
        <div class="uk-container">
        <?php
        echo '<a style="font-size: 2rem; color: black" class="uk-link-heading front-page-category-heading" href="'.get_category_link($category->term_id).'">'.$category->name.'</a><hr>';
        echo '<div class="uk-grid uk-grid-match categories-text-align" uk-grid>';

        $leftDiv = '<div class="uk-width-2-3@m left-div"><div style="font-size: 1.5rem; margin-bottom: 2rem; color: #1e90ff">Latest Posts</div>';
        $rightDiv = '<div class="uk-grid uk-width-1-3@m"><div style="font-size: 1.5rem; color: #1e90ff">Most Read Posts</div>';

        $len = count($featuredImage);
        for($i = 0; $i < $len; $i++){
            $leftDiv .= '
                <div class="uk-width-1-3@m" style="padding: 0 1rem 1rem 0">
                    '.$featuredImage[$i].'
                </div>
                <div class="uk-width-2-3@m">
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
        <?php
    }
?>


<div class="uk-section uk-text-medium" style="background-color: teal; color: white" id="subscribe">
    <div class="uk-container">
        <h2 class="uk-text-large"><span style="color: gold">$</span> Subscribe to our Mailing List <span style="color: gold">$</span></h2>
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