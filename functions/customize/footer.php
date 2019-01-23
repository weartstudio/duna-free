<?php

// panels
  $wp_customize->add_section( 'footer_settings', array(
    'title'          => esc_attr__( 'Footer Settings', 'duna' ),
    'panel'          => 'basic_settings',
    'priority'       => 160,
  ) );
// end

// controls

  // want boxed menu?
    $wp_customize->add_setting( 'want_footer_boxed', array(
      'default' => 0,
      'sanitize_callback' => 'weart_sanitize_checkbox'
    ));
    $wp_customize->add_control( 'want_footer_boxed', array(
      'label' => esc_html__( 'Boxed footer layout', 'duna' ),
      'section' => 'footer_settings',
      'type' => 'checkbox',
    ));
  // end

  // newsletter
    $wp_customize->add_setting( 'want_footer_newsletter', array(
      'default' => 1,
      'sanitize_callback' => 'weart_sanitize_checkbox'
    ));
    $wp_customize->add_control( 'want_footer_newsletter', array(
      'label' => esc_html__( 'Newsletter in footer', 'duna' ),
      'section' => 'footer_settings',
      'type' => 'checkbox',
    ));
  // end

  // social
    $wp_customize->add_setting( 'want_footer_social', array(
      'default' => 1,
      'sanitize_callback' => 'weart_sanitize_checkbox'
    ));
    $wp_customize->add_control( 'want_footer_social', array(
      'label' => esc_html__( 'Social in footer', 'duna' ),
      'section' => 'footer_settings',
      'type' => 'checkbox',
    ));
  // end

  // FOOTER Copyright
    $wp_customize->add_setting( 'copyright', array(
      'sanitize_callback' => 'weart_sanitize_text'
    ));
    $wp_customize->add_control( 'copyright', array(
      'label' => esc_html__('Copyright Text','duna'),
      'description' => esc_html__( 'Do not use HTML elements.', 'duna' ),
      'section' => 'footer_settings',
      'type' => 'text',
    ));
  // end

  // want to display the logo?
    $wp_customize->add_setting( 'want_footer_logo', array(
      'default' => 1,
      'sanitize_callback' => 'weart_sanitize_checkbox'
    ));
    $wp_customize->add_control( 'want_footer_logo', array(
      'label' => esc_html__( 'Logo in footer', 'duna' ),
      'section' => 'footer_settings',
      'type' => 'checkbox',
    ));
  // end