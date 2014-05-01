<?php 
/**
 * Metaboxes for Slideshow
 * @package by Theme Record
 * @auther: MattMao
 */
$prefix = 'TR_';

$config = array(
	'title' => __('Slideshow Options', 'TR'),
	'id' => $prefix . 'slideshow_meta_box',
	'pages' => array('slideshow'),
	'callback' => '',
	'context' => 'normal',
	'priority' => 'high',
);

$options = array(
	array(
		'name' => __('Name', 'TR'),
		'id' => $prefix . 'slideshow_name',
		'std' => '',
		'size' => '60',
		'type' => 'text'
	),
	array(
			'name' => __('Width', 'TR'),
			'desc' => __('Set the width for the slideshow. The max width is 930px.', 'TR'),
			'id' => $prefix . 'slideshow_width',
			'std' => '930',
			'size' => '10',
			'unit' => 'pixels',
			'type' => 'text'
	),
	array(
			'name' => __('Height', 'TR'),
			'desc' => __('Set the height for the slideshow.', 'TR'),
			'id' => $prefix . 'slideshow_height',
			'std' => '400',
			'size' => '10',
			'unit' => 'pixels',
			'type' => 'text'
	),
	array(
			'name' => __('Speed', 'TR'),
			'desc' => __('Set the speed for the slideshow.', 'TR'),
			'id' => $prefix . 'slideshow_speed',
			'std' => '5000',
			'size' => '10',
			'unit' => 'millisecond',
			'type' => 'text'
	),
	array(
		'name' => __('Effect', 'TR'),
		'id' => $prefix . 'slideshow_effect',
		'desc' => __('Choose the effect of slideshow.',  'TR'),
		'std' => 'fade',
		'options' => array(
			'fade' => __('Fade.', 'TR'),
			'slide' => __('Slide.', 'TR')
		),
		'type' => 'radio'
	),
	array(
		'name' => __('Description', 'TR'),
		'desc' => __('Write your description of the slideshow in this field.', 'TR'),
		'id' => $prefix . 'slideshow_desc',
		'rows' => '5',
		'std' => '',
		'type' => 'textarea'
	),
	array(
		'desc' => __('Upload images to be used for the slideshow.', 'TR'),
		'id' => 'TR_upload_images',
		'button' => __('Add Or Edit Images', 'TR'),
		'class' => 'noborder',
		'type' => 'upload_images'
	)
);

new meta_boxes_generator($config,$options);
?>