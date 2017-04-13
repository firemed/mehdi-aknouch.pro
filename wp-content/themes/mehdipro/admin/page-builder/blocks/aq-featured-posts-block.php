<?php
/** 
 * Featured Posts Block
 * List posts by category/tags/post_format
 * Orderby latest
 * @todo - allow featured images, layout options, post formats(currently post tags offer similar functionality)
*/
if(!class_exists('AQ_Featured_Posts_Block')) {
	class AQ_Featured_Posts_Block extends AQ_Block {
		
		function __construct() {
			$block_options = array(
				'name' => 'Featured Posts',
				'size' => 'span12',
				'categories' => array(),
				'tags' => array(),
				'postnum' => 5,
				'layout' => array(),
			);
			
			parent::__construct('aq_featured_posts_block', $block_options);
			add_filter('excerpt_more', array(&$this, 'excerpt_more'));
		}
		
		function form($instance) {
		
			extract($instance);
			
			$post_categories = ($temp = get_terms('category')) ? $temp : array();
			$categories_options = array();
			foreach($post_categories as $cat) {
				$categories_options[$cat->term_id] = $cat->name;
			}
			
			$post_tags = ($temp = get_terms('post_tag')) ? $temp : array();
			$tags_options = array();
			foreach($post_tags as $tag) {
				$tags_options[$tag->term_id] = $tag->name;
			}
			
			$yes_no = array('Yes', 'No');
			$columns = array( '1' => '1', '2' => '2', '3' => '3', '4' => '4', '6' => '6');
			
			$page_options = array(0 => "Select a page:");
			$pages_obj = get_pages('sort_column=post_parent,menu_order');    
			foreach ($pages_obj as $page_obj) {
				$page_options[$page_obj->ID] = $page_obj->post_title; 
			}
			
			?>
			<p class="description">
				<label for="<?php echo $this->get_field_id('title') ?>">
					Title (optional)<br/>
					<input id="<?php echo $this->get_field_id('title') ?>" class="input-full" type="text" value="<?php echo $title ?>" name="<?php echo $this->get_field_name('title') ?>">
				</label>
			</p>
			<p class="description half">
				<label for="<?php echo $this->get_field_id('categories') ?>">
				Posts Categories (leave empty to display all)<br/>
				<?php echo aq_field_multiselect('categories', $block_id, $categories_options, $categories); ?>
				</label>
			</p>
			<p class="description half last">
				<label for="<?php echo $this->get_field_id('types') ?>">
				Posts Tags (leave empty to display all)<br/>
				<?php echo aq_field_multiselect('tags', $block_id, $tags_options, $tags); ?>
				</label>
			</p>
            <p class="description half">
				<label for="<?php echo $this->get_field_id('layout') ?>">
				layout<br/>
				<?php echo aq_field_select('layout', $block_id, $columns, $layout); ?>
				</label>
			</p>
			<p class="description half">
				<label for="<?php echo $this->get_field_id('postnum') ?>">
				Maximum number of posts to display<br/>
				<?php echo aq_field_input('postnum', $block_id, $postnum, 'min', 'number') ?> &nbsp; posts
				</label>
			</p>
			<?php
			
		}
		
		function block($instance) {
			extract($instance);
			
			if($title) echo '<h6 class="aq-block-title">'.strip_tags($title).'</h6>';
			
			echo '<div class="aq-posts-block col span_12 first">';
					$args = array(
						'posts_per_page' => $postnum,
						'category__in' => $categories,
						'tag__in' => $tags
					);
					$query = new WP_Query($args);
					
					$i = 0; 
					$d = 1;
				
					while ( $query->have_posts() ) : $query->the_post();
					global $post;
						
						if($layout == '1') {
							
							echo '<div class="'.implode(', ', get_post_class()).' col span_12 featured-post marB30';
							if( $i%2 == 0 ) { echo ' first'; }
							echo '">';
								echo '<figure class="featured-img zoom">';
									echo '<a class="thumb" href="';
										the_permalink();
									echo '">';
										the_post_thumbnail('large');   
									echo '</a>';
								echo '</figure>';
									
								echo '<div class="lead col span_9 first">';
									$cat = get_the_category(); $cat = $cat[0];
									echo '<a class="category" href="' . home_url() .'/?cat=' . $cat->cat_ID .'">' . $cat->cat_name .'</a>';
									echo '<h3 class="the-title marT0 marB0"><a href="'.get_permalink().'">'. get_the_title() .'</a></h3>';
								echo '</div>';
							echo '</div>';
							
						} elseif($layout == '2') {
							
							echo '<div class="'.implode(', ', get_post_class()).' col span_6 featured-post';
							if( $i%2 == 0 ) { echo ' first'; }
							echo '">';
								echo '<figure class="featured-img zoom">';
									echo '<a class="thumb" href="';
										the_permalink();
									echo '">';
										the_post_thumbnail('large');   
									echo '</a>';
								echo '</figure>';
									
								echo '<div class="lead col span_9 first">';
									$cat = get_the_category(); $cat = $cat[0];
									echo '<a class="category" href="' . home_url() .'/?cat=' . $cat->cat_ID .'">' . $cat->cat_name .'</a>';
									echo '<h2 class="the-title marT0 marB0"><a href="'.get_permalink().'">'. get_the_title() .'</a></h2>';
								echo '</div>';
							echo '</div>';
							
						} elseif($layout == '3') {
						
							if( $query->current_post == 0 ) {
							
								echo '<div class="'.implode(', ', get_post_class()).' col span_6 featured-post first">';
									echo '<figure class="featured-img zoom">';
									echo '<a class="thumb" href="';
										the_permalink();
									echo '">';
										the_post_thumbnail('large');   
									echo '</a>';
									echo '</figure>';
										
									echo '<div class="lead col span_9 first">';
									$cat = get_the_category(); $cat = $cat[0];
									echo '<a class="category" href="' . home_url() .'/?cat=' . $cat->cat_ID .'">' . $cat->cat_name .'</a>';
									echo '<h2 class="the-title marT0 marB0"><a href="'.get_permalink().'">'. get_the_title() .'</a></h2>';
									echo '</div>';
								echo '</div>';
							
							} else {
								echo '<div class="'.implode(', ', get_post_class()).' col span_3 featured-post">';
									echo '<figure class="featured-img zoom">';
									echo '<a class="thumb" href="';
										the_permalink();
									echo '">';
										the_post_thumbnail('large');   
									echo '</a>';
									echo '</figure>';
										
									echo '<div class="lead col span_10 first">';
									$cat = get_the_category(); $cat = $cat[0];
									echo '<a class="category" href="' . home_url() .'/?cat=' . $cat->cat_ID .'">' . $cat->cat_name .'</a>';
									echo '<h4 class="the-title marT0 marB0"><a href="'.get_permalink().'">'. get_the_title() .'</a></h4>';
									echo '</div>';
								echo '</div>';
							}
							
						} elseif($layout == '4') {
							
							
							echo '<div class="'.implode(', ', get_post_class()).' col span_3 featured-post';
							if( $i%4 == 0 ) { echo ' first'; }
							echo '">';
								echo '<figure class="featured-img zoom">';
								echo '<a class="thumb" href="';
									the_permalink();
								echo '">';
									the_post_thumbnail('large');    
								echo '</a>';
								echo '</figure>';
									
								echo '<div class="lead col span_10 first">';
								$cat = get_the_category(); $cat = $cat[0];
								echo '<a class="category" href="' . home_url() .'/?cat=' . $cat->cat_ID .'">' . $cat->cat_name .'</a>';
								echo '<h4 class="the-title marT0 marB0"><a href="'.get_permalink().'">'. get_the_title() .'</a></h4>';
								echo '</div>';
							echo '</div>';
							
							if( $d%4 == 0 ) { echo '<div class="clear"></div>'; }
							
						} elseif($layout == '6') {
							
							echo '<div class="'.implode(', ', get_post_class()).' col span_2 featured-post';
							if( $i%6 == 0 ) { echo ' first'; }
							echo '">';
								echo '<figure class="featured-img zoom">';
								echo '<a class="thumb" href="';
									the_permalink();
								echo '">';
									the_post_thumbnail('medium');    
								echo '</a>';
								echo '</figure>';
									
								echo '<div class="lead col span_12 first">';
								$cat = get_the_category(); $cat = $cat[0];
								echo '<a class="category" href="' . home_url() .'/?cat=' . $cat->cat_ID .'">' . $cat->cat_name .'</a>';
								echo '<h5 class="the-title marT0 marB0"><a href="'.get_permalink().'">'. get_the_title() .'</a></h6>';
								echo '</div>';
							echo '</div>';
							
							if( $d%6 == 0 ) { echo '<div class="clear"></div>'; }
							
						}						
					 
				 $i++; $d++; endwhile; wp_reset_query();
			
			$page = isset( $instance['page'] ) ? esc_attr( $instance['page'] ) : '';
			if($page) {
				$blog_page = get_page($page);
				if($blog_page) echo '<p><a href="'.get_permalink($page).'">'.__('View all posts &rarr;', 'framework').'</a></p>';
			}
			echo '</div>';
		}
		
		function update($new_instance, $old_instance) {
			$new_instance = aq_recursive_sanitize($new_instance);
			return $new_instance;
		}
		
		function excerpt_more($more) {
			global $post;
			return ' <a href="'. get_permalink($post->ID) . '">Continue Reading &rarr;</a>';
		}
	}
}