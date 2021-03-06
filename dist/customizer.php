<?php

function draya_customize_register( $wp_customize ) {
	// Add the featured content section in case it's not already there.
	$wp_customize->add_section( 'post_display_options', array(
		'title'       => __( 'Post display option', 'draya' ),
		'description' => 'Toggle display elements in posts',
		'priority'    => 130,
	) );

	// Add the featured content layout setting and control.
	$wp_customize->add_setting( 'post_display_username', array(
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( 'post_display_username', array(
		'label'   => 'Show author\'s username',
		'section' => 'post_display_options',
		'type'    => 'checkbox',
	) );

	$wp_customize->add_setting( 'post_display_hyphenation', array(
		'default'         => true,
		'transport'       => 'refresh',
	) );
	$wp_customize->add_control( 'post_display_hyphenation', array(
		'label'   => 'Hyphenate posts',
		'section' => 'post_display_options',
		'type'    => 'checkbox',
	) );

	$wp_customize->add_setting( 'post_display_meta_on_bottom', array(
		'transport'       => 'refresh',
	) );
	$wp_customize->add_control( 'post_display_meta_on_bottom', array(
		'label'   => 'Display post metadata on bottom',
		'section' => 'post_display_options',
		'type'    => 'checkbox',
	) );

	$wp_customize->add_setting( 'post_display_no_of_pages', array(
		'transport'       => 'refresh',
		'default'       => '5'
	) );
	$wp_customize->add_control( 'post_display_no_of_pages', array(
		'label'   => 'Number of pages in jump pagination',
		'section' => 'post_display_options',
		'type'    => 'text',
	) );
}
add_action( 'customize_register', 'draya_customize_register' );

