<?php
/** Slider Block **/
if(!class_exists('AQ_Slider_Block')) {
	class AQ_Slider_Block extends AQ_Block {
	
		function __construct() {
			$block_options = array(
				'name'			=> 'Slider',
				'size'			=> 'span12',
			);
			
			parent::__construct('aq_slider_block', $block_options);
			
			add_action('wp_ajax_aq_block_slider_add_new', array($this, 'add_slide'));
		}
		
		function form($instance) {
			$defaults = array(
				'slides'		=> array(
					1 => array(
						'title' => 'My New Slide',
						'upload' => '',
						'caption' => '',
						'embed' => ''
					)
				),
				'slider'		=> '',
				'height'		=> 450,
				'crop' 			=> 1,
				'overflow'		=> 0,
			);
			$instance = wp_parse_args($instance, $defaults);
			extract($instance);
			
			?>
			<div class="description cf">
				<ul id="sortable-list-<?php echo $block_id ?>" class="aq-sortable-list" rel="<?php echo $block_id ?>">
					<?php
					$slides = is_array($slides) ? $slides : $defaults['slides'];
					$count = 1;
					foreach($slides as $slide) {	
						$this->slide($slide, $count);
						$count++;
					}
					?>
				</ul>
				<p></p>
				<a href="#" rel="slider" class="aq-sortable-add-new button">Add New</a>
				<p></p>
			</div>
			
			<p class="description half">
				<label for="<?php echo $this->get_field_id('height') ?>">
					Slider Height (Optional)<br/>
					<?php echo aq_field_input('height', $block_id, $height, $size = 'min', 'number') ?>
				</label>
			</p>
			<p class="description half last">
				<label for="<?php echo $this->get_field_id('crop') ?>">
					<?php echo aq_field_checkbox('crop', $block_id, $crop); ?>
					Check to crop image to the specified height
				</label>
			</p>
			<p class="description half">
				<label for="<?php echo $this->get_field_id('overflow') ?>">
					<?php echo aq_field_checkbox('overflow', $block_id, $overflow); ?>
					Check to make the slider go full width
				</label>
			</p>
			<?php
		}
		
		function slide($slide = array(), $count = 0) {
			
			$defaults = array (
				'title' => '',
				'upload' => '',
				'link' => '',
				'caption' => '',
				'embed' => '',
				'html' => ''
			);
			$slide = wp_parse_args($slide, $defaults);
			
			?>
			<li id="<?php echo $this->get_field_id('testimonials') ?>-sortable-item-<?php echo $count ?>" class="sortable-item" rel="<?php echo $count ?>">
				
				<div class="sortable-head cf">
					<div class="sortable-title">
						<strong><?php echo $slide['title'] ?></strong>
					</div>
					<div class="sortable-handle">
						<a href="#">Open / Close</a>
					</div>
				</div>
				
				<div class="sortable-body">
					<p class="description">
						<label for="<?php echo $this->get_field_id('slides') ?>-<?php echo $count ?>-title">
							Slide Title<br/>
							<input type="text" id="<?php echo $this->get_field_id('slides') ?>-<?php echo $count ?>-title" class="input-full" name="<?php echo $this->get_field_name('slides') ?>[<?php echo $count ?>][title]" value="<?php echo $slide['title'] ?>" />
						</label>
					</p>
					<p class="description">
						<label for="<?php echo $this->get_field_id('slides') ?>-<?php echo $count ?>-upload">
							Upload Image<br/>
							<input type="text" id="<?php echo $this->get_field_id('slides') ?>-<?php echo $count ?>-upload" class="input-full input-upload" value="<?php echo $slide['upload'] ?>" name="<?php echo $this->get_field_name('slides') ?>[<?php echo $count ?>][upload]">
							<a href="#" class="aq_upload_button button" rel="img">Upload</a>
							<p></p>
						</label>
					</p>
                    <p class="description">
						<label for="<?php echo $this->get_field_id('slides') ?>-<?php echo $count ?>-link">
							Slide Link<br/>
							<input type="text" id="<?php echo $this->get_field_id('slides') ?>-<?php echo $count ?>-link" class="input-full" name="<?php echo $this->get_field_name('slides') ?>[<?php echo $count ?>][link]" value="<?php echo $slide['link'] ?>" />
						</label>
					</p>
					<p class="description">
						<label for="<?php echo $this->get_field_id('slides') ?>-<?php echo $count ?>-caption">
							Slide Caption<br/>
							<textarea id="<?php echo $this->get_field_id('slides') ?>-<?php echo $count ?>-caption" class="textarea-full" name="<?php echo $this->get_field_name('slides') ?>[<?php echo $count ?>][caption]" rows="5"><?php echo $slide['caption'] ?></textarea>
						</label>
					</p>
					<p class="description">
						<label for="<?php echo $this->get_field_id('slides') ?>-<?php echo $count ?>-embed">
							Embed Code (optional, will override image)<br/>
							<textarea id="<?php echo $this->get_field_id('slides') ?>-<?php echo $count ?>-embed" class="textarea-full" name="<?php echo $this->get_field_name('slides') ?>[<?php echo $count ?>][embed]" rows="5"><?php echo $slide['embed'] ?></textarea>
						</label>
					</p>
					<p class="description">
						<label for="<?php echo $this->get_field_id('slides') ?>-<?php echo $count ?>-html">
							Custom HTML (optional, will override embed &amp; image)<br/>
							<textarea id="<?php echo $this->get_field_id('slides') ?>-<?php echo $count ?>-html" class="textarea-full" name="<?php echo $this->get_field_name('slides') ?>[<?php echo $count ?>][html]" rows="5"><?php echo $slide['html'] ?></textarea>
						</label>
					</p>
					<p class="description"><a href="#" class="sortable-delete">Delete</a></p>
				</div>
				
			</li>
			<?php
			
		}
		
		function add_slide() {
			$nonce = $_POST['security'];	
			if (! wp_verify_nonce($nonce, 'aqpb-settings-page-nonce') ) die('-1');
			
			$count = isset($_POST['count']) ? absint($_POST['count']) : false;
			$this->block_id = isset($_POST['block_id']) ? $_POST['block_id'] : 'aq-block-9999';
			
			//default key/value for the tab
			$slide = array(
				'title' => 'New Slide',
				'upload' => '',
				'link' => '',
				'caption' => '',
				'embed' => ''
			);
			
			if($count) {
				$this->slide($slide, $count);
			} else {
				die(-1);
			}
			
			die();
		}
		
		function block($instance) {
			
			extract($instance);
			
			wp_enqueue_script('flexslider');
			wp_enqueue_style('flexslider');
			$width = aq_get_column_width($size);
			$crop = $crop ? true : false;
			
			if($overflow && $size = 'span12') {
				$width = 1000;
			}
			
			$output = '';
			if($slides) {
				$rand = rand(1,100);
				
				$output .= '<div id="post-slider-'. $rand .'" class="post-slider post-slider-'.$rand.' cf">';
					
					$output .= '<div class="flexslider">';
						
						$output .= '<ul class="slides cf">';
						
						if ($slides) {
						
							foreach ($slides as $i=>$slide) {
							
								$output .= '<li class="slide cf slide-'.$i.'">';

										if(!empty($slide['embed'])) {
											
											$output .= '<div class="fitvids">';
												$output .= htmlspecialchars_decode(stripslashes($slide['embed']));
											$output .= '</div>';
											
										} elseif(!empty($slide['html'])) {
											
											$output .= '<div class="slide-html row cf">';
												$output .= do_shortcode(htmlspecialchars_decode(stripslashes($slide['html'])));
											$output .= '</div>';
											
											if(!empty($slide['upload'])) {
												$output .= '<style>';
													$output .= '.post-slider-'.$rand.' .slide-'.$i.'{';
														$output .= 'background:url('.$slide['upload'].');';
													$output .= '}';
												$output .= '</style>';
											}	
											
										} elseif(!empty($slide['upload'])) {

											if(($slide['link'])) {
												$output .= '<a href="'.$slide['link'].'">';
											}
										
												$image = aq_resize($slide['upload'], $width, $height, $crop);
												$output .= '<img src="'.$image.'"/>';

												if(($slide['title'])) {
													$output .= '<div class="flex-caption"><h1>'.$slide['title'].'</h1><p class="marB0">'.$slide['caption'].'</p></div>';
												}

											if(($slide['link'])) {
												$output .= '</a>';
											}
											
										}

									
									
								$output .= '</li>';
							}	
						}
						
						$output .= '</ul>';
						$output .= '<div class="flex-controls"></div>';
						
					$output .= '</div>';
					
				$output .= '</div>';
				
				if($overflow) $output .= '<style>#wrap .post-slider-'.$rand.'{width:'.$width.'px}</style>';
			}
			
			echo $output;
			
		}
		
		function update($new_instance, $old_instance) {
			$new_instance = aq_recursive_sanitize($new_instance);
			return $new_instance;
		}
		
		/* block header */
		function before_block($instance) {
			extract($instance);
			$column_class = $first ? 'aq-first' : '';
			
			$class = '';
			if($overflow && $size = 'span12') {
				$class = 'aq-block-'.$id_base.'-overflow';
			}
			
			echo '<div id="aq-block-'.$number.'" class="aq-block aq-block-'.$id_base.' aq_'.$size.' '.$column_class.' '.$class.' cf">';
		}
	
	}
}