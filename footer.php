<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package _s
 * @since _s 1.0
 */
?>

	</div><!-- #main -->

    <div id="footer-wrapper">
	    <footer id="colophon" class="site-footer container_12" role="contentinfo">
		    <div class="site-info grid_12" >
			    <?php do_action( '_s_credits' ); ?>
			    <a href="http://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', '_s' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s', '_s' ), 'WordPress' ); ?></a>
			    <span class="sep"> | </span>
			    <?php printf( __( 'Theme: %1$s by %2$s.', '_s' ), '_s', '<a href="http://automattic.com/" rel="designer">Automattic</a>' ); ?>
		    </div><!-- .site-info -->
	    </footer><!-- .site-footer .site-footer -->
    </div>
</div><!-- #page .hfeed .site -->

<?php wp_footer(); ?>


<script type="text/javascript" charset="utf-8">
$(function(){
    $('#maximage').maximage({
        cycleOptions: {
            fx:'scrollHorz',
            speed: 800,
            timeout: 8000,
            prev: '#arrow_left',
            next: '#arrow_right'
        },
        onFirstImageLoaded: function(){
            jQuery('#cycle-loader').hide();
            jQuery('#maximage').fadeIn('fast');
        }
    });
});
</script>
</body>
</html>