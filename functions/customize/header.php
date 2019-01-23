<?php

// panels
  $wp_customize->add_section( 'header_settings', array(
    'title'          => esc_attr__( 'Header Settings', 'duna' ),
    'panel'          => 'basic_settings',
    'priority'       => 160,
  ) );
// end

// controls

  // want boxed menu?
    $wp_customize->add_setting( 'want_menu_boxed', array(
      'default' => 1,
      'sanitize_callback' => 'weart_sanitize_checkbox'
    ));
    $wp_customize->add_control( 'want_menu_boxed', array(
      'label' => esc_html__( 'Boxed menu layout', 'duna' ),
      'section' => 'header_settings',
      'type' => 'checkbox',
    ));
  // end

  // article layout
    $wp_customize->add_setting( 'w_menu_color', array(
      'capability' => 'edit_theme_options',
      'default' => 'bg-2',
      'sanitize_callback' => 'weart_sanitize_radio',
    ) );
    $wp_customize->add_control( 'w_menu_color', array(
      'type' => 'select',
      'section' => 'header_settings',
      'label'          => esc_html__('Menu Color Style','duna'),
      'choices' => array(
        'bg-2'=>esc_html__('Dark','duna'),
        'bg-white'=>esc_html__('Light','duna'),
      ),
    ) );
  // end

  // want gradient menu?
    $wp_customize->add_setting( 'want_menu_gradient', array(
      'default' => 0,
      'sanitize_callback' => 'weart_sanitize_checkbox'
    ));
    $wp_customize->add_control( 'want_menu_gradient', array(
      'label' => esc_html__( 'Gradient menu style', 'duna' ),
      'section' => 'header_settings',
      'type' => 'checkbox',
    ));
  // end

  // want fixed menu?
    $wp_customize->add_setting( 'want_menu_fixed', array(
      'default' => 1,
      'sanitize_callback' => 'weart_sanitize_checkbox'
    ));
    $wp_customize->add_control( 'want_menu_fixed', array(
      'label' => esc_html__( 'Fixed menu postion', 'duna' ),
      'section' => 'header_settings',
      'type' => 'checkbox',
    ));
  // end

  // want biglogo to the menu?
    $wp_customize->add_setting( 'want_menu_biglogo', array(
      'default' => 0,
      'sanitize_callback' => 'weart_sanitize_checkbox'
    ));
    $wp_customize->add_control( 'want_menu_biglogo', array(
      'label' => esc_html__( 'Big logo above menu', 'duna' ),
      'section' => 'header_settings',
      'type' => 'checkbox',
    ));
  // end

  // want biglogo to the menu?
    $wp_customize->add_setting( 'want_menu_biglogo_tagline', array(
      'default' => 1,
      'sanitize_callback' => 'weart_sanitize_checkbox'
    ));
    $wp_customize->add_control( 'want_menu_biglogo_tagline', array(
      'label' => esc_html__( 'Big logo tagline beside the logo', 'duna' ),
      'section' => 'header_settings',
      'type' => 'checkbox',
    ));
  // end

  // want featured to category?
    $wp_customize->add_setting( 'want_featured_category', array(
      'default' => 0,
      'sanitize_callback' => 'weart_sanitize_checkbox'
    ));
    $wp_customize->add_control( 'want_featured_category', array(
      'label' => esc_html__( 'Featured to category archive page', 'duna' ),
      'section' => 'header_settings',
      'type' => 'checkbox',
    ));
  // end