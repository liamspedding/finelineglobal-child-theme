<?php 

// Knowledge Centre
function set_custom_edit_knowledge_centre_columns($columns) {
   unset( $columns['title'] );
   unset( $columns['author'] );
   unset( $columns['categories'] );
   unset( $columns['date'] );

    $columns['title'] = __( 'Title');
    $columns['post_thumb'] = __( 'Image');
    $columns['author'] = __( 'Author' );
    $columns['categories'] = __( 'Categories' );
    $columns['date'] = __( 'Date' );

    return $columns;
}
add_filter( 'manage_knowledge-centre_posts_columns', 'set_custom_edit_knowledge_centre_columns' );

// Add the data to the custom columns for the book post type:
function custom_knowledge_centre_column( $column, $post_id ) {
      switch ( $column ) {

         case 'post_thumb' :
            echo the_post_thumbnail( array(200, 200) );
            break;

      }
}
add_action( 'manage_knowledge-centre_posts_custom_column' , 'custom_knowledge_centre_column', 10, 2 );

// Job Vacancies
function set_custom_edit_job_vacancies_columns($columns) {
   unset( $columns['title'] );
   unset( $columns['author'] );
   unset( $columns['categories'] );
   unset( $columns['date'] );

    $columns['title'] = __( 'Title');
    $columns['country'] = __( 'Country');
    $columns['date'] = __( 'Date' );

    return $columns;
}
add_filter( 'manage_vacancies_posts_columns', 'set_custom_edit_job_vacancies_columns' );

// Add the data to the custom columns for the book post type:
function custom_job_vacancies_column( $column, $post_id ) {
      switch ( $column ) {

         case 'country' :
            $countries = get_field('country', $post_id);

            foreach( $countries as $country)
               echo $country;
            break;

      }
}
add_action( 'manage_vacancies_posts_custom_column' , 'custom_job_vacancies_column', 10, 2 );



// Add Menu Order support
add_action('admin_init', 'mpe_add_portfolio_page_attributes');
function mpe_add_portfolio_page_attributes(){

    add_post_type_support( 'technology-portfolio', 'page-attributes' );
    add_post_type_support( 'knowledge-centre', 'page-attributes' );

}