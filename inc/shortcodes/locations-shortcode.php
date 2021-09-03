<?php

   function locations_grid_shortcode(){

      $args = array(
         'post_type' => 'locations'
      );

      $loop = new WP_Query($args);

      $cats = get_the_category(get_the_id());

      if( $loop->have_posts() ) :
      
         ob_start(); 
         
         ?>

         <div class="locations-wrapper">

            <?php
            
               while($loop->have_posts()) :
                  $loop->the_post();

                  $address = get_field('address');

                  ?>

                     <div class="location-item">
                        <div class="inner-wrapper">
                           <div class="text-wrapper">
                              <p class="title"><?php echo get_the_title(); ?></p>      
                              <p><?php echo $address; ?></p>

                              <?php
                              
                                 // Check rows exists.
                                 if( have_rows('contact_info') ):

                                    // Loop through rows.
                                    while( have_rows('contact_info') ) : the_row();

                                       // Load sub field value.
                                       $icon = get_sub_field('icon');
                                       $link = get_sub_field('text');

                                       echo '<p>'. $icon .' <a href="'. $link["url"] .'">'. $link["title"] .'</a></p>';

                                    // End loop.
                                    endwhile;

                                 // No value.
                                 else :
                                    // Do something...
                                 endif;

                              ?>

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
   add_shortcode('locations-grid', 'locations_grid_shortcode');

?>