<?php get_header() ?>

<div class="uk-section uk-text-medium" style="background-color: #dedede">
    <div class="uk-container">
        <h3><?php the_archive_title() ?></h3>
        <div><?php the_archive_description() ?></div>
        <hr>
        <?php 
            while(have_posts()){
                the_post();
                // For now we have only 2 types of posts
                // If they grow use template-parts approach
                if (get_post_type() == 'page'){
                    $pageTemp = '<div style="margin-bottom: 2rem"><a class="uk-article-title" style="font-size: 2rem" href="'.get_the_permalink().'">'.get_the_title().'</a>';
                    $pageTemp .= get_the_content().'</div>';
                    echo $pageTemp;
                } else if(get_post_type() == 'post'){
                    $articleTemp = '<article class="uk-article"><div>';
                    $articleTemp .= '<a class="uk-article-title" href="'.get_the_permalink().'">'.get_the_title().'</a>';
                    $articleTemp .= '<p class="uk-article-meta">Written by '.get_the_author_posts_link().' on <span uk-icon="calendar"></span>'.get_the_date('d-m-Y').' in '.get_the_category_list(', ');
                    $articleTemp .= '<div class="uk-text">'.get_the_excerpt().'</div><br>';
                    $articleTemp .= '<div class="uk-grid-small uk-child-width-auto read-more" uk-grid><div><a class="uk-button uk-button-text" href="'.get_the_permalink().'">Read more</a></div><div><a class="uk-button uk-button-text" href="'.get_the_permalink().'">{x} Comments</a></div></div>';
                    $articleTemp .= '</div></article>';

                    if(has_post_thumbnail()){
                        $image = '<a href="'.get_the_permalink().'"class="post-featured-image-link" rel="bookmark">'.get_the_post_thumbnail($post_id, array(300, 200)).'</a>';
                    } else {
                        // No Featured Image for Article
                        $image = '<a href="'.get_the_permalink().'"class="post-featured-image-link" rel="bookmark"><img src="https://picsum.photos/300/200" /></a>';
                    }

                    echo '<div uk-grid><div class="uk-width-1-4@m uk-width-1-1@s">';
                    echo $image.'</div><div class="uk-width-1-2@m uk-width-1-1@s">';
                    echo $articleTemp.'</div>';
                    echo '</div>';

                }
            }
        ?>

    </div>
</div>


<?php get_footer() ?>