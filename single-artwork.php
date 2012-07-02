<?php get_header(); ?>
<article id="content" class="grid_8">
    <?php the_post(); ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <h1 class="entry-title"><?php the_title(); ?></h1>
        <div class="entry-content">
            <?php the_content(); ?>
            <?php 
            
            $artwork_availability = get_post_meta( $post->ID, 'artwork_availability', true);
            $artwork_price        = get_post_meta( $post->ID, 'artwork_price', true);
            $artwork_price = '$'.number_format($artwork_price, 2);
            ?>
            
            <div class="artwork price">Price: <?php echo $artwork_price ?></div>
            <?php
            echo do_shortcode('[nicepaypallite amount="'.$artwork_price.'" name="'.get_the_title().'"]');
            ?>
            
            <?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'Team4' ) . '&after=</div>') ?>
            <?php edit_post_link( __( 'Edit', 'Team4' ), '<span class="edit-link">', '</span>' ) ?>

        </div>
    </div>
    <?php comments_template( '', true ); ?>
</article>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
