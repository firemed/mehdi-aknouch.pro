<?php
/** Candy Social Block
 * Requires the Candy Social Widget Plugin <http://wordpress.org/extend/plugins/candy-social-widget/>
 */
if(!class_exists('AQ_Social_Block')) {
	class AQ_Social_Block extends AQ_Block {
		
		//main vars
		var $services = array();
		var $before_list = '<div class="candy-social-icons"><ul class="candy-clearfix">';
		var $after_list = '</ul></div>';
		var $before_item = '<li class="candy-social-%s">';
		var $after_item = '</li>';
		
		function __construct() {
			$block_options = array(
				'name' => 'Social Icons',
				'size' => 'span4'
			);
			
			$default_services = array( 
				'twitter' => __( 'Twitter' ,'contempo'), 
				'facebook' => __( 'Facebook' ,'contempo'),
				'google-plus' => __( 'Google-Plus' ,'contempo'),
				'dribbble' => __( 'Dribbble' ,'contempo'),
				'delicious' => __( 'Delicious' ,'contempo'), 
				'wordpress' => __( 'WordPress' ,'contempo'),
				'myspace' => __( 'MySpace' ,'contempo'),
				'paypal' => __( 'PayPal' ,'contempo'),
				'tumblr' => __( 'Tumblr' ,'contempo'),
				'flickr' => __( 'Flickr' ,'contempo'),
				'instagram' => __( 'Instagram' ,'contempo'),
				'picasa' => __( 'Picasa' ,'contempo'),
				'github' => __( 'Github' ,'contempo'),
				'vimeo' => __( 'Vimeo' ,'contempo'),
				'youtube' => __( 'YouTube' ,'contempo'),
				'yahoo' => __( 'Yahoo' ,'contempo'),
				'yelp' => __( 'Yelp' ,'contempo'),
				'virb' => __( 'Virb' ,'contempo'),
				'skype' => __( 'Skype' ,'contempo'),
				'spotify' => __( 'Spotify' ,'contempo'),
				'soundcloud' => __( 'Soundcloud' ,'contempo'), 
				'github' => __( 'Github' ,'contempo'),
				'pinterest' => __( 'Pinterest' ,'contempo'),
				'lastfm' => __( 'LastFM' ,'contempo'),
				'foursquare' => __( 'Foursquare' ,'contempo'),
				'linkedin' => __( 'LinkedIn' ,'contempo'),
				'forrst' => __( 'Forrst' ,'contempo'), 
				'rss' => __( 'RSS' ,'contempo')
			);
			
			//apply filters
			$this->services = apply_filters( 'candy-social-icons-services', $default_services );
			$this->before_list = apply_filters( 'candy-social-icons-before-list', $this->before_list );
			$this->after_list = apply_filters( 'candy-social-icons-after-list', $this->after_list );
			$this->before_item = apply_filters( 'candy-social-icons-before-item', $this->before_item );
			$this->after_item = apply_filters( 'candy-social-icons-after-item', $this->after_item );
			
			parent::__construct('aq_social_block', $block_options);
		}
		
		function form($instance) {
			
			$icon_size = isset( $instance['icon_size'] ) ? esc_attr( $instance['icon_size'] ) : '';
			
			if(!is_plugin_active( 'candy-social-widget/candy-social.php')) {
				echo __('Sorry, this block requires the <a href="http://wordpress.org/extend/plugins/candy-social-widget/">Candy Social Widget</a> plugin to be installed & activated. Please install/activate the plugin before using this block', 'framework');
				return false;
			}
			
			$defaults = array_fill_keys( array_merge( array_keys( $this->services ), array( 'title' ) ), null );
			$instance = wp_parse_args( (array)$instance, $defaults );
			
			?>
			<p class="description">
				<label for="<?php echo $this->get_field_id( 'title' ) ?>">
					<?php _e( 'Title (optional)' ,'contempo' ) ?><br/>
	    			<input type="text" class="widefat" name="<?php echo $this->get_field_name( 'title' ) ?>" id="<?php echo $this->get_field_id( 'title' ) ?>" value="<?php echo $instance['title'] ?>"/>
	    		</label>
	    	</p>
			<?php
			
			foreach( $this->services as $s=>$n ) {
				?>
				<p class="description">
					<label for="<?php echo $this->get_field_id( $s ) ?>">
						<?php echo $n ?><br/>
		    			<input type="url" class="widefat" name="<?php echo $this->get_field_name( $s ) ?>" id="<?php echo $this->get_field_id( $s ) ?>" value="<?php echo esc_attr( $instance[$s] ) ?>"/>
		    		</label>
		    	</p>
				<?php
			} ?>
			
			<p>
				<label for="<?php echo $this->get_field_id('icon_size'); ?>"><?php _e('Size:', 'contempo'); ?></label> 
				<select id="<?php echo $this->get_field_id('icon_size'); ?>" name="<?php echo $this->get_field_name('icon_size'); ?>">
					<option value="16px"<?php if($icon_size == '16px') echo ' selected="selected"'; ?>>16px</option>
					<option value="24px"<?php if($icon_size == '24px') echo ' selected="selected"'; ?>>24px</option>
					<option value="32px"<?php if($icon_size == '32px') echo ' selected="selected"'; ?>>32px</option>
				</select>
			</p>
			
		<?php }
		
		function block($instance) {
			extract($instance);
			
			$links 	= array();
			foreach( $this->services as $s=>$n ) {
				$links[$s] = esc_url( $instance[$s] );
			}
			
			$links = array_filter( $links );
			
			if( empty( $links ) )
				return false; //don't return anything if there aren't any social links added
			
			if($title) echo '<h4 class="aq-block-title">'.strip_tags($title).'</h4>';
			
			echo $this->before_list;
			foreach( $links as $s=>$link ) {
				printf( $this->before_item, esc_attr( $s ) );
				echo '<a href="' . $link . '" title="' . $this->services[$s] . '"><img src="'. get_template_directory_uri() . '/images/ct-social/'. $icon_size .'/' . strtolower ($this->services[$s]) .'.png" alt="' . $this->services[$s] . '" /></a>';
				echo $this->after_item;
			}
			echo $this->after_list;
			
		}
	}
}