<?php

function andrew_murray_content_thumbnail_slider_render_callback( $attributes ) {
   $selectedPages = $attributes['selectedPages'];
   $pages = $attributes['pages'];

    ob_start();

    echo "<div class='container'>";
        echo "<div class='row'>";
            echo "<div class='col-md-12'>";
                echo "<ul class='featured-content-slider'>";
                    foreach ($pages as $page) {
                        if (in_array($page['id'], $selectedPages)) {
                            echo "<li class='featured-content-container'>";
                                echo "<div class='featured-content'>";
                                    printf("<h5>%s</h5>", $page['title']['rendered']);

                                    echo "<div class='wp-block-button purple-filled-button'>";
                                        printf("<a href='%s' class='wp-block-button__link'>Find out more</a>", $page['link']);
                                    echo "</div>";
                                echo "</div>";


                                printf("<img src='%s'>", $page['featured_image_src'][0]);
                            echo "</li>";
                        }
                    }
                echo "</div>";
            echo "</div>";
        echo "</div>";
    echo "</div>";

    return ob_get_clean();
}
 
function andrew_murray_content_thumbnail_slider() {
    register_block_type( 'andrewmurray/content-thumbnail-slider', array(
        'render_callback' => 'andrew_murray_content_thumbnail_slider_render_callback'
    ) );
}
add_action( 'init', 'andrew_murray_content_thumbnail_slider' );