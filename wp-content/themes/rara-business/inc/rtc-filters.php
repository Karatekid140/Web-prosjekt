<?php
/**
 * Filter to modify functionality of RTC plugin.
 *
 * @package Rara_Business
 */

// Check if rara theme companion plugin is activated
$rtc_activated = rara_business_is_rara_theme_companion_activated(); 

if( $rtc_activated ) :
	if ( ! function_exists( 'rara_business_cpt' ) ) {  
		/**
		 * Filter the CPT generated by RTC
		*/    
		function rara_business_cpt(){
		    
		    $posts = array(
				'rara-portfolio'           => array( 
					'singular_name'       => 'Portfolio',
					'general_name'        => 'Portfolios',
					'dashicon'            => 'dashicons-portfolio',
					'taxonomy'            => 'rara_portfolio_categories',
					'taxonomy_slug'       => 'portfolio-category',
					'has_archive'         => false,		
					'exclude_from_search' => false,
					'show_in_nav_menus'   => true,
					'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' ),
					'rewrite'             => array( 'slug' => 'portfolio' ),
				),
			);
		    
		    return $posts;
		} 
	}  
	add_filter( 'rc_get_posttype_array', 'rara_business_cpt' );

	if( ! function_exists( 'rara_business_cta_section_bgcolor_filter' ) ){
		/**
		 * Filter to add bg color of cta section widget
		 */    
		function rara_business_cta_section_bgcolor_filter(){
			return '#0aa3f3';
		}
	}
	add_filter( 'rrtc_cta_bg_color', 'rara_business_cta_section_bgcolor_filter' );

	if( ! function_exists( 'rara_business_cta_btn_alignment_filter' ) ){
		/**
		 * Filter to add btn alignment of cta section widget
		 */    
		function rara_business_cta_btn_alignment_filter(){
			return 'centered';
		}
	}
	add_filter( 'rrtc_cta_btn_alignment', 'rara_business_cta_btn_alignment_filter' );

	if( ! function_exists( 'rara_business_team_member_image_size' ) ){
		/**
		 * Filter to define image size in team member section widget
		 */    
		function rara_business_team_member_image_size(){
			return 'rara-business-team';
		}
	}
	add_filter( 'tmw_icon_img_size', 'rara_business_team_member_image_size' );
endif;