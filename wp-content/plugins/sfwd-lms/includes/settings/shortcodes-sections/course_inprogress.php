<?php
if ( ( class_exists( 'LearnDash_Shortcodes_Section' ) ) && ( !class_exists( 'LearnDash_Shortcodes_Section_course_inprogress' ) ) ) {
	class LearnDash_Shortcodes_Section_course_inprogress extends LearnDash_Shortcodes_Section {

		function __construct( $fields_args = array() ) {
			$this->fields_args = $fields_args;

			$this->shortcodes_section_key 			= 	'course_inprogress';
			$this->shortcodes_section_title 		= 	sprintf( _x( '%s In Progress', 'placeholder: Course', 'learndash' ), LearnDash_Custom_Label::get_label( 'course' ) );
			$this->shortcodes_section_type			=	2;
			$this->shortcodes_section_description	=	sprintf( _x( 'This shortcode shows the content if the user has started but not completed the %s. The shortcode can be used on <strong>any</strong> page or widget area.', 'placeholders: course', 'learndash' ), LearnDash_Custom_Label::label_to_lower( 'course' ) );
			
			parent::__construct(); 
		}
		
		function init_shortcodes_section_fields() {
			$this->shortcodes_option_fields = array(
				'message'	=>	array(
					'id'			=>	$this->shortcodes_section_key . '_message',
					'name'  		=> 	'message', 
					'type'  		=> 	'textarea',
					'label' 		=> 	__('Message shown to user', 'learndash'),
					'help_text'		=>	__('Message shown to user', 'learndash'),
					'value' 		=> 	'',
					'required'		=>	'required'
				),
				'course_id' => array(
					'id'			=>	$this->shortcodes_section_key . '_course_id',
					'name'  		=> 	'course_id', 
					'type'  		=> 	'number',
					'label' 		=> 	sprintf( _x( '%s ID', 'placeholder: Course', 'learndash' ), LearnDash_Custom_Label::get_label( 'course' ) ),
					'help_text'		=>	sprintf( _x( 'Enter single %s ID. Leave blank for current %s.', 'placeholders: Course, Course', 'learndash' ), LearnDash_Custom_Label::get_label( 'course' ), LearnDash_Custom_Label::get_label( 'course' ) ),
					'value' 		=> 	'',
					'class'			=>	'small-text'
				),
				'user_id' => array(
					'id'			=>	$this->shortcodes_section_key . '_user_id',
					'name'  		=> 	'user_id', 
					'type'  		=> 	'number',
					'label' 		=> 	__( 'User ID', 'learndash' ),
					'help_text'		=>	__('Enter specific User ID. Leave blank for current User.', 'learndash' ),
					'value' 		=> 	'',
					'class'			=>	'small-text'
				),
			);
		
			if ( ( !isset( $this->fields_args['post_type'] ) ) || ( ( $this->fields_args['post_type'] != 'sfwd-courses' ) && ( $this->fields_args['post_type'] != 'sfwd-lessons' ) && ( $this->fields_args['post_type'] != 'sfwd-topic' ) ) ) {
			
				$this->shortcodes_option_fields['course_id']['required'] 	= 'required';
				$this->shortcodes_option_fields['course_id']['help_text']	= sprintf( _x( 'Enter single %s ID.', 'placeholders: Course', 'learndash' ), LearnDash_Custom_Label::get_label( 'course' ) );
			} 
		
			$this->shortcodes_option_fields = apply_filters( 'learndash_settings_fields', $this->shortcodes_option_fields, $this->shortcodes_section_key );
			
			parent::init_shortcodes_section_fields();
		}
	}
}
