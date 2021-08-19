<?php

   function newsroom_masonry_grid_shortcode(){

      $args = array(
         'post_type' => 'post'
      );

      $loop = new WP_Query($args);

      $cats = get_the_category(get_the_id());

      if( $loop->have_posts() ) :
      
         ob_start(); 
         
         ?>

         <div class="newsroom-wrapper">

            <?php
            
               while($loop->have_posts()) :
                  $loop->the_post();

                  ?>

                     <div class="newsroom-item">
                        <div class="inner-wrapper">
                           <div class="image-wrapper">
                              <a href="<?php echo get_the_permalink(); ?>">
                                 <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo get_the_title(); ?>">
                              </a>
                           </div>
                           <div class="text-wrapper">
                              <div class="post-meta">
                                 <p class="category"><?php echo $cats[0]->name; ?></p>
                                 <p class="date"><?php echo get_the_date('F, jS Y'); ?></p>
                                 <hr>
                              </div>
                              <a class="link" href="<?php echo get_the_permalink(); ?>">
                                 <p class="title"><?php echo get_the_title(); ?></p>
                              </a>
                              <a class="link" href="<?php echo get_the_permalink(); ?>">Explore more</a>
                           </div>
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
   add_shortcode('newsroom-masonry', 'newsroom_masonry_grid_shortcode');

?>