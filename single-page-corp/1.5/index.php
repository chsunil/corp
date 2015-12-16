<?php get_header(); ?>
 

  <?php $basic = get_option('wedevs_basics');
  // var_dump ( $basic);
   if ( $basic['about_us'] == "on")
   { ?>
            <div class="about">
  <div class="container">
  <div class="col-md-12 sect-headr">
  <h2>  <?php  echo $basic['ab_title']; ?></h2>
  </div>
    <div class="clearfix"></div>
    <div class="about-text">
     <?php print_r ($basic['wysiwyg'] )?>
    </div><!--about text-->   
    <?php } ?>
  </div><!--container-->
  
 </div>
			<?php if ( $basic['Portfolio'] == "on"){	?>
<div class="projects">
  <div class="container">
    <div class="col-md-12 sect-headr">
     <h2> <?php  echo $basic['portfolio_title']; ?></h2>
    </div><!--section header-->
    <div class="clearfix"></div>
   <div class="row"> 
   <?php  echo recentPosts(); ?>
   </div><!--row--> 
  </div><!--container-->
 </div> <!-- projects -->
<?php } ?>
<?php if ( $basic['GoogleMap'] == "on"){	
$lang= $basic['lang'];
$lat= $basic['lat']; ?>
 <div>
 
<style type="text/css">
#map-canvas {
	
	width:    100%;
	height:   500px;
	
}
</style>

<div id="map-canvas"></div><!-- #map-canvas -->

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&signed_in=true"></script>

<script type="text/javascript">
google.maps.event.addDomListener( window, 'load', gmaps_results_initialize );
/**
 * Renders a Google Maps centered on Atlanta, Georgia. This is done by using
 * the Latitude and Longitude for the city.
 *
 * Getting the coordinates of a city can easily be done using the tool availabled
 * at: http://www.latlong.net
 *
 * @since    1.0.0
 */
function gmaps_results_initialize() {
	var map = new google.maps.Map( document.getElementById( 'map-canvas' ), {
		zoom:           7,
		center:         new google.maps.LatLng( <?php echo $lat;?>, <?php echo $lang;?> ),
	});
}
google.maps.event.addDomListener( window, 'load', gmaps_results_initialize );
/**
 * Renders a Google Maps centered on Atlanta, Georgia. This is done by using
 * the Latitude and Longitude for the city.
 *
 * Getting the coordinates of a city can easily be done using the tool availabled
 * at: http://www.latlong.net
 *
 * @since    1.0.0
 */
function gmaps_results_initialize() {

	if ( null === document.getElementById( 'map-canvas' ) ) {
		return;
	}

	var map, marker;

	map = new google.maps.Map( document.getElementById( 'map-canvas' ), {

		zoom:           <?php echo $basic['Zoom'];?>,
		center:         new google.maps.LatLng( <?php echo $lat;?>, <?php echo $lang;?> ),

	});

	// Place a marker in Atlanta
	marker = new google.maps.Marker({

		position: new google.maps.LatLng(  <?php echo $lat;?>, <?php echo $lang;?> ),
		map:      map

	});

	}
</script>


</div>
<?php } ?>
<?php get_footer(); ?>