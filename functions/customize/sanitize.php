<?php

	//sanitize adsense box adsense codes
	function weart_sanitize_adsense( $input ) {
 		esc_js($input);
    $input = str_replace(array("\r", "\n"), '', $input);
    return $input;
	}

	//sanitize checkbox
	function weart_sanitize_checkbox( $input ) {
		return ( ( isset( $input ) && true == $input ) ? true : false );
	}

  //sanitize text
  function weart_sanitize_text( $input ) {
    return esc_html( $input );
  }

  //sanitize select
	function weart_sanitize_select( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
	}

	// sanitize number
  function weart_sanitize_number_absint( $number, $setting ) {
    // Ensure $number is an absolute integer (whole number, zero or greater).
    $number = absint( $number );
    // If the input is an absolute integer, return it; otherwise, return the default
    return ( $number ? $number : $setting->default );
  }

  // sanitize radio button
  function weart_sanitize_radio( $input, $setting ) {
    // Ensure input is a slug.
    $input = sanitize_key( $input );
    // Get list of choices from the control associated with the setting.
    $choices = $setting->manager->get_control( $setting->id )->choices;
    // If the input is a valid key, return it; otherwise, return the default.
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
  }

?>