<?php
/** Googlemap block **/

if(!class_exists('AQ_Googlemap_Block')) {
	class AQ_Googlemap_Block extends AQ_Block {
		
		//set and create block
		function __construct() {
			$block_options = array(
				'name' => 'Googlemap',
				'size' => 'span6',
			);
			
			//create the block
			parent::__construct('aq_googlemap_block', $block_options);
		}
		
		function form($instance) {
			
			$defaults = array(
				'text' => '',
				'coordinates' => '',
				'height' => '',
				'zoom' => 8,
			);
			$instance = wp_parse_args($instance, $defaults);
			extract($instance);
			
			?>
			
			<p class="description half">
				<label for="<?php echo $this->get_field_id('title') ?>">
					Title (optional)<br/>
					<?php echo aq_field_input('title', $block_id, $title) ?>
				</label>
			</p>
			<p class="description half">
				<label for="<?php echo $this->get_field_id('coordinates') ?>">
					Coordinates (optional) e.g. "3.82497,103.32390"<br/>
					<?php echo aq_field_input('coordinates', $block_id, $coordinates) ?>
				</label>
			</p>
			<p class="description fourth">
				<label for="<?php echo $this->get_field_id('coordinates') ?>">
					Zoom Level<br/>
					<?php echo aq_field_input('zoom', $block_id, $zoom, 'min', 'number') ?>
				</label>
			</p>
			<p class="description fourth last">
				<label for="<?php echo $this->get_field_id('height') ?>">
					Map height, in pixels.<br/>
					<?php echo aq_field_input('height', $block_id, $height, 'min', 'number') ?> &nbsp; px
				</label>
			</p>
			
			<?php
			
		}
		
		function block($instance) {
			$defaults = array(
				'text' => '',
				'coordinates' => '',
				'height' => 350,
				'zoom' => 8,
			);
			$instance = wp_parse_args($instance, $defaults);
			extract($instance);
			
			wp_enqueue_script('googlemap');
			
			if(!$coordinates) {
				$coordinates = aq_get_map_coordinates($address);
				if(is_array($coordinates)) {
					$coordinates = $coordinates['lat'] .','. $coordinates['lng'];
				} else {
					echo $coordinates;
					return false;
				}
			} ?>
            
            <script>
			function setMapAddress(address) {
				var geocoder = new google.maps.Geocoder();
				geocoder.geocode( { address : address }, function( results, status ) {
					if( status == google.maps.GeocoderStatus.OK ) {
						var location = results[0].geometry.location;
						var options = {
							zoom: 15,
							center: location,
							mapTypeId: google.maps.MapTypeId.ROADMAP, 
							streetViewControl: true
						};
						var mymap = new google.maps.Map( document.getElementById( 'map' ), options );   
						var marker = new google.maps.Marker({
							map: mymap, 
							draggable: false,
							flat: true,  
							position: results[0].geometry.location
						});		
					}
				});
			}
			setMapAddress( "<?php echo $coordinates ?>" );
			</script>
			<div id="map" style="height: <?php echo $height ?>px"></div>
		<?php }
		
	}
}