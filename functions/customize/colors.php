<?php

//main
  $wp_customize->add_setting( 'main_color', array( 'default' => '#FF4849', 'sanitize_callback' => 'sanitize_hex_color' ) );
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_color', array(
    'label' => esc_html__('main color', 'duna' ),
    'section' => 'colors',
    'settings' => 'main_color',
  ) ) );
// end

//main2
  $wp_customize->add_setting( 'main2_color', array( 'default' => '#3D3F53', 'sanitize_callback' => 'sanitize_hex_color' ) );
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main2_color', array(
    'label' => esc_html__('secondary color', 'duna' ),
    'section' => 'colors',
    'settings' => 'main2_color',
  ) ) );
// end
