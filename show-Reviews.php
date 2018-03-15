<?php
/*
Plugin Name: show Reviews
Plugin URI: -
Description: -
Version: 1.0
Author: I
Author URI: -
License: n0
*/

// новый тип записи

add_action( 'init', 'create_show_review' );


function create_show_review() {
register_post_type( 'show_reviews',
array(
'labels' => array(
'name' => 'show Reviews',
'singular_name' => 'show Review',
'add_new' => 'Add New',
'add_new_item' => 'Add New show Review',
'edit' => 'Edit',
'edit_item' => 'Edit show Review',
'new_item' => 'New show Review',
'view' => 'View',
'view_item' => 'View show Review',
'search_items' => 'Search show Reviews',
'not_found' => 'No show Reviews found',
'not_found_in_trash' =>
'No show Reviews found in Trash',
'parent' => 'Parent show Review'
),
'public' => true,
'menu_position' => 15,
'supports' =>
array( 'title', 'editor', 'comments',
'thumbnail',  ),
'taxonomies' => array( '' ),
'menu_icon' =>
plugins_url( 'images/image.png', __FILE__ ),
'has_archive' => true
)
);


//таксономии

}

add_action( 'init', 'create_my_taxonomies', 0 );


function create_my_taxonomies(){
register_taxonomy(
          'show_reviews_show_genre',
          'show_reviews', array(
                                        'labels' => array(
                                                                'name' => 'show genre',
                                                                'add_new_item' => 'Add New show genre',
                                                                'new_item_name' => "New show Type genre"
                                                                  ),
                                       'show_ui' => true,
                                       'show_tagcloud' => true,
                                       'hierarchical' => true
                                               )
	                           );


register_taxonomy(
          'show_reviews_show_actor',
          'show_reviews', array(
                                        'labels' => array(
                                                                'name' => 'show actor',
                                                                'add_new_item' => 'Add New show actor',
                                                                'new_item_name' => "New show Type actor"
                                                                  ),
                                       'show_ui' => true,
                                       'show_tagcloud' => true,
                                       'hierarchical' => true
                                               )
	                           );

register_taxonomy(
          'show_reviews_show_place',
          'show_reviews', array(
                                        'labels' => array(
                                                                'name' => 'show place',
                                                                'add_new_item' => 'Add New show place',
                                                                'new_item_name' => "New show Type place"
                                                                  ),
                                       'show_ui' => true,
                                       'show_tagcloud' => true,
                                       'hierarchical' => true
                                               )
	                           );
}



//поля


add_action( 'admin_init', 'my_admin' );




function my_admin() {
add_meta_box( 'show_review_meta_box',
'show Review Details',
'display_show_review_meta_box',
'show_reviews', 'normal', 'high' );
}

function display_show_review_meta_box( $show_review ) {

$show_price =
esc_html( get_post_meta( $show_review->ID,
'show_price', true ) );
$show_date =
esc_html( get_post_meta( $show_review->ID,
'show_date', true ) );
$show_rating =
intval( get_post_meta( $show_review->ID,
'show_rating', true ) );
?>
<table>
<tr>
<td style="width: 100%">show price</td>
<td><input type="text" size="80"
name="show_review_price"
value="<?php echo $show_price; ?>" /></td>
</tr>
<tr>
<td style="width: 100%">show date</td>
<td><input type="text" size="80"
name="show_review_date"
value="<?php echo $show_date; ?>" /></td>
</tr>
<tr>
<td style="width: 150px">show rating</td>
<td>
<select style="width: 100px"
name="show_review_rating">
<?php

for ( $rating = 5; $rating >= 1; $rating -- ) {
?>
<option value="<?php echo $rating; ?>"
<?php echo selected( $rating,
$show_rating ); ?>>
<?php echo $rating; ?> stars
<?php } ?>
</select>
</td>
</tr>
</table>
<?php } 


add_action( 'save_post',
'add_show_review_fields', 10, 3 );


function add_show_review_fields( $show_review_id,
$show_review ) {

if ( $show_review->post_type == 'show_reviews' ) {

if ( isset( $_POST['show_review_price'] ) &&
$_POST['show_review_price'] != '' ) {
update_post_meta( $show_review_id, 'show_price',
$_POST['show_review_price'] );
}
if ( isset( $_POST['show_review_date'] ) &&
$_POST['show_review_date'] != '' ) {
update_post_meta( $show_review_id, 'show_date',
$_POST['show_review_date'] );
}
if ( isset( $_POST['show_review_rating'] ) &&
$_POST['show_review_rating'] != '' ) {
update_post_meta( $show_review_id, 'show_rating',
$_POST['show_review_rating'] );
}
}
}



