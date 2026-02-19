<?php
/**
 * Default theme options.
 *
 * @package Spirit Blog
 */

if ( ! function_exists( 'spirit_blog_get_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
function spirit_blog_get_default_theme_options() {

	$defaults = array();

	// Front Page Header Image
	$defaults['enable_frontpage_header_image']  		= false;

	// Theme Options
	$defaults['layout_options_blog']					= 'right-sidebar';
	$defaults['layout_options_archive']					= 'right-sidebar';
	$defaults['layout_options_page']					= 'no-sidebar';	
	$defaults['layout_options_single']					= 'right-sidebar';	
	$defaults['excerpt_length']							= 50;
	$defaults['readmore_text']							= esc_html__('Read More','spirit-blog');

	//Footer section 		
	$defaults['copyright_text']							= esc_html__( 'Copyright &copy; All rights reserved.', 'spirit-blog' );

	// Pass through filter.
	$defaults = apply_filters( 'spirit_blog_filter_default_theme_options', $defaults );
	return $defaults;
}

endif;

/**
*  Get theme options
*/
if ( ! function_exists( 'spirit_blog_get_option' ) ) :

	/**
	 * Get theme option
	 *
	 * @since 1.0.0
	 *
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
	function spirit_blog_get_option( $key ) {

		$default_options = spirit_blog_get_default_theme_options();
		if ( empty( $key ) ) {
			return;
		}

		$theme_options = (array)get_theme_mod( 'theme_options' );
		$theme_options = wp_parse_args( $theme_options, $default_options );

		$value = null;

		if ( isset( $theme_options[ $key ] ) ) {
			$value = $theme_options[ $key ];
		}

		return $value;

	}

endif;