<?php 

// add_filter('manage_posts_columns', 'posts_columns', 5);
// add_action('manage_posts_custom_column', 'posts_custom_columns', 5, 2);
 
// function posts_columns($defaults){
//     $defaults['post_thumb'] = __('Image');
//     return $defaults;
// }
 
// function posts_custom_columns($column_name, $id){
//     if($column_name === 'post_thumb'){
//         echo the_post_thumbnail( 'featured-thumbnail' );
//     }
// }

function set_custom_edit_book_columns($columns) {
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
add_filter( 'manage_posts_columns', 'set_custom_edit_book_columns' );

// Add the data to the custom columns for the book post type:
function custom_book_column( $column, $post_id ) {
      switch ( $column ) {

         case 'post_thumb' :
            echo the_post_thumbnail( array(200, 200) );
            break;

      }
}
add_action( 'manage_posts_custom_column' , 'custom_book_column', 10, 2 );

// Add Menu Order support
add_action('admin_init', 'mpe_add_portfolio_page_attributes');
function mpe_add_portfolio_page_attributes(){

    add_post_type_support( 'technology-portfolio', 'page-attributes' );

}