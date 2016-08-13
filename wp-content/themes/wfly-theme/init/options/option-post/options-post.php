<?php
function post_option_metaboxes( $meta_boxes ) {
  $prefix = '_cmb_'; // Prefix for all fields
  $meta_boxes['page_option'] = array(
    'id' => 'post_option',
    'title' => 'Post Options',
    'pages' => array('post'), // post type
    'context' => 'normal',
    'priority' => 'high',
    'show_names' => true, // Show field names on the left
    'fields' => array(
      array(
        'name' => __( 'Disable Thumbnail', 'cmb' ),
        'desc' => __( 'Disable thumb on the node detail', 'cmb' ),
        'id'   => $prefix . 'disable_thumbnail',
        'type' => 'checkbox',
      ),
      array(
        'name' => __( 'Sticky post', 'cmb' ),
        'desc' => __( 'Add this post it is sticky post', 'cmb' ),
        'id'   => $prefix . 'sticky_post',
        'type' => 'checkbox',
      ),
    ),
  );

  return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'post_option_metaboxes' );

function framework_post($name = '') {
  global $post;
  $value = get_post_meta( $post->ID, '_cmb_' . $name, true );
  return $value;
}
?>