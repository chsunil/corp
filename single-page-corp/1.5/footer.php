<footer class="ftbg">
  <div class="container">
   <div class="row">
    <div class="col-md-4 copy col-sm-6">
     <p>
          <?php if ( function_exists( 'ot_get_option' ) ) {
				  $copy = ot_get_option( 'copy' );
				}
				echo $copy;
			?></p>
    </div><!--copy-->
    
                
    <div class="col-md-6 ftnav col-md-offset-1 col-sm-6">
     <?php
				$defaults = array(
					'theme_location'  => '',
					'menu'            => 'Footer Menu',
					'container'       => 'div',
					'container_class' => '',
					'container_id'    => '',
					'menu_class'      => '',
					'menu_id'         => '',
					'echo'            => true,
					'fallback_cb'     => 'wp_page_menu',
					'before'          => '',
					'after'           => '',
					'link_before'     => '',
					'link_after'      => '',
					'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					'depth'           => 0,
					'walker'          => ''
				);
				wp_nav_menu( $defaults ); ?> 
     <!--<ul>
      <li><a onClick="$('.slidr').animatescroll({scrollSpeed:2000, padding:80});" href="#">Home</a></li>
      <li><a onClick="$('.about').animatescroll({scrollSpeed:2000, padding:80});" href="#about">About Us</a></li>
      <li><a onClick="$('.service').animatescroll({scrollSpeed:2000, padding:80});" href="#service">Services</a></li>
      <li><a onClick="$('.projects').animatescroll({scrollSpeed:2000, padding:80});" href="#projects">Projects</a></li>
      <li><a onClick="$('.contact').animatescroll({scrollSpeed:2000, padding:80});" href="#contact">Contact</a></li>
     </ul>-->
    </div><!--ftnav-->
    <div class="col-md-1 ftsocs p0 hidden-sm">
     <ul>
    <?php // Loop for Social Links 

                    if (function_exists('ot_get_option')) {

                        /* get the option array */
                        $links = ot_get_option('social', array());
						//var_dump($links);

                        if (!empty($links)) {
                            foreach ($links as $link) {

       echo '<li><a href="' . $link['href'] . '" title="'.$link['title'].'"/> <i class="fa fa-'. mb_strtolower($link['title']) .'"> </i> </a></li>';

                            }
                        }
                    }	

         ?>
     
     </ul>
    </div><!--ftsocs-->
   </div><!--row-->
  </div><!--container-->
 </footer> 
</div><!--container fluid-->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="<?php echo esc_url( get_template_directory_uri() ) ?>/js/bootstrap.min.js"></script>
    <?php wp_footer(); ?>
  </body>
</html>