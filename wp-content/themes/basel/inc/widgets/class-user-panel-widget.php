<?php if ( ! defined('BASEL_THEME_DIR')) exit('No direct script access allowed');

/**
 * Register widget based on VC_MAP parameters that displays user panel
 *
 */

if ( ! class_exists( 'BASEL_User_Panel_Widget' ) ) {
	class BASEL_User_Panel_Widget extends WPH_Widget {
	
		function __construct() {
			if( ! function_exists( 'basel_get_user_panel_params' ) ) return;
		
			// Configure widget array
			$args = array( 
				// Widget Backend label
				'label' => __( 'BASEL User Panel', 'basel' ), 
				// Widget Backend Description								
				'description' => __( 'User panel to use in My Account area', 'basel' ), 		
			 );
		
			// Configure the widget fields
		
			// fields array
			$args['fields'] = basel_get_user_panel_params();

			// create widget
			$this->create_widget( $args );
		}
		
		// Output function

		function widget( $args, $instance )	{
			extract($args);

			echo $before_widget;

			if(!empty($instance['title'])) { echo $before_title . $instance['title'] . $after_title; };

			do_action( 'wpiw_before_widget', $instance );

			$instance['title'] = '';

			echo basel_shortcode_user_panel( $instance );

			do_action( 'wpiw_after_widget', $instance );

			echo $after_widget;
		}

		function form( $instance ) {
			parent::form( $instance );
		}
	
	} // class
}