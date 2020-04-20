<?php get_header() ?>
<?php 
    while(have_posts()){
        the_post();
        ?>
        <div class="uk-container uk-margin-large-top">
            <h1><?php the_title(); ?></h1><hr>
            <div class="uk-section">
                <?php echo do_shortcode('[shared_counts]'); ?>
                <?php the_content(); ?>
            </div>
        </div>
        <?php
    }
?>

<?php get_footer() ?>