<?php
    
/**
* Adds the artwork post type
* 
* With buy it now feature
* 
* Artwork Price
* Artwork Availabity
*/

function team4_post_type_artworks() {

    register_post_type( 'artwork',
            array(
                'label' => __('Art Works'),
                'public' => true,
                'taxonomies' => array('post_tag'),
                'show_ui' => true,
                'show_in_nav_menus' => true,
                'rewrite' => array('slug' => 'artwork'),
                'hierarchical' => false,
                'menu_position' => 5,
                'supports' => array(
                    'title',
                    'editor',
//                    'thumbnail',
//                    'excerpt',
//                    'custom-fields',
                ))
            );

    register_taxonomy('genre', 'artwork', 
        array('hierarchical' => true, 
                    'label' => __('Art Genre'), 
                    'singular_name' => 'genre',
                    'rewrite' => false,
            ));
/*
    register_taxonomy('services', 'artwork', 
        array('hierarchical' => true, 
                    'label' => __('Project Service Types'), 
                    'singular_name' => 'service',
                    'rewrite' => false,
            ));

    flush_rewrite_rules();
*/
}
add_action('init', 'team4_post_type_artworks');


/* Adds a box to the main column on the Post and Page edit screens */
function starving_artist_artwork_add_custom_box() {
    add_meta_box(  'starving_artist_artwork_sectionid', __( 'Art Work Settings', 'Team4' ), 'starving_artist_artwork_inner_custom_box', 'artwork' );
}
add_action( 'add_meta_boxes', 'starving_artist_artwork_add_custom_box' );

/* Prints the box content */
function starving_artist_artwork_inner_custom_box( $post ) {
    
    $artwork_availability = get_post_meta($post->ID, 'artwork_availability', true);
    $artwork_price        = get_post_meta($post->ID, 'artwork_price', true);
    
/*
    $values = array(
        'values' => array('COMING' => 'Coming Soon', 'PRESALE' => 'Pre Sale', 'COMPLETE' => 'Completed'),
        'name'   => 'project_status',
        'selected' => $project_status,
    );
*/
    // Use nonce for verification
    wp_nonce_field( plugin_basename( __FILE__ ), 'starving_artist_artwork_nonce' );
?>
<div id="postcustomstuff">
<table>
    <tr>
        <td class="left">
            <label ><?php echo  _e("Artwork Availability", 'CFAStudio' ); ?></label>
            <input name="artwork_availability" type="checkbox" <?php echo $artwork_availability ? 'checked':'';?> />
        </td>
    </tr>
    
    <tr>
        <td class="left">
            <label ><?php echo  _e("Artwork Price", 'CFAStudio' ); ?></label>
            <input name="artwork_price" type="inputbox" value="<?php echo $artwork_price ?>" />
        </td>
    </tr>

</table>
</div>
<?php
  
}

/* When the post is saved, saves our custom data */
function starving_artist_artwork_save_postdata( $post_id ) {
  // verify if this is an auto save routine. 
  // If it is our form has not been submitted, so we dont want to do anything
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return;

  // verify this came from the our screen and with proper authorization,
  // because save_post can be triggered at other times

  if ( !wp_verify_nonce( $_POST['starving_artist_artwork_nonce'], plugin_basename( __FILE__ ) ) )
      return;

    update_post_meta($post_id, 'artwork_availability' , $_POST['artwork_availability']);
    update_post_meta($post_id, 'artwork_price'        , $_POST['artwork_price']);
}

/* Do something with the data entered */
add_action( 'save_post', 'starving_artist_artwork_save_postdata' );
