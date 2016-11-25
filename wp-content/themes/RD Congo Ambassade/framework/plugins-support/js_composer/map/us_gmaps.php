<?php defined( 'ABSPATH' ) OR die( 'This script cannot be accessed directly.' );

/**
 * Shortcode: us_gmaps
 *
 * @var $shortcode string Current shortcode name
 * @var $config array Shortcode's config
 *
 * @param $config ['atts'] array Shortcode's attributes and default values
 */
vc_map( array(
	'base' => 'us_gmaps',
	'name' => __( 'Google Maps', 'us' ),
	'icon' => 'icon-wpb-map-pin',
	'category' => us_translate_with_external_domain( 'Content', 'js_composer' ),
	'weight' => 160,
	'params' => array(
		array(
			'param_name' => 'marker_address',
			'heading' => __( 'Address', 'us' ),
			'type' => 'textfield',
			'std' => $config['atts']['marker_address'],
			'holder' => 'div',
			'weight' => 190,
		),
		array(
			'param_name' => 'marker_text',
			'heading' => __( 'Marker Text', 'us' ),
			'description' => __( 'Enter your content, HTML tags are allowed.', 'us' ),
			'type' => 'textarea_raw_html',
			'std' => $config['atts']['marker_text'],
			'edit_field_class' => 'vc_col-sm-12 vc_column pretend_textfield',
			'weight' => 180,
		),
		array(
			'type' => 'checkbox',
			'param_name' => 'show_infowindow',
			'value' => array( __( 'Show Marker Text when map is loaded', 'us' ) => TRUE ),
			'weight' => 175,
		),
		array(
			'param_name' => 'type',
			'heading' => __( 'Map Type', 'us' ),
			'type' => 'dropdown',
			'value' => array(
				__( 'Roadmap', 'us' ) => 'roadmap',
				__( 'Roadmap + Terrain', 'us' ) => 'terrain',
				__( 'Satellite', 'us' ) => 'satellite',
				__( 'Satellite + Roadmap', 'us' ) => 'hybrid',
			),
			'std' => $config['atts']['type'],
			'weight' => 170,
		),
		array(
			'param_name' => 'height',
			'heading' => __( 'Map Height (pixels)', 'us' ),
			'type' => 'textfield',
			'std' => $config['atts']['height'],
			'edit_field_class' => 'vc_col-sm-6',
			'weight' => 160,
		),
		array(
			'param_name' => 'zoom',
			'heading' => __( 'Map Zoom', 'us' ),
			'type' => 'dropdown',
			'value' => array(
				' 1' => '1',
				' 2' => '2',
				' 3' => '3',
				' 4' => '4',
				' 5' => '5',
				' 6' => '6',
				' 7' => '7',
				' 8' => '8',
				' 9' => '9',
				' 10' => '10',
				' 11' => '11',
				' 12' => '12',
				' 13' => '13',
				' 14' => '14',
				' 15' => '15',
				' 16' => '16',
				' 17' => '17',
				' 18' => '18',
				' 19' => '19',
				' 20' => '20',
			),
			'std' => $config['atts']['zoom'],
			'edit_field_class' => 'vc_col-sm-6',
			'weight' => 150,
		),
		array(
			'param_name' => 'latitude',
			'heading' => __( 'Map Latitude (optional)', 'us' ),
			'description' => __( 'If Longitude and Latitude are set, they override the Address value.', 'us' ),
			'type' => 'textfield',
			'std' => $config['atts']['latitude'],
			'edit_field_class' => 'vc_col-sm-6',
			'weight' => 140,
		),
		array(
			'param_name' => 'longitude',
			'heading' => __( 'Map Longitude (optional)', 'us' ),
			'description' => __( 'If Longitude and Latitude are set, they override the Address value.', 'us' ),
			'type' => 'textfield',
			'std' => $config['atts']['longitude'],
			'edit_field_class' => 'vc_col-sm-6',
			'weight' => 130,
		),
		array(
			'type' => 'param_group',
			'param_name' => 'markers',
			'params' => array(
				array(
					'param_name' => 'marker_address',
					'heading' => __( 'Marker Address', 'us' ),
					'type' => 'textfield',
					'std' => '',
				),
				array(
					'param_name' => 'marker_text',
					'heading' => __( 'Marker Text', 'us' ),
					'description' => __( 'Enter your content, HTML tags are allowed.', 'us' ),
					'type' => 'textarea',
					'std' => '',
					'edit_field_class' => 'vc_col-sm-12 vc_column pretend_textfield',
				),
				array(
					'param_name' => 'marker_latitude',
					'heading' => __( 'Marker Latitude (optional)', 'us' ),
					'description' => __( 'If Longitude and Latitude are set, they override the Address value.', 'us' ),
					'type' => 'textfield',
					'std' => $config['atts']['latitude'],
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'param_name' => 'marker_longitude',
					'heading' => __( 'Marker Longitude (optional)', 'us' ),
					'description' => __( 'If Longitude and Latitude are set, they override the Address value.', 'us' ),
					'type' => 'textfield',
					'std' => $config['atts']['longitude'],
					'edit_field_class' => 'vc_col-sm-6',
				),
			),
			'group' => __( 'Additional Markers', 'us' ),
			'weight' => 90,
		),
		array(
			'param_name' => 'custom_marker_img',
			'heading' => __( 'Custom Marker Image', 'us' ),
			'description' => __( 'Image should NOT be bigger then 80x80 px', 'us' ),
			'type' => 'attach_image',
			'std' => $config['atts']['custom_marker_img'],
			'edit_field_class' => 'vc_col-sm-6',
			'group' => __( 'More Options', 'us' ),
			'weight' => 80,
		),
		array(
			'param_name' => 'custom_marker_size',
			'heading' => __( 'Custom Marker Size', 'us' ),
			'type' => 'dropdown',
			'value' => array(
				'20x20' => '20',
				'30x30' => '30',
				'40x40' => '40',
				'50x50' => '50',
				'60x60' => '60',
				'70x70' => '70',
				'80x80' => '80',
			),
			'std' => $config['atts']['custom_marker_size'],
			'dependency' => array( 'element' => 'custom_marker_img', 'not_empty' => TRUE ),
			'edit_field_class' => 'vc_col-sm-6',
			'group' => __( 'More Options', 'us' ),
			'weight' => 70,
		),
		array(
			'param_name' => 'hide_controls',
			'type' => 'checkbox',
			'value' => array( __( 'Hide all map controls', 'us' ) => TRUE ),
			'group' => __( 'More Options', 'us' ),
			'weight' => 60,
		),
		array(
			'param_name' => 'disable_zoom',
			'type' => 'checkbox',
			'value' => array( __( 'Disable map zoom on mouse wheel scroll', 'us' ) => TRUE ),
			'group' => __( 'More Options', 'us' ),
			'weight' => 50,
		),
		array(
			'param_name' => 'disable_dragging',
			'type' => 'checkbox',
			'value' => array( __( 'Disable dragging on touch screens', 'us' ) => TRUE ),
			'group' => __( 'More Options', 'us' ),
			'weight' => 40,
		),
		array(
			'param_name' => 'map_bg_color',
			'type' => 'colorpicker',
			'heading' => __( 'Map Background Color', 'us' ),
			'description' => __( 'This color will be visible when map layer has not yet loaded.', 'us' ),
			'group' => __( 'More Options', 'us' ),
			'weight' => 35,
		),
		array(
			'param_name' => 'api_key',
			'heading' => __( 'API Key', 'us' ),
			'description' => sprintf( __( 'Read more information about Google Maps API Key on %sthis page%s.', 'us' ), '<a href="https://developers.google.com/maps/documentation/javascript/get-api-key" target="_blank">', '</a>' ),
			'type' => 'textfield',
			'std' => $config['atts']['api_key'],
			'group' => __( 'More Options', 'us' ),
			'weight' => 30,
		),
		array(
			'param_name' => 'el_class',
			'heading' => us_translate_with_external_domain( 'Extra class name', 'js_composer' ),
			'description' => us_translate_with_external_domain( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'js_composer' ),
			'type' => 'textfield',
			'std' => $config['atts']['el_class'],
			'group' => __( 'More Options', 'us' ),
			'weight' => 20,
		),
		array(
			'param_name' => 'map_style_json',
			'description' => sprintf( __( 'Enter JSON code for styling the map. You can find good examples on %s.', 'us' ), '<a href="https://snazzymaps.com/" target="_blank">snazzymaps.com</a>' ),
			'type' => 'textarea_raw_html',
			'std' => $config['atts']['map_style_json'],
			'group' => __( 'Map Style', 'us' ),
			'weight' => 10,
		),
	),
) );
vc_remove_element( 'vc_gmaps' );
