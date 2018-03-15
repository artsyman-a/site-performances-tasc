<?php
 /*Template Name: 4last_single_show
 */
get_header(); ?>
<?php $mypost = array( 'post_type' => 'show_reviews', );
      $loop = new WP_Query( $mypost );  ?>
<div class="row">
<div class="col-md-3">
	<div class="h33">
<div id="primary">
    <div id="content" role="main">
	  <!-- цикл 4 -->
      <?php $k==0; while ( $loop->have_posts() && $k<=0) : $loop->the_post(); ?>
          <article id="post-<?php the_ID(); ?>" <?php post_class();  ?>>
	          <header class="entry-header">
                <!-- картинка -->
                 <div style="float: top; margin: 10px">
                   <?php the_post_thumbnail( array( 100, 100 ) ); ?>
                 </div>
				 <!--  цена и дата -->
				 <big><?php echo esc_html( get_post_meta( get_the_ID(), 'show_price', true ) ); ?></big>
                 <big><?php echo esc_html( get_post_meta( get_the_ID(), 'show_date', true ) ); ?></big>
				 <?php echo '<img src="/wp-content/themes/new_unite/images/111.png" />'; ?>
                 <br />
	              <?php the_content(); ?>	
				 <strong>Title: </strong><?php the_title(); ?><br />
				  <?php echo '<img src="/wp-content/themes/new_unite/images/122.png" />'; ?>
                 <strong>Genre: </strong>
                <?php  
				the_terms( $post->ID, 'show_reviews_show_genre' ,  ' ' );
                $k++;?>
                <br />
				  <?php echo '<img src="/wp-content/themes/new_unite/images/121.png" />'; ?>
				  <strong>Place: </strong>
                <?php the_terms( $post->ID, 'show_reviews_show_place' ,  ' ' );?>
                 <br />
	          </header>
			  <!-- контент -->
	          <div class="entry-content">
	               <?php the_content(); ?>
              </div>
	          <hr/>
	     </article>
   <?php endwhile;  ?>
   </div>
</div>
</div>
</div>
	<div class="col-md-3">
		<div class="h33">
<div id="primary">	
    <div id="content" role="main">     

      <?php $k==1; while ( $loop->have_posts() && $k<=1) : $loop->the_post(); ?>
          <article id="post-<?php the_ID(); ?>" <?php post_class();  ?>>
	          <header class="entry-header">
                <!-- картинка -->
                 <div style="float: top; margin: 10px">
                   <?php the_post_thumbnail( array( 100, 100 ) ); ?>
                 </div>
				 <!-- цена и дата -->
                 <big><?php echo esc_html( get_post_meta( get_the_ID(), 'show_price', true ) ); ?></big>
                 <big><?php echo esc_html( get_post_meta( get_the_ID(), 'show_date', true ) ); ?></big>
				 <?php echo '<img src="/wp-content/themes/new_unite/images/112.png" />'; ?>
                 <br />
	              <?php the_content(); ?>	
				 <strong>Title: </strong><?php the_title(); ?><br />
				  <?php echo '<img src="/wp-content/themes/new_unite/images/122.png" />'; ?>
                 <strong>Genre: </strong>
                <?php  
				the_terms( $post->ID, 'show_reviews_show_genre' ,  ' ' );
                $k++;?>
                <br />
				  <?php echo '<img src="/wp-content/themes/new_unite/images/121.png" />'; ?>
				  <strong>Place: </strong>
                <?php the_terms( $post->ID, 'show_reviews_show_place' ,  ' ' );?>
                 <br />
	          </header>
			  <!-- контент -->
	          <div class="entry-content">
	               <?php the_content(); ?>
              </div>
	          <hr/>
	     </article>
   <?php endwhile;  ?>
   </div>
</div>
</div>
</div>
	</div>
<div class="row">
<div class="col-md-3">
	<div class="h33">
<div id="primary">
    <div id="content" role="main">
	  <!-- цикл 4 -->
      <?php $k==2; while ( $loop->have_posts() && $k<=2) : $loop->the_post(); ?>
          <article id="post-<?php the_ID(); ?>" <?php post_class();  ?>>
	          <header class="entry-header">
                <!-- картинка -->
                 <div style="float: top; margin: 10px">
                   <?php the_post_thumbnail( array( 100, 100 ) ); ?>
                 </div>
				 <!-- цена и дата -->
                 <big><?php echo esc_html( get_post_meta( get_the_ID(), 'show_price', true ) ); ?></big>
                 <big><?php echo esc_html( get_post_meta( get_the_ID(), 'show_date', true ) ); ?></big>
				 <?php echo '<img src="/wp-content/themes/new_unite/images/113.png" />'; ?>
                 <br />
	              <?php the_content(); ?>	
				 <strong>Title: </strong><?php the_title(); ?><br />
				  <?php echo '<img src="/wp-content/themes/new_unite/images/122.png" />'; ?>
                 <strong>Genre: </strong>
                <?php  
				the_terms( $post->ID, 'show_reviews_show_genre' ,  ' ' );
                $k++;?>
                <br />
				  <?php echo '<img src="/wp-content/themes/new_unite/images/121.png" />'; ?>
				  <strong>Place: </strong>
                <?php the_terms( $post->ID, 'show_reviews_show_place' ,  ' ' );?>
                 <br />
	          </header>
			  <!-- контент -->
	          <div class="entry-content">
	               <?php the_content(); ?>
              </div>
	          <hr/>
	     </article>
   <?php endwhile;  ?>
   </div>
</div>
</div>
	</div>
	<div class="col-md-3">
		<div class="h33">
<div id="primary">
    <div id="content" role="main">     

      <?php $k==3; while ( $loop->have_posts() && $k<=3) : $loop->the_post(); ?>
          <article id="post-<?php the_ID(); ?>" <?php post_class();  ?>>
	          <header class="entry-header">
                <!-- картинка -->
                 <div style="float: top; margin: 10px">
                   <?php the_post_thumbnail( array( 100, 100 ) ); ?>
                 </div>
				 <!-- цена и дата -->
                 <big><?php echo esc_html( get_post_meta( get_the_ID(), 'show_price', true ) ); ?></big>
                 <big><?php echo esc_html( get_post_meta( get_the_ID(), 'show_date', true ) ); ?></big>
				 <?php echo '<img src="/wp-content/themes/new_unite/images/114.png" />'; ?>
                 <br />
	              <?php the_content(); ?>	
				 <strong>Title: </strong><?php the_title(); ?><br />
				  <?php echo '<img src="/wp-content/themes/new_unite/images/122.png" />'; ?>
                 <strong>Genre: </strong>
                <?php  
				the_terms( $post->ID, 'show_reviews_show_genre' ,  ' ' );
                $k++;?>
                <br />
				  <?php echo '<img src="/wp-content/themes/new_unite/images/121.png" />'; ?>
				  <strong>Place: </strong>
                <?php the_terms( $post->ID, 'show_reviews_show_place' ,  ' ' );?>
                 <br />
	          </header>
			  <!-- контент -->
	          <div class="entry-content">
	               <?php the_content(); ?>
              </div>
	          <hr/>
	     </article>
   <?php endwhile;  ?>
   </div>
</div>
</div>
	</div>
	</div>

<?php wp_reset_query(); ?>
<?php get_footer(); ?>


