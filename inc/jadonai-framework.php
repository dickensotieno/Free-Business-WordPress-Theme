<?php

    /**
     * ReduxFramework Barebones Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "jadonai";

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'submenu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_html__( 'Jadonai Options', 'jadonai' ),
        'page_title'           => esc_html__( 'Jadonai Options', 'jadonai' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => true,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => 'jadonai_options',
        // Page slug used to denote the panel
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!

        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        //'compiler'             => true,
 
    );

   
    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( esc_html__( '', 'jadonai' ), $v );
    } else {
        $args['intro_text'] = esc_html__( '', 'jadonai' );
    }

    // Add content after the form.
    $args['footer_text'] = esc_html__( '', 'jadonai' );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */

    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => esc_html__( 'Theme Information 1', 'jadonai' ),
            'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'jadonai' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => esc_html__( 'Theme Information 2', 'jadonai' ),
            'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'jadonai' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = esc_html__( '<p>This is the sidebar content, HTML is allowed.</p>', 'jadonai' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     * ---> START SECTIONS
     */

    // -> START Basic Fields
 
 
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Top Header', 'jadonai' ), 
        'id'         => 'top-header', 
        'fields'     => array(
            array(
                'id'       => 'tophd-switch',
                'type'     => 'switch',
                'title'    => esc_html__( 'Top Header', 'jadonai' ), 
                'default'  => 0,
                'on'       => 'Show',
                'off'      => 'Hide',
            ),
            array(
                'id'       => 'notification-txt',
                'type'     => 'textarea', 
                'required' => array( 'tophd-switch', '=', '1' ),
                'title'    => esc_html__( 'Notification', 'jadonai' ),
                'default'  => '' 
            ),
            array(
                'id'       => 'email-txt',
                'type'     => 'text', 
                'validate' => 'email',
                'required' => array( 'tophd-switch', '=', '1' ),
                'title'    => esc_html__( 'Email', 'jadonai' ),
                'default'  => ''
            ),
            array(
                'id'       => 'phone-txt',
                'type'     => 'text', 
                'required' => array( 'tophd-switch', '=', '1' ),
                'title'    => esc_html__( 'Phone', 'jadonai' ),
                'default'  => '' 
            ),
            array(
                'id'       => 'txt-clr',
                'type'     => 'color', 
                'required' => array( 'tophd-switch', '=', '1' ),
                'title'    => esc_html__( 'Text Color', 'jadonai' ),
                'default'  => '' 
            ),
            array(
                'id'       => 'icon-clr',
                'type'     => 'color', 
                'required' => array( 'tophd-switch', '=', '1' ),
                'title'    => esc_html__( 'Icon Color', 'jadonai' ),
                'default'  => '' 
            ),
            array(
                'id'       => 'icon-bgclr',
                'type'     => 'color', 
                'required' => array( 'tophd-switch', '=', '1' ),
                'title'    => esc_html__( 'Icon BG Color', 'jadonai' ),
                'default'  => '' 
            ),
            array(
                'id'       => 'back-clr',
                'type'     => 'color', 
                'required' => array( 'tophd-switch', '=', '1' ),
                'title'    => esc_html__( 'Background Color', 'jadonai' ),
                'default'  => '' 
            )
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Main Header', 'jadonai' ), 
        'id'         => 'main-header', 
        'fields'     => array(
            array(
                'id'       => 'logo-up',
                'type'     => 'media', 
                'compiler' => true, 
                'title'    => esc_html__( 'Upload Logo', 'jadonai' ), 
                'desc'    => esc_html__( 'Best Size is (139 X 39) px', 'jadonai' ), 
            ),
            array(
                'id'       => 'logo-width',
                'type'     => 'text',  
                'title'    => esc_html__( 'Logo Width', 'jadonai' ), 
                'desc'    => esc_html__( 'Put a numeric value with px. Such As: 180px ', 'jadonai' ),   
            ),
            array(
                'id'       => 'logo-height',
                'type'     => 'text',  
                'title'    => esc_html__( 'Logo Height', 'jadonai' ), 
                'desc'    => esc_html__( 'Put a numeric value with px. Such As: 45px ', 'jadonai' ), 
            ),
            array(
                'id'       => 'menu-pos',
                'type'     => 'select',  
                'title'    => esc_html__( 'Menu Position', 'jadonai' ),  
                'options'  => array(
                    'left' => esc_html__( 'From Left', 'jadonai' ),  
                    'right' => esc_html__( 'From Right', 'jadonai' ),  
                    'none' => esc_html__( 'Center', 'jadonai' ),  
                ),
                'default'  => 'none'
            ),
            array(
                'id'       => 'menu-clr',
                'type'     => 'color',
                'title'    => esc_html__( 'Menu Color', 'jadonai' ), 
                'default'  => '', 
            ),
            array(
                'id'       => 'menu-hvrclr',
                'type'     => 'color',
                'title'    => esc_html__( 'Menu Hover Color', 'jadonai' ), 
                'default'  => '', 
            ),
            array(
                'id'       => 'menu-hvrbgclr',
                'type'     => 'color',
                'title'    => esc_html__( 'Menu Hover BG Color', 'jadonai' ), 
                'default'  => '', 
            ),
            array(
                'id'       => 'sbmenu-hvrclr',
                'type'     => 'color',
                'title'    => esc_html__( 'Sub Menu Hover Color', 'jadonai' ), 
                'default'  => '', 
            ),
            array(
                'id'       => 'sbmenu-hvrbgclr',
                'type'     => 'color',
                'title'    => esc_html__( 'Sub Menu Hover BG Color', 'jadonai' ), 
                'default'  => '', 
            ),
            array(
                'id'       => 'serch-switch',
                'type'     => 'switch',
                'title'    => esc_html__( 'Search Box', 'jadonai' ), 
                'default'  => 1,
                'on'       => esc_html__( 'Show', 'jadonai' ), 
                'off'      => esc_html__( 'Hide', 'jadonai' ), 
            ),
            array(
                'id'       => 'hdr-bg',
                'type'     => 'color',
                'title'    => esc_html__( 'Background Color', 'jadonai' ), 
                'default'  => '', 
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Slider Options', 'jadonai' ),
        'id'         => 'slider-options',
        'icon'  => 'el el-cog',
        'fields'     => array(
            array(
                'id'       => 'slide-autoplay',
                'type'     => 'select', 
                'title'    => esc_html__( 'Autoplay', 'jadonai' ), 
                'options'  => array(
                    '1' => esc_html__( 'Yes', 'jadonai' ), 
                    '2' => esc_html__( 'No', 'jadonai' ) 
                ),
                'default'  => '1',
            ),
            array(
                'id'       => 'slide-speed',
                'type'     => 'text', 
                'title'    => esc_html__( 'Animation Speed', 'jadonai' ), 
                'default'  => '500',
                'desc'  => esc_html__( 'Put a numeric value Like 100, 200, 300, 400, 500, 600, 700, 800, 900, 1000, 1500, 2000 etc ', 'jadonai' )
            ),
            array(
                'id'       => 'sslide-speed',
                'type'     => 'text', 
                'title'    => esc_html__( 'Slider Speed', 'jadonai' ), 
                'default'  => '3000',
                'desc'  => esc_html__( 'Put a numeric value Like 1000, 1500, 2000, 2500, 3000, 3500, 4000, 5000 etc ', 'jadonai' )
            ),
            array(
                'id'       => 'slide-effect',
                'type'     => 'text', 
                'title'    => esc_html__( 'Effect', 'jadonai' ), 
                'desc'  => esc_html__( 'Animation Example: sliceDown, sliceDownLeft, sliceUp, sliceUpLeft, sliceUpDownLeft, fold, fade, random, slideInRight, slideInLeft, boxRandom, boxRain, boxRainReverse, boxRainGrow, boxRainGrowReverse', 'jadonai' ), 
                'default'  => 'slideInRight',
            ), 
            array(
                'id'       => 'slide-font-size',
                'type'     => 'text', 
                'title'    => esc_html__( 'Title Font Size', 'jadonai' ), 
                'default'  => '72px',
                'desc'  => 'Put numeric value with pixel value. Such As: 72px',
            )
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Advanced Options', 'jadonai' ),
        'id'         => 'adv-options',
        'icon'  => 'el el-cog',
        'fields'     => array( 
            array(
                'id'       => 'css-style',
                'type'     => 'ace_editor', 
                'title'    => esc_html__( 'Custom CSS', 'jadonai' ),  
                'mode'     => 'css',
                'desc'  => esc_html__( 'Put a custom css here for custom design as you like.', 'jadonai' )
            ),  
            array(
                'id'       => 'js-script',
                'type'     => 'ace_editor', 
                'title'    => esc_html__( 'Custom JS', 'jadonai' ),  
                'mode'     => 'js',
                'desc'  => esc_html__( 'Put a custom js here.', 'jadonai' )
            ), 
            array(
                'id'       => 'color-layout',
                'type'     => 'image_select',
                'title'    => esc_html__('Pallete Color Options', 'jadonai'), 
                'desc' => esc_html__('Select a color from here.', 'jadonai'),
                'options'  => array(
                    '1'      => array(
                        'alt'   => esc_html__( 'Blue', 'jadonai' ),  
                        'img'   => get_template_directory_uri().'/img/blue.png'
                    ),
                    '2'      => array(
                        'alt'   => esc_html__( 'Red', 'jadonai' ),  
                        'img'   => get_template_directory_uri().'/img/red.png'
                    ),
                    '3'      => array(
                        'alt'   => esc_html__( 'Green', 'jadonai' ),  
                        'img'   => get_template_directory_uri().'/img/green.png'
                    ),
                    '4'      => array(
                        'alt'   => esc_html__( 'Skype', 'jadonai' ),  
                        'img'   => get_template_directory_uri().'/img/dreen.png'
                    ),
                ),
                'default' => '1'
            )
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Page Settings', 'jadonai' ),
        'id'    => 'jadonai-page',
        'desc'  => esc_html__( 'Multiple page settings support from here', 'jadonai' ), 
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Blog Page', 'jadonai' ), 
        'id'         => 'blog-page',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'blog-title',
                'type'     => 'text',
                'title'    => esc_html__( 'Blog Title', 'jadonai' ),  
                'default'  => esc_html__( 'Latest News', 'jadonai' ), 
                'desc'    => esc_html__( 'If you put empty this field, it will display Default Value', 'jadonai' ), 
            ),
            array(
                'id'       => 'blog-banner',
                'type'     => 'media',
                'title'    => esc_html__( 'Banner Image', 'jadonai' )  
            ),
            array(
                'id'       => 'blog-sidebar',
                'type'     => 'select',
                'title'    => esc_html__( 'Blog Sidebar', 'jadonai' ),
                'options'  => array(
                    'left' => esc_html__( 'Left', 'jadonai' ),
                    'right' => esc_html__( 'Right', 'jadonai' ),
                ),
                'default'  => 'right'  
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Search Page', 'jadonai' ), 
        'id'         => 'search-page',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'srch-title',
                'type'     => 'text',
                'title'    => esc_html__( 'Search Title', 'jadonai' ),  
                'default'  => esc_html__( 'Search News', 'jadonai' ), 
                'desc'    => esc_html__( 'If you put empty this field, it will display Search text', 'jadonai' ), 
            ),
            array(
                'id'       => 'srch-banner',
                'type'     => 'media',
                'title'    => esc_html__( 'Banner Image', 'jadonai' )  
            ),
            array(
                'id'       => 'srch-sidebar',
                'type'     => 'select',
                'title'    => esc_html__( 'Search Sidebar', 'jadonai' ),
                'options'  => array(
                    'left' => esc_html__( 'Left', 'jadonai' ),
                    'right' => esc_html__( 'Right', 'jadonai' ),
                ),
                'default'  => 'right'  
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Archive Page', 'jadonai' ), 
        'id'         => 'archive-page',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'archv-title',
                'type'     => 'text',
                'title'    => esc_html__( 'Archive Title', 'jadonai' ),  
                'default'  => esc_html__( 'Archive News', 'jadonai' ),  
                'desc'    => esc_html__( 'If you put empty this field, it will display Category,Tag, Date as Archive Title', 'jadonai' ),
            ),
            array(
                'id'       => 'archv-banner',
                'type'     => 'media',
                'title'    => esc_html__( 'Banner Image', 'jadonai' )  
            ),
            array(
                'id'       => 'archv-sidebar',
                'type'     => 'select',
                'title'    => esc_html__( 'Archive Sidebar', 'jadonai' ),
                'options'  => array(
                    'left' => esc_html__( 'Left', 'jadonai' ),
                    'right' => esc_html__( 'Right', 'jadonai' ),
                ),
                'default'  => 'right'  
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Footer Options', 'jadonai' ), 
        'id'         => 'footer-options', 
        'fields'     => array(
            array(
                'id'       => 'call-action-glb',
                'type'     => 'info',
                'style'    => 'success',
                'icon'     => 'el el-info-circle',
                'title'    => esc_html__( 'Global Footer', 'jadonai' ) 
            ),
            array(
                'id'       => 'footer-txt-clr',
                'type'     => 'color',  
                'title'    => esc_html__( 'Font Color', 'jadonai' ),
                'default'  => ''
            ),
            array(
                'id'       => 'footer-ico-clr',
                'type'     => 'color',  
                'title'    => esc_html__( 'Icon Color', 'jadonai' ),
                'default'  => ''
            ),
            array(
                'id'       => 'footer-txt-bgimg',
                'type'     => 'media',  
                'title'    => esc_html__( 'Background Image', 'jadonai' ), 
            ),
            array(
                'id'       => 'subscribe-action',
                'type'     => 'info',
                'style'    => 'success',
                'icon'     => 'el el-info-circle',
                'title'    => esc_html__( 'Subscribe Section', 'jadonai' ) 
            ),
            array(
                'id'       => 'subscribe-switch',
                'type'     => 'switch',
                'title'    => esc_html__( 'Subscribe Area', 'jadonai' ), 
                'default'  => 0,
                'on'       => 'Show',
                'off'      => 'Hide',
            ),
            array(
                'id'       => 'subscribe-title',
                'type'     => 'textarea', 
                'required' => array( 'subscribe-switch', '=', '1' ),
                'title'    => esc_html__( 'Subscribe Title', 'jadonai' ),
                'default'  => ''
            ),
            array(
                'id'       => 'subscribe-btnttl',
                'type'     => 'text', 
                'required' => array( 'subscribe-switch', '=', '1' ),
                'title'    => esc_html__( 'Button Title', 'jadonai' ),
                'default'  => ''
            ),
            array(
                'id'       => 'subscribe-btnurl',
                'type'     => 'text', 
                'required' => array( 'subscribe-switch', '=', '1' ),
                'title'    => esc_html__( 'Button Url', 'jadonai' ),
                'default'  => ''
            ),
            array(
                'id'       => 'subscribe-bgc',
                'type'     => 'color', 
                'required' => array( 'subscribe-switch', '=', '1' ),
                'title'    => esc_html__( 'Section BG Color', 'jadonai' ),
                'default'  => ''
            ),
            array(
                'id'       => 'subscribe-fclr',
                'type'     => 'color', 
                'required' => array( 'subscribe-switch', '=', '1' ),
                'title'    => esc_html__( 'Text Color', 'jadonai' ),
                'default'  => ''
            ),
            array(
                'id'       => 'subscribe-btnbgc',
                'type'     => 'color', 
                'required' => array( 'subscribe-switch', '=', '1' ),
                'title'    => esc_html__( 'Button Border Color', 'jadonai' ),
                'default'  => ''
            ),
            array(
                'id'       => 'subscribe-btnfclr',
                'type'     => 'color', 
                'required' => array( 'subscribe-switch', '=', '1' ),
                'title'    => esc_html__( 'Button Text Color', 'jadonai' ),
                'default'  => ''
            ),
            array(
                'id'       => 'call-action',
                'type'     => 'info',
                'style'    => 'success',
                'icon'     => 'el el-info-circle',
                'title'    => esc_html__( 'Call To Action Section', 'jadonai' ) 
            ),
            array(
                'id'       => 'call-action-switch',
                'type'     => 'switch',
                'title'    => esc_html__( 'Call To Action Area', 'jadonai' ), 
                'default'  => 0,
                'on'       => 'Show',
                'off'      => 'Hide',
            ),
            array(
                'id'       => 'call-action-title',
                'type'     => 'text',
                'required' => array( 'call-action-switch', '=', '1' ),
                'title'    => esc_html__( 'Action Title', 'jadonai' ),
                'subtitle' => esc_html__( 'Put Title Here', 'jadonai' ), 
                'default'  => '', 
            ),
            array(
                'id'       => 'call-action-phn',
                'type'     => 'text',
                'required' => array( 'call-action-switch', '=', '1' ),
                'title'    => esc_html__( 'Action Phone Number', 'jadonai' ),
                'subtitle' => esc_html__( 'Put Title Here', 'jadonai' ), 
                'default'  => '', 
            ),
            array(
                'id'       => 'call-action-ttl-clr',
                'type'     => 'color', 
                'title'    => esc_html__( 'Title Font Color', 'jadonai' ),
                'subtitle' => esc_html__( 'Select a color from here', 'jadonai' ), 
                'default'  => '', 
            ),
            array(
                'id'       => 'call-action-phn-clr',
                'type'     => 'color', 
                'title'    => esc_html__( 'Phone Number Color', 'jadonai' ),
                'subtitle' => esc_html__( 'Select a color from here', 'jadonai' ), 
                'default'  => '', 
            ),
            array(
                'id'       => 'call-action-icon-clr',
                'type'     => 'color', 
                'title'    => esc_html__( 'Phone Icon Color', 'jadonai' ),
                'subtitle' => esc_html__( 'Select a color from here', 'jadonai' ), 
                'default'  => '', 
            ),
            array(
                'id'       => 'colmn-foter',
                'type'     => 'info',
                'style'    => 'success',
                'icon'     => 'el el-info-circle',
                'title'    => esc_html__( 'Footer Widget Column', 'jadonai' ) 
            ),
            array(
                'id'       => 'ftr-clmn',
                'type'     => 'select', 
                'title'    => esc_html__( 'Footer Column', 'jadonai' ) ,
                'options'  => array(
                    '2'  => esc_html__( '2 Column', 'jadonai' ) ,
                    '3'  => esc_html__( '3 Column', 'jadonai' ) ,
                    '4'  => esc_html__( '4 Column', 'jadonai' ) ,
                ),
                'default' => '4'
            ),
            array(
                'id'       => 'copy-action',
                'type'     => 'info',
                'style'    => 'success',
                'icon'     => 'el el-info-circle',
                'title'    => esc_html__( 'CopyRight Section', 'jadonai' ) 
            ),
            array(
                'id'       => 'copyright-text',
                'type'     => 'editor',
                'title'    => esc_html__( 'Copyright Text', 'jadonai' ),
                'subtitle' => esc_html__( 'Put Copyright Text Here', 'jadonai' ), 
                'default'  => '&copy; Copyrights Jadonai. All rights reserved.',
                'args'   => array(
                    'teeny'            => true,
                    'textarea_rows'    => 5
                )
            ),
            array(
                'id'       => 'copyright-clr',
                'type'     => 'color', 
                'title'    => esc_html__( 'Font Color', 'jadonai' ),
                'subtitle' => esc_html__( 'Select a color from here', 'jadonai' ), 
                'default'  => '', 
            ),
            array(
                'id'       => 'copyright-bgc',
                'type'     => 'color', 
                'title'    => esc_html__( 'Background Color', 'jadonai' ),
                'subtitle' => esc_html__( 'Select a color from here', 'jadonai' ), 
                'default'  => '', 
            ),
        )
    ) );

    /*
     * <--- END SECTIONS
     */
