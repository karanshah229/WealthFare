<?php wp_footer(); ?>

<!-- </div> uk-container DIV -->

<div class="uk-section uk-section-secondary uk-padding">
    <div class="uk-grid">
        <div class="uk-width-1-4@m">
            <div class="uk-text-large">
                <a class="uk-link-heading" href="./">Wealthfare</a>
            </div>
            <div>Your fiscal cup of tea</div>
            <hr class="uk-hidden@m">
        </div>
        <div class="uk-width-1-6@m">
            <div class="uk-margin-top uk-hidden@m"></div>
            <div class="uk-text-large" onclick="window.location = '/category'">Categories</div>
            <hr class="uk-visible@m">
            <div>
                <?php
                    $categories = get_categories();
                    foreach($categories as $category) {
                       echo '<div><a class="uk-link-heading" href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></div>';
                    }
                ?>
            </div>
            <hr class="uk-hidden@m">
        </div>  
        <div class="uk-width-1-6@m">
            <div class="uk-margin-large-top uk-hidden@m"></div>
            <div class="uk-text-large">Explore</div>
            <hr class="uk-visible@m">
            <div><a class="uk-link-heading" href="./meet-the-team">The Team</a></div>
            <!-- <div><a class="uk-link-heading" href="./">Podcasts</a></div> -->
            <!-- <div><a class="uk-link-heading" href="./">Events</a></div> -->
            <hr class="uk-hidden@m">
        </div>
        <div class="uk-width-1-6@m">
            <div class="uk-margin-large-top uk-hidden@m"></div>
            <div class="uk-text-large">Learn</div>
            <hr class="uk-visible@m">
            <div><a class="uk-link-heading" href="./">Legal</a></div>
            <div><a class="uk-link-heading" href="./">Privacy</a></div>
            <div><a class="uk-link-heading" href="./">Careers</a></div>
            <hr class="uk-hidden@m">
        </div>
        <div class="uk-width-1-6@m">
            <div class="uk-margin-large-top uk-hidden@m"></div>
            <div class="uk-text-large uk-margin-bottom">Connect</div>
            <hr class="uk-visible@m">
            <span><a uk-icon="instagram" href="./"></a></span>
            <span class="uk-margin-left"><a uk-icon="linkedin" href="./"></a></span>
        </div>
    </div>
</div>

</body>
</html>