<?php get_header() ?>

<div uk-grid>
    <div class="uk-width-1-5@m uk-visible@m uk-text-right" style="background-image: linear-gradient(181deg, #BDDBBAAA 0%, #7CAE7A88 51%, #5B925B88 75%); color: black; padding: 1rem">
        <div class="post-actions">
        </div>
    </div>
    <div class="uk-width-3-5@m blog-content" style="background-color: #e4e4e4; color: black">
        <div class="blog-content-div">
            <?php 
                while (have_posts()){
                    the_post();
                    $articleTemp = '<article class="uk-article"><div>';
                    echo do_shortcode('[shared_counts]');
                    $articleTemp .= '<div class="uk-article-title montserrat" style="color: black; padding-bottom: 2rem">'.get_the_title().'</div>';
                    $articleTemp .= '<div class="uk-article-meta" style="color: #555">Written by <a href="#">'.get_author_name().'</a> on <span uk-icon="calendar"></span>'.get_the_date('d-m-Y').' in '.get_the_category_list(', ');
                    $articleTemp .= '<div style="padding-bottom: 2rem">'.do_shortcode('[rt_reading_time postfix="minutes read" postfix_singular="minute read"]').'</div></div>';
                    $articleTemp .= '<div class="single-post-featured-image">'.get_the_post_thumbnail($post_id).'</div>';
                    $articleTemp .= '<div class="uk-text">'.get_the_content().'</div>';
                    $articleTemp .= '</div></article>';
                    echo $articleTemp;
                }
            ?>
        </div>
        <div class="comments-section-wrapper" style="background-color: #e4e4e4; color: black">
            <?php echo do_shortcode('[shared_counts]');
            comments_template(); ?>
        </div>
    </div>
    <div class="uk-width-1-5@m uk-visible@m uk-padding" style="background-image: linear-gradient(141deg, #BDDBBAAA 0%, #7CAE7A88 51%, #5B925B88 75%); color: black">
            <h4>See other blogs by Wealthfare</h4><hr style="border: 0.5px solid black">
            <ul uk-accordion="multiple: true">
                <?php 
                    $categories = get_categories();
                    foreach($categories as $category) {
                        $the_query = new WP_Query(array(
                            'category_name' => $category->slug,
                            'posts_per_page' => 8
                            )
                        );

                        echo '<li><a class="uk-accordion-title" href="#">'.$category->name.'</a>';
                        echo '<div class="uk-accordion-content">';

                        if ( $the_query->have_posts() ) {
                            while( $the_query->have_posts() ){
                                $the_query->the_post();
                                echo '<a href="'.get_the_permalink().'" rel="bookmark" style="color: black">'.get_the_title().'</a><br>';
                            }
                        } else {
                            // no posts found
                            echo '<div>No posts found!</div><div>Check again later</div>';
                            continue;
                        }

                        echo '<a href="'.get_category_link($category->term_id).'">Show all</a></div></li>';
                    }
                ?>
            </ul>
        </div>
    </div>
</div>
<?php get_footer() ?>