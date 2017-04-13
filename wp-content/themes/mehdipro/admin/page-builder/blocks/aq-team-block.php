<?php
/** A simple text block **/
if(!class_exists('AQ_Team_Block')) {
	class AQ_Team_Block extends AQ_Block {
		
		/* PHP5 constructor */
		function __construct() {
			
			$block_options = array(
				'name' => 'Teams',
				'size' => 'span3',
				'resizable' => 0,
			);
			
			//create the widget
			parent::__construct('AQ_Team_Block', $block_options);
			
		}
		
		function form($instance) {
			
			$defaults = array(
				'avatar' => '',
				'text' => '',
				'social' => array (
					'twitter' => '',
					'facebook' => '',
					'googleplus' => '',
					'linkedin' => '',
				)
			);
			
			$instance = wp_parse_args($instance, $defaults);
			extract($instance);
			
			?>
			<p class="description">
				<label for="<?php echo $this->get_field_id('title') ?>">
					Member Name (required)
					<input id="<?php echo $this->get_field_id('title') ?>" class="input-full" type="text" value="<?php echo $title ?>" name="<?php echo $this->get_field_name('title') ?>">
				</label>
			</p>
			
			<p class="description">
				
			</p>
			
			<p class="description">
				<label for="<?php echo $this->get_field_id('text') ?>">
					Member biography
					<textarea id="<?php echo $this->get_field_id('text') ?>" class="textarea-full" name="<?php echo $this->get_field_name('text') ?>" rows="5"><?php echo $text ?></textarea>
				</label>
			</p>
			
			<p class="description">
				Social Links
				<?php foreach ($defaults['social'] as $key=>$social) {
					echo '';
				}
				?>
				
			</p>
			
			<?php
		}
		
		function block($instance) {
			extract($instance);
			echo 'oh u pirate u';
		}
		
	}
}