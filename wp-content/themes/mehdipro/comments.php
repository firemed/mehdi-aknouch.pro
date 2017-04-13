<?php
/**
 * Comments Template
 *
 * @package WP Longshore
 * @subpackage Template
 */

	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', 'contempo'); ?></p>
	<?php
		return;
	}
?>

<div id="comments-template">

	<div class="comments-wrap">

		<div id="comments">

			<?php if ( have_comments() ) : ?>
				
				<h4 id="comments-number" class="comments-header"><?php comments_number( __('No Responses', 'contempo'), __('1 Comment', 'contempo'), __( '% Comments', 'contempo') );?></h4>

				<ol class="comment-list">
					<?php wp_list_comments('avatar_size=100'); ?>
				</ol>
                
                <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
                <nav id="comment-nav">
                    <div class="nav-previous left"><?php previous_comments_link( __( '&larr; Older Comments', 'contempo' ) ); ?></div>
                    <div class="nav-next right"><?php next_comments_link( __( 'Newer Comments &rarr;', 'contempo' ) ); ?></div>
                </nav>
                <?php endif; ?>

		<?php else : ?>

			<?php if ( pings_open() && !comments_open() ) : ?>

				<p class="comments-closed pings-open"><?php _e('Comments are closed, but', 'contempo'); ?> <a href="%1$s" title="<?php _e('Trackback URL for this post', 'contempo'); ?>"><?php _e('trackbacks', 'contempo'); ?></a> <?php _e('and pingbacks are open.', 'contempo'); ?></p>

			<?php elseif ( !comments_open() ) : ?>

				<p class="nocomments"><?php _e('Comments are closed.', 'contempo'); ?></p>

			<?php endif; ?>

		<?php endif; ?>

		</div>

		<?php comment_form(); ?>

	</div>

</div>