<div class="wrap" id="of_container">

	<div id="of-popup-save" class="of-save-popup">
		<div class="of-save-save">Options Updated</div>
	</div>
	
	<div id="of-popup-reset" class="of-save-popup">
		<div class="of-save-reset">Options Reset</div>
	</div>
	
	<div id="of-popup-fail" class="of-save-popup">
		<div class="of-save-fail">Error!</div>
	</div>
	
	<span style="display: none;" id="hooks"><?php echo json_encode(of_get_header_classes_array()); ?></span>
	<input type="hidden" id="reset" value="<?php if(isset($_REQUEST['reset'])) echo $_REQUEST['reset']; ?>" />
	<input type="hidden" id="security" name="security" value="<?php echo wp_create_nonce('of_ajax_nonce'); ?>" />

	<form id="of_form" method="post" action="<?php echo esc_attr( $_SERVER['REQUEST_URI'] ) ?>" enctype="multipart/form-data" >
    
        <h2 style="display: none;"></h2>
	
		<div id="header">
		
			<div class="logo">
                <h2>
					<?php
                    global $ct_options;
					$theme_data = wp_get_theme();
                    if($ct_options['ct_custom_framework_name']) {
                        echo $ct_options['ct_custom_framework_name'];
                    } else {
                        echo $theme_data;
                    } ?>
                    <span><?php echo $theme_data['Version']; ?></span>
                </h2>
			</div>
		
			<div id="js-warning">Warning- This options panel will not work properly without javascript!</div>
			<div class="icon-option"></div>
			<div class="clear"></div>
		
    	</div>

		<div id="info_bar">
			<?php
                $name = wp_get_theme();
				$theme_name = str_replace(" ","_",$name);
            ?>
            <ul>
                <li><a href="http://wp.contempographicdesign.com/wp_<?php echo strtolower(substr($theme_name,3,100)); ?>/changelog" target="_blank">View Changelog</a></li>
                <li><a href="http://wp.contempographicdesign.com/wp_<?php echo strtolower(substr($theme_name,3,100)); ?>/help_documentation" target="_blank">View Theme Documentation</a></li>
            </ul>
						
			<img style="display:none" src="<?php echo ADMIN_DIR; ?>assets/images/loading-bottom.gif" class="ajax-loading-img ajax-loading-img-bottom" alt="Working..." />

			<button id="of_save" type="button" class="button-primary">
				<?php _e('Save All Changes', 'contempo');?>
			</button>
			
		</div><!--.info_bar--> 	
		
		<div id="main">
		
			<div id="of-nav">
				<ul>
				  <?php echo $options_machine->Menu ?>
				</ul>
			</div>

			<div id="content">
		  		<?php echo $options_machine->Inputs /* Settings */ ?>
		  	</div>
		  	
			<div class="clear"></div>
			
		</div>
		
		<div class="save_bar"> 
		
			<img style="display:none" src="<?php echo ADMIN_DIR; ?>assets/images/loading-bottom.gif" class="ajax-loading-img ajax-loading-img-bottom" alt="Working..." />
			<button id ="of_save" type="button" class="button-primary"><?php _e('Save All Changes', 'contempo');?></button>			
			<button id ="of_reset" type="button" class="button submit-button reset-button" ><?php _e('Options Reset', 'contempo');?></button>
			<img style="display:none" src="<?php echo ADMIN_DIR; ?>assets/images/loading-bottom.gif" class="ajax-reset-loading-img ajax-loading-img-bottom" alt="Working..." />
			
		</div><!--.save_bar--> 
 
	</form>
	
	<div style="clear:both;"></div>

</div><!--wrap-->