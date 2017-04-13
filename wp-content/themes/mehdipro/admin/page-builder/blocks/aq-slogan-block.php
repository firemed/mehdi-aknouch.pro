<?php
/** A simple text block **/
if(!class_exists('AQ_Slogan_Block')) {
	class AQ_Slogan_Block extends AQ_Block {
		
		/* PHP5 constructor */
		function __construct() {
			
			$block_options = array(
				'name' => 'Slogan',
				'size' => 'span12',
				'resizable' => 0,
			);
			
			//create the widget
			parent::__construct('AQ_Slogan_Block', $block_options);
			
		}
		
		function form($instance) {
			
			$defaults = array(
				'text' => '',
			);
			$instance = wp_parse_args($instance, $defaults);
			extract($instance);
			
			?>
			<p class="description">
				<label for="<?php echo $this->get_field_id('title') ?>">
					Title (optional)
					<input id="<?php echo $this->get_field_id('title') ?>" class="input-full" type="text" value="<?php echo $title ?>" name="<?php echo $this->get_field_name('title') ?>">
				</label>
			</p>
			
			<p class="description">
				<label for="<?php echo $this->get_field_id('text') ?>">
					Content
					<textarea id="<?php echo $this->get_field_id('text') ?>" class="textarea-full" name="<?php echo $this->get_field_name('text') ?>" rows="5"><?php echo $text ?></textarea>
				</label>
			</p>
            
            <p class="description">
				<label for="<?php echo $this->get_field_id('btn_text') ?>">
					Button (Text)
					<input id="<?php echo $this->get_field_id('btn_text') ?>" class="input-full" type="text" value="<?php echo $btn_text ?>" name="<?php echo $this->get_field_name('btn_text') ?>">
				</label>
			</p>
            
            <p class="description">
				<label for="<?php echo $this->get_field_id('btn_url') ?>">
					Button (URL)
					<input id="<?php echo $this->get_field_id('btn_url') ?>" class="input-full" type="text" value="<?php echo $btn_url ?>" name="<?php echo $this->get_field_name('btn_url') ?>">
				</label>
			</p>
			<?php
		}
		
		function block($instance) {
			extract($instance);
			echo '<div class="container">';
				echo '<div class="cta-verbiage">';
					echo stripslashes(do_shortcode(htmlspecialchars_decode($text)));
					if($btn_text != '') {
						echo '<a class="btn" href="' . $btn_url . '">';
							echo $btn_text;
						echo '</a>';
					}
				echo '</div>';
			echo '</div>';
		}
		
	}
}