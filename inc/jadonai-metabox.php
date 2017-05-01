<?php

add_action( 'cmb2_admin_init', 'jadonai_metabox' );

function jadonai_metabox() {

	$prefix = '_jadonai_';


	// metabox for page banner
	$cmb2_Page_Banner = new_cmb2_box( array(
		'id'           => $prefix . '_jadonai_post_formats',
		'title'        => esc_html__( 'Banner Image Settings', 'jadonai' ),
		'object_types' => array( 'page'), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
		//'show_on'      => array( 'id' => array( 2, ) ), // Specific post IDs to display this metabox
	) ); 
	$cmb2_Page_Banner->add_field( array(
	    'name'             =>  esc_html__( 'Display', 'jadonai' ),
	    'id'               => $prefix.'banner_yes',
	    'type'             => 'radio_inline',
	    'default'          => 'yes',
	    'options'          => array(
	        'yes' => esc_html__( 'Banner', 'jadonai' ),
	        'no'   => esc_html__( 'Slider', 'jadonai' )
	    ),
	) );

	$cmb2_Page_Banner->add_field( array(
	    'name'             =>  esc_html__( 'Banner Image', 'jadonai' ),
	    'id'               => $prefix.'page_banner',
	    'desc'             => esc_html__( 'Upload individual page banner','jadonai' ),
	    'type'             => 'file',
	) );

	$cmb2_Page_Banner->add_field( array(
	    'name'             =>  esc_html__( 'Page SubTitle', 'jadonai' ),
	    'id'               => $prefix.'page_banner_title', 
	    'desc'             => esc_html__( 'It Will display on Banner. if keep empty then will display the default page title','jadonai' ),
	    'type'             => 'text',
	) );
	// metabox for footer 
	$cmb2_Page_Footer = new_cmb2_box( array(
		'id'           => $prefix . '_jadonai_footer',
		'title'        => esc_html__( 'Footer Settings', 'jadonai' ),
		'object_types' => array( 'page'), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
		//'show_on'      => array( 'id' => array( 2, ) ), // Specific post IDs to display this metabox
	) );  
	$cmb2_Page_Footer->add_field( array(
	    'name'             =>  esc_html__( 'Display Subscribe?', 'jadonai' ),
	    'id'               => $prefix.'subscribe',
	    'type'             => 'radio_inline',
	    'default'          => 'yes',
	    'options'          => array(
	        'yes' => esc_html__( 'Yes', 'jadonai' ),
	        'no'   => esc_html__( 'No', 'jadonai' )
	    ),
	) );

	// metabox for page sidebar
	$cmb2_sidebar = new_cmb2_box( array(
		'id'           => $prefix . '_jadonai_page_sidebar',
		'title'        => esc_html__( 'Page Sidebar', 'jadonai' ),
		'object_types' => array( 'page'), // Post type
		'context'      => 'side',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
		//'show_on'      => array( 'id' => array( 2, ) ), // Specific post IDs to display this metabox
	) );

	$cmb2_sidebar->add_field( array(
	    'name'             =>  esc_html__( 'Select Sidebar', 'jadonai' ),
	    'id'               => $prefix.'page_sidebar',
	    'desc'             => esc_html__( 'Select any one.which you want to display','jadonai' ),
	    'type'             => 'select',
	    'default'          => 'right',
	    'options'          => array(
	        'left' => esc_html__( 'Left Sidebar', 'jadonai' ),
	        'right'   => esc_html__( 'Right Sidebar', 'jadonai' ),
	        'fullw'   => esc_html__( 'FullWidth', 'jadonai' )
	    ),
	) );

	// metabox for slider
	$cmb2_sidebar = new_cmb2_box( array(
		'id'           => $prefix . '_jadonai_slider',
		'title'        => esc_html__( 'Slider Settings', 'jadonai' ),
		'object_types' => array( 'sliders'), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
		//'show_on'      => array( 'id' => array( 2, ) ), // Specific post IDs to display this metabox
	) );

	$cmb2_sidebar->add_field( array(
	    'name'             =>  esc_html__( 'Left Button Label', 'jadonai' ),
	    'id'               => $prefix.'left_btn',
	    'desc'             => esc_html__( 'Put a Title for left button','jadonai' ),
	    'type'             => 'text',
	    'default'          => '' 
	) );
	$cmb2_sidebar->add_field( array(
	    'name'             =>  esc_html__( 'Left Button Url', 'jadonai' ),
	    'id'               => $prefix.'left_btnurl',
	    'desc'             => esc_html__( 'Put a url for left button','jadonai' ),
	    'type'             => 'text',
	    'default'          => '' 
	) );

	$cmb2_sidebar->add_field( array(
	    'name'             =>  esc_html__( 'Right Button Label', 'jadonai' ),
	    'id'               => $prefix.'right_btn',
	    'desc'             => esc_html__( 'Put a Title for right button','jadonai' ),
	    'type'             => 'text',
	    'default'          => '' 
	) );
	$cmb2_sidebar->add_field( array(
	    'name'             =>  esc_html__( 'Right Button Url', 'jadonai' ),
	    'id'               => $prefix.'right_btnurl',
	    'desc'             => esc_html__( 'Put a url for right button','jadonai' ),
	    'type'             => 'text',
	    'default'          => '' 
	) );

 	// metabox for services
	$cmb2_sidebar = new_cmb2_box( array(
		'id'           => $prefix . '_jadonai_services',
		'title'        => esc_html__( 'Services Settings', 'jadonai' ),
		'object_types' => array( 'services'), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
		//'show_on'      => array( 'id' => array( 2, ) ), // Specific post IDs to display this metabox
	) );

	$cmb2_sidebar->add_field( array(
	    'name'             =>  esc_html__( 'Icon Class', 'jadonai' ),
	    'id'               => $prefix.'icon_cls',
	    'desc'             => esc_html__( 'Put flaticon icon class here','jadonai' ),
	    'type'             => 'text',
	    'default'          => '' 
	) );
	$cmb2_sidebar->add_field( array(
	    'name'             =>  esc_html__( 'Read More Button Label', 'jadonai' ),
	    'id'               => $prefix.'btn_lbl',
	    'desc'             => esc_html__( 'Write button title here','jadonai' ),
	    'type'             => 'text',
	    'default'          => '' 
	) ); 

 	// metabox for services
	$cmb2_sidebar = new_cmb2_box( array(
		'id'           => $prefix . '_jadonai_testimonials',
		'title'        => esc_html__( 'Testimonials Settings', 'jadonai' ),
		'object_types' => array( 'testimonials'), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
		//'show_on'      => array( 'id' => array( 2, ) ), // Specific post IDs to display this metabox
	) );
 
	$cmb2_sidebar->add_field( array(
	    'name'             =>  esc_html__( 'Rank Name', 'jadonai' ),
	    'id'               => $prefix.'rank',
	    'desc'             => esc_html__( 'Put a rank name here','jadonai' ),
	    'type'             => 'text',
	    'default'          => '' 
	) ); 

 	// metabox for teams
	$cmb2_sidebar = new_cmb2_box( array(
		'id'           => $prefix . '_jadonai_teams',
		'title'        => esc_html__( 'Team Settings', 'jadonai' ),
		'object_types' => array( 'teams'), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
		//'show_on'      => array( 'id' => array( 2, ) ), // Specific post IDs to display this metabox
	) );
 
	$cmb2_sidebar->add_field( array(
	    'name'             =>  esc_html__( 'Rank Name', 'jadonai' ),
	    'id'               => $prefix.'tmrank',
	    'desc'             => esc_html__( 'Put a rank name here','jadonai' ),
	    'type'             => 'text',
	    'default'          => '' 
	) ); 

	$cmb2_sidebar->add_field( array(
	    'name'             =>  esc_html__( 'Facebook', 'jadonai' ),
	    'id'               => $prefix.'tmfb',
	    'desc'             => esc_html__( 'Put a facebook url here','jadonai' ),
	    'type'             => 'text',
	    'default'          => '' 
	) ); 
	$cmb2_sidebar->add_field( array(
	    'name'             =>  esc_html__( 'Twitter', 'jadonai' ),
	    'id'               => $prefix.'tmtw',
	    'desc'             => esc_html__( 'Put a twitter url here','jadonai' ),
	    'type'             => 'text',
	    'default'          => '' 
	) ); 

	$cmb2_sidebar->add_field( array(
	    'name'             =>  esc_html__( 'Linkedin', 'jadonai' ),
	    'id'               => $prefix.'tmld',
	    'desc'             => esc_html__( 'Put a linkedin url here','jadonai' ),
	    'type'             => 'text',
	    'default'          => '' 
	) ); 
	$cmb2_sidebar->add_field( array(
	    'name'             =>  esc_html__( 'Google Plus', 'jadonai' ),
	    'id'               => $prefix.'tmgp',
	    'desc'             => esc_html__( 'Put a google plus url here','jadonai' ),
	    'type'             => 'text',
	    'default'          => '' 
	) ); 

	// metabox for project
	$cmb2_project_galery = new_cmb2_box( array(
		'id'           => $prefix . '_jadonai_project_galery',
		'title'        => esc_html__( 'Project Gallery', 'jadonai' ),
		'object_types' => array( 'projects'), // Post type
		'context'      => 'side',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
		//'show_on'      => array( 'id' => array( 2, ) ), // Specific post IDs to display this metabox
	) );

	$cmb2_project_galery->add_field( array(
	    'name'             =>  esc_html__( 'Display Gallery?', 'jadonai' ),
	    'id'               => $prefix.'project_gallery',
	    'desc'             => esc_html__( 'After enabling gallery you will show a upload settings bellow the Text Editor. From where you can upload gallery images.','jadonai' ),
	    'type'             => 'radio',
	    'default'          => 'no',
	    'options'          => array(
	        'yes' => esc_html__( 'Enable', 'jadonai' ),
	        'no'   => esc_html__( 'Disable', 'jadonai' ) 
	    ),
	) );	

	// metabox for project
	$cmb2_project_galeryb = new_cmb2_box( array(
		'id'           => $prefix . '_jadonai_project_galerybtm',
		'title'        => esc_html__( 'Project Gallery Upload', 'jadonai' ),
		'object_types' => array( 'projects'), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
		//'show_on'      => array( 'id' => array( 2, ) ), // Specific post IDs to display this metabox
	) );

	$cmb2_project_galeryb->add_field( array(
	    'name'             =>  esc_html__( 'Upload Image', 'jadonai' ),
	    'id'               => $prefix.'gallery_up',
	    'desc'             => esc_html__( 'Upload gallery images.','jadonai' ),
	    'type'             => 'file_list',
	    'desc'             => esc_html__( 'Upload Images from here. If Gallery Images is Enabled then Feaured Image will not show in single project page.','jadonai' ), 
	    'text' => array(
	        'add_upload_files_text' =>  esc_html__( 'Upload Images.','jadonai' ),  
	        'remove_image_text' => esc_html__( 'Remove Images.','jadonai' ),  
	    )
	) );


}

