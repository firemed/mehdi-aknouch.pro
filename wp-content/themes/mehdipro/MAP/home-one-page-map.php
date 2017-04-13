<?php

//get_header();

$cpt = 0;
?>

<div class="main-content home-one-page-map">

    <div class="col span_12">

        <?php

        $args = array(
            'post_type' => 'page',
            'posts_per_page' => -1,
//            'orderby'   => 'd',
            'order' => 'ASC',
            'post_status' => 'publish',
            'post_parent' => 60
        );
        $query = new WP_Query($args);

        $first_count = 3;
        if (have_posts()) {

        while ( $query->have_posts() ) : $query->the_post(); ?>



            <?php
            global $post;
            $post_slug=$post->post_name;
            ?>

            <div class="subpage-container <?php echo $post_slug; ?> <?php echo ($cpt++ % 2) == 0 ? 'odd' : 'even' ; ?>  " id="<?php echo $post_slug; ?>">

                <?php get_template_part( 'content', get_post_format() ); ?>

            </div>

        <?php endwhile; ?>

        <?php } else { ?>

            <p class="nomatches left clear"><?php _e( 'Apologies, but no results were found for the requested archive.<br />Perhaps searching will help find a related post.', 'contempo' ); ?></p>

        <?php } wp_reset_query(); ?>

            </div>
        <?php get_sidebar(); ?>

        <div class="clear"></div>

</div>

