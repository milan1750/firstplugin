<?php
/**
 * Adds Custom Post Type
 *
 * @package  FirstPlugin
 */

namespace firstplugin\includes;

defined( 'ABSPATH' ) || die( 'Access Denied' );

/**
 * Max Adds Class
 */
class MaxAdds {

	/**
	 * Constructor
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'fp_max_adds_post_type' ) );
	}

	/**
	 * Create post Type
	 */
	public function fp_max_adds_post_type() {
		register_post_type(
			'fp_advertisement',
			array(
				'label'       => 'Advertisement',
				'labels'      => array(
					array(
						'name'                     => _x( 'Advertisement', 'Advertisemnent type general name' ),
						'singular_name'            => _x( 'Advertisemnent', 'Advertisemnent type singular name' ),
						'add_new'                  => _x( 'Add New', 'Advertisemnent' ),
						'add_new_item'             => __( 'Add New Advertisemnent' ),
						'edit_item'                => __( 'Edit Advertisemnent' ),
						'new_item'                 => __( 'New Advertisemnent' ),
						'view_item'                => __( 'View Advertisemnent' ),
						'view_items'               => __( 'View Advertisement' ),
						'search_items'             => __( 'Search Advertisement' ),
						'not_found'                => __( 'No Advertisement found.' ),
						'not_found_in_trash'       => __( 'No Advertisement found in Trash.' ),
						'parent_item_colon'        => null,
						'all_items'                => __( 'All Advertisement' ),
						'archives'                 => __( 'Advertisemnent Archives' ),
						'attributes'               => __( 'Advertisemnent Attributes' ),
						'insert_into_item'         => __( 'Insert into Advertisemnent' ),
						'uploaded_to_this_item'    => __( 'Uploaded to this Advertisemnent' ),
						'featured_image'           => _x( 'Featured image', 'Advertisemnent' ),
						'set_featured_image'       => _x( 'Set featured image', 'Advertisemnent' ),
						'remove_featured_image'    => _x( 'Remove featured image', 'Advertisemnent' ),
						'use_featured_image'       => _x( 'Use as featured image', 'Advertisemnent' ),
						'filter_items_list'        => __( 'Filter Advertisement list' ),
						'items_list_navigation'    => __( 'Advertisement list navigation' ),
						'items_list'               => __( 'Advertisement list' ),
						'item_published'           => __( 'Advertisemnent published.' ),
						'item_published_privately' => __( 'Advertisemnent published privately.' ),
						'item_reverted_to_draft'   => __( 'Advertisemnent reverted to draft.' ),
						'item_scheduled'           => __( 'Advertisemnent scheduled.' ),
						'item_updated'             => __( 'Advertisemnent updated.' ),
					),
				),
				'public'      => true,
				'description' => 'Advertisemnet Post Type',
				'supports'    => array( 'title', 'thumbnail' ),
			)
		);
		flush_rewrite_rules( true );
	}
}
