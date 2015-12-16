
<?php 
// creating nav menu

function Corp_setup() {
register_nav_menus( array(
	'header_menu' => 'Header Menu',
	'footer_menu' => 'Footer Menu',
) );

// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 263, 177, true );
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );
}
add_action( 'after_setup_theme', 'Corp_setup' );
?>
<?php
// Register widget area.
function Sidebars() {
	register_sidebar(2, array(
		'name'          => __( 'Sidebar %d', 'single-page-corp' ),
		'id'            => 'Sidebar %d',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'single-page-corp' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) ,
	array(
				'name' => __( 'Sidebar %d', 'single-page-corp' ),
				'id' => 'Sidebar %d',
				'description' => __( 'Widgets in this area will be shown on Contact page.', 'single-page-corp' ),
				'before_widget' => '<li id="%1$s" class="widget %2$s">',
				'after_widget'  => '</li>',
				'before_title'  => '<h2 class="widgettitle">',
				'after_title'   => '</h2>',
			) );
}
add_action( 'widgets_init', 'Sidebars' );
?>

<?php
// recent post with thumbnail image
function recentPosts() {
	$rPosts = new WP_Query();
	$rPosts->query('showposts=4');
		while ($rPosts->have_posts()) : $rPosts->the_post(); ?>
			 <div class="col-md-3 prj-item col-sm-6">
              <a href="<?php the_permalink();?>">
			  <?php the_post_thumbnail('recent-thumbnails'); ?>
              <div class="info">
		      <i class="fa fa-plus"></i>
       		  <h5><?php the_title();?></h5>
       			<!--<h6> cats </h6>  -->
		      
			</div>
     </a>
    </div>	
		<?php endwhile; 
	wp_reset_query();
}
?>
  
<?php
// theme options page

 require get_template_directory() . '/options/plugin.php';
?>

<?php
function tags_after_single_post_content($content) {

if( is_singular('post') && is_main_query() ) {

$tags = the_tags('<div class="entry-meta">Tagged with: ','.','</div><br />'); 

$content .= $content . $tags;
    }
return $content;
}
add_filter( 'the_content', 'tags_after_single_post_content' );

?>
<?php
function theme_queue_js(){
if ( (!is_admin()) && is_singular() && comments_open() && get_option('thread_comments') )
  wp_enqueue_script( 'comment-reply' );
}
add_action('wp_print_scripts', 'theme_queue_js');
?>
<?php
if ( ! isset( $content_width ) ) $content_width = 900;
?>
<?php
$args = array(
	'width'         => 980,
	'height'        => 60,
	'default-image' => get_template_directory_uri() . '/img/header.jpg',
	'uploads'       => true,
);
add_theme_support( 'custom-header', $args );
?>
<?php
$args2 = array(
	'default-color' => '000000',
	'default-image' => '%1$s/img/about-bg.png',
);
add_theme_support( 'custom-background', $args2 );
?>
<?php

function my_theme_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'admin_init', 'my_theme_add_editor_styles' );
?>