add_filter( 'template_include',
'include_template_function', 1 );


function include_template_function( $template_path ) {
if ( get_post_type() == 'show_reviews' ) {
if ( is_single() ) {

if ( $theme_file = locate_template( array
( 'single-show_reviews1.php' ) ) ) {
$template_path = $theme_file;
} else {
$template_path = plugin_dir_path( __FILE__ ) . '/single-show_reviews1.php';
     }
  }
    elseif ( is_archive() ) {
                if ( $theme_file = locate_template( array ( 'archive-show_reviews.php' ) ) ) {
$template_path = $theme_file;
}    else { $template_path = plugin_dir_path( __FILE__ ) . '/archive-show_reviews.php';

           }
      }
}
return $template_path;
}



add_filter( 'manage_edit-show_reviews_columns', 'my_columns' );

function my_columns( $columns ) {
          $columns['show_reviews_price'] = 'Price';
		  $columns['show_reviews_date'] = 'Date';
          $columns['show_reviews_rating'] = 'Rating';

unset( $columns['comments'] );
return $columns;
}
add_action( 'manage_posts_custom_column', 'populate_columns' );

function populate_columns( $column )
{
                     if ( 'show_reviews_price' == $column ) {
                                 $show_price = esc_html( get_post_meta( get_the_ID(),'show_price', true ) );
                                 echo $show_price;
								                                                             }
                     elseif ( 'show_reviews_date' == $column ) {
                                 $show_date = esc_html( get_post_meta( get_the_ID(),'show_date', true ) );
                                 echo $show_date;
                                                                                             }
					 elseif ( 'show_reviews_rating' == $column ) {
                                  $show_rating = get_post_meta( get_the_ID(), 'show_rating', true );
                                 echo $show_rating . ' stars';
                                                                                                     }

}


add_filter( 'manage_edit-show_reviews_sortable_columns', 'sort_me' );


function sort_me($columns) {

             $columns['show_reviews_price'] = 'show_reviews_price';
			 $columns['show_reviews_date'] = 'show_reviews_date';
             $columns['show_reviews_rating'] = 'show_reviews_rating';


return $columns;
}


add_filter( 'request', 'column_orderby' );

function column_orderby ($vars ) {
                if ( !is_admin() )
                return $vars;
               if ( isset( $vars['orderby'] ) && 'show_reviews_price' == $vars['orderby'] ) {
                     $vars = array_merge( $vars, array( 'meta_key' => 'show_price', 'orderby' => 'meta_value' ) );
                                                                                                                                         }
			   if ( isset( $vars['orderby'] ) && 'show_reviews_date' == $vars['orderby'] ) {
                     $vars = array_merge( $vars, array( 'meta_key' => 'show_date', 'orderby' => 'meta_value_date' ) );
                                                                                                                                         }

			  elseif ( isset( $vars['orderby'] ) && 'show_reviews_rating' == $vars['orderby'] ) {
			         $vars = array_merge( $vars, array( 'meta_key' => 'show_rating', 'orderby' => 'meta_value_num' ) );
}


return $vars;
}


// фильтр


add_action( 'restrict_manage_posts','my_filter_list' );


function my_filter_list() {
               $screen = get_current_screen();
                global $wp_query;
                if ( $screen->post_type == 'show_reviews' ) {
                          wp_dropdown_categories(array(
						'show_option_all' => 'Show All show genres',
						'taxonomy' => 'show_reviews_show_genre',
						'name' => 'show_reviews_show_genre',
						'orderby' => 'name',
						'selected' =>( isset( $wp_query->query['show_reviews_show_genre'] ) ?
						$wp_query->query['show_reviews_show_genre'] : '' ),
					  'hierarchical' => false,
					  'depth' => 3,
					  'show_count' => false,
					 'hide_empty' => true,
																								)
					);
			}
}

add_filter( 'parse_query','perform_filtering' );

function perform_filtering( $query )
 {
              $qv = &$query->query_vars;
             if (( $qv['show_reviews_show_genre'] ) && is_numeric( $qv['show_reviews_show_genre'] ) ) {
                    $term = get_term_by( 'id', $qv['show_reviews_show_genre'], 'show_reviews_show_genre' );
					$qv['show_reviews_show_genre'] = $term->slug;
}
}