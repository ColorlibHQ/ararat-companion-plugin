<?php
function ararat_page_metabox( $meta_boxes ) {

	$ararat_prefix = '_ararat_';
	$meta_boxes[] = array(
		'id'        => 'page_single_metaboxs',
		'title'     => esc_html__( 'Page Footer Options', 'ararat-companion' ),
		'post_types'=> array( 'page' ),
		'priority'  => 'high',
		'autosave'  => 'false',
		'fields'    => array(
			array(
				'id'    => $ararat_prefix . 'footer-background',
				'type'  => 'background',
				'name'  => esc_html__( 'Set The Footer Background', 'ararat-companion' ),
			),
		),
	);


	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'ararat_page_metabox' );