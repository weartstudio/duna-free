<?php

// panels
  $wp_customize->add_panel( 'basic_settings', array(
    'priority'    => 10,
    'title'       => esc_attr__( 'Main Settings', 'duna' ),
  ) );

  $wp_customize->add_section( 'article_settings', array(
    'title'          => esc_attr__( 'Article Settings', 'duna' ),
    'panel'          => 'basic_settings',
    'priority'       => 160,
  ) );
// end

// controls

  // want author to display?
    $wp_customize->add_setting( 'want_author', array(
      'default' => 1,
      'sanitize_callback' => 'weart_sanitize_checkbox'
    ));
    $wp_customize->add_control( 'want_author', array(
      'label' => esc_html__( 'Display author', 'duna' ),
      'section' => 'article_settings',
      'type' => 'checkbox',
    ));
  // end

  // want to display post pager?
    $wp_customize->add_setting( 'want_post_pager', array(
      'default' => 1,
      'sanitize_callback' => 'weart_sanitize_checkbox'
    ));
    $wp_customize->add_control( 'want_post_pager', array(
      'label' => esc_html__( 'Want Pager navigation?', 'duna' ),
      'section' => 'article_settings',
      'type' => 'checkbox',
    ));
  // end

  // want to sticky sidebar?
    $wp_customize->add_setting( 'want_sticky_sidebar', array(
      'default' => 0,
      'sanitize_callback' => 'weart_sanitize_checkbox'
    ));
    $wp_customize->add_control( 'want_sticky_sidebar', array(
      'label' => esc_html__( 'Want sticky sidebar?', 'duna' ),
      'section' => 'article_settings',
      'type' => 'checkbox',
    ));
  // end

  // want to display realted posts?
    $wp_customize->add_setting( 'want_related', array(
      'default' => 0,
      'sanitize_callback' => 'weart_sanitize_checkbox'
    ));
    $wp_customize->add_control( 'want_related', array(
      'label' => esc_html__( 'Want Related Posts above articles?', 'duna' ),
      'section' => 'article_settings',
      'type' => 'checkbox',
    ));
  // end

// end