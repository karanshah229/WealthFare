<?php get_header() ?>

<div class="uk-section uk-text-medium">
    <div class="uk-container">
        <h1>Blog</h1>
        <div>'Here is the collection of  or something like this' | Lorem ipsum dolor sit amet consectetur, adipisicing elit. Veritatis, expedita tempore. Quod voluptas iste labore quam quasi hic odio, beatae error dolorem neque recusandae, quo molestiae minus possimus, mollitia aspernatur.</div>
    </div>
</div>

<?php 
    $categories = get_categories();
    foreach($categories as $category) {
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

        $the_query = new WP_Query(array(
            'category_name' => $category->slug,
            'posts_per_page' => 3
            )
        );
        
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
        echo '<a style="font-size: 2rem; color: black; font-family: Montserrat;" class="uk-link-heading front-page-category-heading" href="'.get_category_link($category->term_id).'">'.$category->name.'</a><hr>';
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

<?php get_footer() ?>