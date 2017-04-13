<?php
/**
 * Template Name: Contact
 *
 * @package Longshore
 * @subpackage Template
 */

$inside_page_title = get_post_meta($post->ID, "_ct_inside_page_title", true);
$address = $ct_options['ct_contact_map_location'];
$phone = $ct_options['ct_contact_phone'];
$email = $ct_options['ct_contact_email'];
$facebook = $ct_options['ct_fb_url'];
$twitter = $ct_options['ct_twitter_url'];

get_header();
	
	echo '<div class="main-content-inner">';

		echo '<div class="col span_12">';
			
			if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<!-- Article -->
				<article class="post row animated fadeInUpBig">

					<?php if($ct_options['ct_contact_map'] == "Yes") {
						contact_us_map();
					} ?>

					<!-- Inner Pad -->
				    <div class="inner-pad">

					    <?php if($inside_page_title == "Yes") { ?>
						    <!-- Post Header -->
							<header class="center marB20 marB30">
					            <h1 class="entry-title marT0"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
						    </header>
						    <!-- //Post Header -->
					    <?php } ?>

					    <!-- Post Content -->
					    <div class="content">
					        <?php the_content(); ?>
					    </div>
					    <!-- //Post Content -->

					    <!-- Contact Form -->
					    <div class="col span_8 first">
						    
						    <form id="contactform" class="formular marT20" method="post">
				                <fieldset>
				                    <div class="input-prepend">
				                        <label><?php _e('Name', 'contempo'); ?> <span>*</span></label>
				                        <input type="text" name="name" id="name" class="validate[required,custom[onlyLetter]] text-input" value="" />
				                    </div>
				                    
				                    <div class="input-prepend">
				                        <label><?php _e('Email', 'contempo'); ?> <span>*</span></label>
				                        <input type="text" name="email" id="email" class="validate[required,custom[email]] text-input" value="" />
				                    </div>                                
				                    
				                    <label><?php _e('Message', 'contempo'); ?> <span>*</span></label>
				                    <textarea class="validate[required,length[2,1000]] text-input" name="message" id="message" rows="10" cols="10"></textarea>
				                    
				                    <input type="hidden" id="ctyouremail" name="ctyouremail" value="<?php echo $ct_options['ct_contact_email']; ?>" />
				                    <input type="hidden" id="ctsubject" name="ctsubject" value="<?php echo stripslashes($ct_options['ct_contact_subject']); ?>" />
				                    
				                        <div class="clear"></div>
				                    
				                    <input type="submit" name="Submit" value="Submit" id="submit" class="btn" />  
				                </fieldset>
				            </form>

				        </div>
				        <!-- //Contact Form -->

					    <div id="sidebar" class="col span_4">
				            <div id="sidebar-inner" class="contact-details">
				                <ul>
				                    <?php if($address != '') { ?>
					                    <li><i class="icon-home left"></i> <p class="marB0"><?php echo $address; ?></p></li>
				                    <?php } ?>
				                    <?php if($phone != '') { ?>
					                    <li><i class="icon-phone left"></i> <p class="marB0"><?php echo $phone; ?></p></li>
				                    <?php } ?>
				                    <?php if($email != '') { ?>
					                    <li><i class="icon-envelope left"></i> <p class="marB0"><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></p></li>
				                    <?php } ?>
				                    <?php if($facebook != '') { ?>
					                    <li><i class="icon-facebook left"></i> <p class="marB0"><a href="<?php echo $facebook; ?>"><?php _e('Follow Us', 'contempo'); ?></a></p></li>
				                    <?php } ?>
				                    <?php if($twitter != '') { ?>
					                    <li><i class="icon-twitter left"></i> <p class="marB0"><a href="<?php echo $twitter; ?>"><?php _e('Follow Us', 'contempo'); ?></a></p></li>
				                    <?php } ?>
				                </ul>
				            </div>
				        </div>

					        <div class="clear"></div>

			        </div>
			        <!-- // Inner Pad -->

						    <div class="clear"></div>

				</article>
				<!-- //Article -->

				<?php endwhile; endif;

		echo '</div>';
		
		get_sidebar();
		
			echo '<div class="clear"></div>';
        
	echo '</div>';

get_footer(); ?> 