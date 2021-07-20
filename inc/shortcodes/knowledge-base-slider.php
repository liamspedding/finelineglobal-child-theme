<?php

    function knowledge_centre_slider_shortcode(){

        $args = array(
            'post_type' => 'knowledge-centre'
        );

        $loop = new WP_Query($args);

        if( $loop->have_posts() ) :
        
            ob_start(); 
            
            ?>

                <div class="knowledge-centre-slider-wrapper">

                    <?php
                    
                        while($loop->have_posts()) :
                            $loop->the_post();

                            ?>

                                <div class="knowledge-centre-slide">
                                    <div class="image-wrapper">
                                        <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo get_the_title(); ?>">
                                    </div>
                                    <div class="text-wrapper">
                                        <p class="title"><?php echo get_the_title(); ?></p>
                                        <p class="sub-title"><?php echo get_field('sub-title'); ?></p>
                                        <a href="<?php echo get_the_permalink(); ?>">Explore more</a>
                                    </div>
                                </div>
                                

                            <?php 

                        endwhile;
                    
                    ?>

                </div>

            <?php

            $output_string = ob_get_contents();
            ob_end_clean();
            return $output_string;
            
        endif;

        wp_reset_postdata();

    }
    add_shortcode('knowledge-centre-slider', 'knowledge_centre_slider_shortcode');

?>