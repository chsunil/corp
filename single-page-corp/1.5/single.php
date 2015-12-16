
<?php get_header(); ?>

  <div class="container">
   <div id="post-<?php the_ID(); ?>" <?php post_class(); ?> class="col-md-9">
    <div class="col-md-12 sect-headr">
    <?php while ( have_posts() ) : the_post(); ?>
	 <h2><?php echo get_the_title(); ?></h2>
    </div><!--section header-->
    <div class="clearfix"></div>
    
 	 <div class="row"> 
      
   <?php the_content(); ?>
   <?php wp_link_pages( 'before=<p class="link-pages">Page: ' ); ?>

	<div class="nav-previous alignleft"><?php next_posts_link( 'Older posts' ); ?></div>
<div class="nav-next alignright"><?php previous_posts_link( 'Newer posts' ); ?></div>
	</div><!--container-->
 </div>
		
	
	<?php get_sidebar(); ?>
   
	</div><!-- .row -->
    	<?php endwhile; ?>
<?php get_footer(); ?>