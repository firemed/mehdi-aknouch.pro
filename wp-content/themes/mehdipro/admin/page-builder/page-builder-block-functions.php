<?php

/** Get coordinates and save as transient
 * http://pippinsplugins.com/simple-google-maps-short-code */
function aq_get_map_coordinates($address, $force_refresh = false) {
	$address_hash = md5( $address );
	
    $coordinates = get_transient( $address_hash );

    if ($force_refresh || $coordinates === false) {
    	
    	$url 		= 'http://maps.google.com/maps/geo?q=' . urlencode($address) . '&output=xml';
     	$response 	= wp_remote_get( $url );

     	if( is_wp_error( $response ) )
     		return;

     	$xml = wp_remote_retrieve_body( $response );

     	if( is_wp_error( $xml ) )
     		return;

		if ( $response['response']['code'] == 200 ) {

			$data = new SimpleXMLElement( $xml );

			if ( $data->Response->Status->code == 200 ) {

			  	$coordinates = $data->Response->Placemark->Point->coordinates;

			  	//Placemark->Point->coordinates;
			  	$coordinates 			= explode(',', $coordinates[0]);
			  	$cache_value['lat'] 	= $coordinates[1];
			  	$cache_value['lng'] 	= $coordinates[0];
			  	$cache_value['address'] = (string) $data->Response->Placemark->address[0];

			  	// cache coordinates for 3 months
			  	set_transient($address_hash, $cache_value, 3600*24*30*3);
			  	$data = $cache_value;

			} elseif ($data->Response->Status->code == 602) {
			  	return sprintf( __( 'Unable to parse entered address. API response code: %s', 'pw-maps' ), @$data->Response->Status->code );
			} else {
			   	return sprintf( __( 'XML parsing error. Please try again later. API response code: %s', 'pw-maps' ), @$data->Response->Status->code );
			}

		} else {
		 	return __( 'Unable to contact Google API service.', 'pw-maps' );
		}

    } else {
       // return cached results
       $data = $coordinates;
    }

    return $data;
}

/*-----------------------------------------------------------------------------------*/
/*	Get porfolio image and column sizes
/*-----------------------------------------------------------------------------------*/
function aq_get_items_column_size($column) {
	$size_arr = array();
	switch ($column) {
		case 'items-4-col':
			$size_arr = array (
					'img_width' => 380,
					'img_height' => 239 
				);
			break;
		case 'items-3-col':
			$size_arr = array (
					'img_width' => 380,
					'img_height' => 239 
				);
			break;
		case 'items-2-col':
			$size_arr = array (
					'img_width' => 455,
					'img_height' => 280 
				);
			break;
		}
	return $size_arr;	
}

?>