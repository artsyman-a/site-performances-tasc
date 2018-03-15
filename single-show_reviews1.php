<?php
 /*Template Name: New_single_show1
 */
get_header(); ?>
<div id="primary">
    <div id="content" role="main">    
          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	          <header class="entry-header">
                <!-- картинка -->
                 <div style="float: top; margin: 10px">
                   <?php the_post_thumbnail( array( 100, 100 ) ); ?>
                 </div>
				 <!-- название и дата -->
				  <h3><?php echo '<img src="/wp-content/themes/new_unite/images/222.png" />'; ?><big><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></big></h3>
	              <p class="entry-meta">
		          <?php the_time("F d, Y"); ?>
	              </p>
	              <?php the_content(); ?>	
				 <strong>Title: </strong><?php the_title(); ?><br />
                 <strong>price: </strong>
                 <?php echo esc_html( get_post_meta( get_the_ID(), 'show_price', true ) ); ?>
				 <strong>date: </strong>
                 <?php echo esc_html( get_post_meta( get_the_ID(), 'show_date', true ) ); ?>
                 <br />
				<strong>Genre: </strong>
                <?php  
				the_terms( $post->ID, 'show_reviews_show_genre' ,  ' ' );
                    ?>
                 <br />
				<strong>Actor: </strong>
                <?php  
				the_terms( $post->ID, 'show_reviews_show_actor' ,  ' ' );
                    ?>
                 <br />  
				<strong>Place: </strong>
                <?php  
				the_terms( $post->ID, 'show_reviews_show_place' ,  ' ' );
                    ?>
                 <br />
                 <!-- рейтинг -->
                <strong>Rating: </strong>
                <?php
                $nb_stars = intval( get_post_meta( get_the_ID(), 'show_rating', true ) );
                for ( $star_counter = 1; $star_counter <= 5; $star_counter++ ) {
                    if ( $star_counter <= $nb_stars ) {
                        echo '<img src="' . plugins_url( 'show-Reviews/images/icon.png' ) . '" />';
                    } else {
                        echo '<img src="' . plugins_url( 'show-Reviews/images/grey.png' ). '" />';
                    }
                }
                ?>
	          </header>
			  <!-- контент -->
	          <div class="entry-content">
	               <?php the_content(); ?>
              </div>
	          <hr/>
	     </article>
   </div>
</div>
<?php wp_reset_query(); ?>
<?php get_footer(); ?>


