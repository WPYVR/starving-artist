<?php get_header(); ?>
<div id="content">
<?php the_post(); ?>
<h1 class="page-title"><?php _e( 'Tag Archives for', 'CFAStudio' ) ?> <span><?php single_tag_title() ?></span></h1>
<?php rewind_posts(); ?>
<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
<div id="nav-above" class="navigation">
<p class="nav-previous"><?php next_posts_link(__( '<span class="meta-nav">&laquo;</span> older articles', 'CFAStudio' )) ?></p>
<p class="nav-next"><?php previous_posts_link(__( 'newer articles <span class="meta-nav">&raquo;</span>', 'CFAStudio' )) ?></p>
</div>
<?php } ?>
<?php while ( have_posts() ) : the_post(); ?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( __('Read', 'CFAStudio'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
<div class="entry-meta">
<span class="meta-prep meta-prep-author"><?php _e('By ', 'CFAStudio'); ?></span>
<span class="author vcard"><a class="url fn n" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" title="<?php printf( __( 'View all articles by %s', 'CFAStudio' ), $authordata->display_name ); ?>"><?php the_author(); ?></a></span>
<span class="meta-sep"> | </span>
<span class="meta-prep meta-prep-entry-date"><?php _e('Published ', 'CFAStudio'); ?></span>
<span class="entry-date"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php the_time( get_option( 'date_format' ) ); ?></abbr></span>
<?php edit_post_link( __( 'Edit', 'CFAStudio' ), "<span class=\"meta-sep\"> | </span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t" ) ?>
</div>
<div class="entry-summary">
<?php the_excerpt( __( 'continue reading <span class="meta-nav">&raquo;</span>', 'CFAStudio' )  ); ?>
</div>
<div class="entry-utility">
<span class="cat-links"><span class="entry-utility-prep entry-utility-prep-cat-links"><?php _e( 'Posted in ', 'CFAStudio' ); ?></span><?php echo get_the_category_list(', '); ?></span>
<span class="meta-sep"> | </span>
<?php if ( $blankslate_tags = blankslate_tags(', ') ) : // ?>
<span class="tag-links"><?php printf( __( 'Also tagged %s', 'CFAStudio' ), $blankslate_tags ) ?></span>
<?php endif; ?>
<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'CFAStudio' ), __( '1 Comment', 'CFAStudio' ), __( '% Comments', 'CFAStudio' ) ) ?></span>
<?php edit_post_link( __( 'Edit', 'CFAStudio' ), "<span class=\"meta-sep\"> | </span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t\n" ) ?>
</div>
</div>
<?php endwhile; ?>
<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
<div id="nav-below" class="navigation">
<p class="nav-previous"><?php next_posts_link(__( '<span class="meta-nav">&laquo;</span> older articles', 'CFAStudio' )) ?></p>
<p class="nav-next"><?php previous_posts_link(__( 'newer articles <span class="meta-nav">&raquo;</span>', 'CFAStudio' )) ?></p>
</div>
<?php } ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>