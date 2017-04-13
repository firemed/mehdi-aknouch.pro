<?php
/* Image Block */
if(!class_exists('AQ_Team_Member_Block')) {
	class AQ_Team_Member_Block extends AQ_Block {
		
		function __construct() {
			$block_options = array(
				'name' => 'Team Member',
				'size' => 'span3',
			);
			
			//create the widget
			parent::__construct('AQ_Team_Member_Block', $block_options);
		}
		
		function form($instance) {
			$defaults = array(
				'img' => '',
			);
			$instance = wp_parse_args($instance, $defaults);
			extract($instance);
			
			?>
			<p class="description half">
				<label for="<?php echo $this->get_field_id('title') ?>">
					Title<br/>
					<?php echo aq_field_input('title', $block_id, $title) ?>
				</label>
			</p>
            <p class="description half">
				<label for="<?php echo $this->get_field_id('member_name') ?>">
					Name<br/>
					<?php echo aq_field_input('member_name', $block_id, $member_name) ?>
				</label>
			</p>
			<p class="description half">
				<label for="<?php echo $this->get_field_id('img') ?>">
					Upload an image<br/>
					<?php echo aq_field_upload('img', $block_id, $img) ?>
				</label>
				<?php if($img) { ?>
				<div class="screenshot">
					<img src="<?php echo $img ?>" />
				</div>
				<?php } ?>
			</p>
			<p class="description">
				<label for="<?php echo $this->get_field_id('description') ?>">
                    Description<br/>
					<?php echo aq_field_textarea('description', $block_id, $description) ?>
				</label>
			</p>
            <p class="description half">
				<label for="<?php echo $this->get_field_id('position') ?>">
					Title/Position<br/>
					<?php echo aq_field_input('position', $block_id, $position) ?>
				</label>
			</p>
            <p class="description half">
				<label for="<?php echo $this->get_field_id('facebook') ?>">
					Facebook<br/>
					<?php echo aq_field_input('facebook', $block_id, $facebook) ?>
				</label>
			</p>
            <p class="description half">
				<label for="<?php echo $this->get_field_id('twitter') ?>">
					Twitter<br/>
					<?php echo aq_field_input('twitter', $block_id, $twitter) ?>
				</label>
			</p>
            <p class="description half">
				<label for="<?php echo $this->get_field_id('linkedin') ?>">
					LinkedIn<br/>
					<?php echo aq_field_input('linkedin', $block_id, $linkedin) ?>
				</label>
			</p>
            <p class="description half">
				<label for="<?php echo $this->get_field_id('google') ?>">
					Google Plus<br/>
					<?php echo aq_field_input('google', $block_id, $google) ?>
				</label>
			</p>
			<?php
		}
		
		function block($instance) {
			extract($instance);
			$width = aq_get_column_width($size);
			?>
			<img class="aq-block-img" src="<?php echo aq_resize($img,960); ?>" />
			<?php echo '<div class="member-info">';
				if($name) echo '<h4 class="marT15 marB3"><strong>'.strip_tags($member_name).'</strong></h4>';
				if($position) echo '<h6 class="marB10">'.strip_tags($position).'</h6>';
				if($description) echo '<p>'.strip_tags($description).'</p>';
				echo '<ul class="marB0">';
					if($facebook) echo '<li class="facebook"><a href="'.strip_tags($facebook).'"><i class="icon-facebook"></i></a></li>';
					if($twitter) echo '<li class="twitter"><a href="'.strip_tags($twitter).'"><i class="icon-twitter"></i></a></li>';
					if($linkedin) echo '<li class="linkedin"><a href="'.strip_tags($linkedin).'"><i class="icon-linkedin"></i></a></li>';
					if($google) echo '<li class="google"><a href="'.strip_tags($google).'"><i class="icon-google-plus"></i></a></li>';				
				echo '</ul>';
			echo '</div>';
		}
		
		
	}
}