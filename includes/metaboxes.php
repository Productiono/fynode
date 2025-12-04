<?php

/*************************************************
## fynode Metabox
*************************************************/

if ( ! function_exists( 'rwmb_meta' ) ) {
  function rwmb_meta( $key, $args = '', $post_id = null ) {
   return false;
  }
 }

add_filter( 'rwmb_meta_boxes', 'fynode_register_page_meta_boxes' );

function fynode_register_page_meta_boxes( $meta_boxes ) {
	
$prefix = 'klb_';
$meta_boxes = array();

/* ----------------------------------------------------- */
// Delivery Specification Tab
/* ----------------------------------------------------- */

$meta_boxes[] = [
	'id'      => 'klb_delivery_specification_tab',
	'title'   => esc_html__( 'Delivery Specification', 'fynode' ),
	'pages' => array( 'product' ),
	'context' => 'normal',
	'priority' => 'low',
	'fields'  => [
		[
			'type'    => 'wysiwyg',
			'id'      => $prefix . 'delivery_specification',
		],
	],
];

/* ----------------------------------------------------- */
// Product Highlights Tab
/* ----------------------------------------------------- */

$meta_boxes[] = [
	'id'      => 'klb_product_highlights_tab',
	'title'   => esc_html__( 'Product Highlights', 'fynode' ),
	'pages' => array( 'product' ),
	'context' => 'normal',
	'priority' => 'low',
	'fields'  => [
		[
			'type'    => 'wysiwyg',
			'id'      => $prefix . 'product_highlights',
		],
	],
];

/* ----------------------------------------------------- */
// Product Specification Tab
/* ----------------------------------------------------- */

$meta_boxes[] = [
	'id'      => 'klb_product_specification_tab',
	'title'   => esc_html__( 'Product Specification', 'fynode' ),
	'pages' => array( 'product' ),
	'context' => 'normal',
	'priority' => 'low',
	'fields'  => [
		[
			'type'    => 'wysiwyg',
			'id'      => $prefix . 'product_specification',
		],
	],
];

/* ----------------------------------------------------- */
// Blog Post Slides Metabox
/* ----------------------------------------------------- */

$meta_boxes[] = array(
	'id'		=> 'klb-blogmeta-gallery',
	'title'		=> esc_html__('Blog Post Image Slides','fynode'),
	'pages'		=> array( 'post' ),
	'context' => 'normal',

	'fields'	=> array(
		array(
			'name'	=> esc_html__('Blog Post Slider Images','fynode'),
			'desc'	=> esc_html__('Upload unlimited images for a slideshow - or only one to display a single image.','fynode'),
			'id'	=> $prefix . 'blogitemslides',
			'type'	=> 'image_advanced',
		)
		
	)
);

/* ----------------------------------------------------- */
// Blog Audio Post Settings
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'klb-blogmeta-audio',
	'title' => esc_html__('Audio Settings','fynode'),
	'pages' => array( 'post'),
	'context' => 'normal',

	// List of meta fields
	'fields' => array(	
		array(
			'name'		=> esc_html__('Audio Code','fynode'),
			'id'		=> $prefix . 'blogaudiourl',
			'desc'		=> esc_html__('Enter your Audio URL(Oembed) or Embed Code.','fynode'),
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> '',
			'sanitize_callback' => 'none'
		),
	)
);



/* ----------------------------------------------------- */
// Blog Video Metabox
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id'		=> 'klb-blogmeta-video',
	'title'		=> esc_html__('Blog Video Settings','fynode'),
	'pages'		=> array( 'post' ),
	'context' => 'normal',

	'fields'	=> array(
		array(
			'name'		=> esc_html__('Video Type','fynode'),
			'id'		=> $prefix . 'blog_video_type',
			'type'		=> 'select',
			'options'	=> array(
				'youtube'		=> esc_html__('Youtube','fynode'),
				'vimeo'			=> esc_html__('Vimeo','fynode'),
				'own'			=> esc_html__('Own Embed Code','fynode'),
			),
			'multiple'	=> false,
			'std'		=> array( 'no' ),
			'sanitize_callback' => 'none'
		),
		array(
			'name'	=> fynode_sanitize_data(__('Embed Code<br />(Audio Embed Code is possible, too)','fynode')),
			'id'	=> $prefix . 'blog_video_embed',
			'desc'	=> fynode_sanitize_data(__('Just paste the ID of the video (E.g. http://www.youtube.com/watch?v=<strong>GUEZCxBcM78</strong>) you want to show, or insert own Embed Code. <br />This will show the Video <strong>INSTEAD</strong> of the Image Slider.<br /><strong>Of course you can also insert your Audio Embedd Code!</strong>','fynode')),
			'type' 	=> 'textarea',
			'std' 	=> "",
			'cols' 	=> "40",
			'rows' 	=> "8"
		)
	)
);

return $meta_boxes;
}
