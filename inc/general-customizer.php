<?php
/**
 * This is just a basic example of how to implement Customizer settings
 * @param $wp_customize
 */
function general_customize_register($wp_customize)
{

    $wp_customize->add_panel('general_panel', array(
        'title' => __('General Page Options', 'snodev'),
        'priority' => 30,
        'capability' => 'edit_theme_options',
        'description' => __('Content, photos and social links for the whole site', 'snodev')
    ));

    /**
     * Start: Contact Options
     */
    $wp_customize->add_section('snodev_contact_section', array(
        'title' => __('Contact Options', 'snodev'),
        'priority' => 30,
        'panel' => 'general_panel',
        'description' => __('Contact addresses, phone numbers, emails, and more contact options for the whole site', 'snodev')
    ));

    $wp_customize->add_setting('snodev_physical_address',
        array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport' => 'refresh',
        )
    );

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'snodev_physical_address_control',
        array(
            'label' => __('Physical Address', 'snodev'),
            'settings' => 'snodev_physical_address',
            'priority' => 10,
            'section' => 'snodev_contact_section',
            'type' => 'textarea',
        )
    ));

    $wp_customize->add_setting('snodev_postal_address',
        array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport' => 'refresh',
        )
    );

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'snodev_postal_address_control',
        array(
            'label' => __('Postal Address', 'snodev'),
            'settings' => 'snodev_postal_address',
            'priority' => 10,
            'section' => 'snodev_contact_section',
            'type' => 'textarea',
        )
    ));

    $wp_customize->add_setting('snodev_phone',
        array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport' => 'refresh',
        )
    );

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'snodev_phone_control',
        array(
            'label' => __('Phone Number', 'snodev'),
            'settings' => 'snodev_phone',
            'priority' => 10,
            'section' => 'snodev_contact_section',
            'type' => 'textarea',
        )
    ));

    $wp_customize->add_setting('snodev_email',
        array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport' => 'refresh',
        )
    );

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'snodev_email_control',
        array(
            'label' => __('Email Address', 'snodev'),
            'settings' => 'snodev_email',
            'priority' => 10,
            'section' => 'snodev_contact_section',
            'type' => 'textarea',
        )
    ));

    $wp_customize->add_setting('snodev_contact_page_banner',
        array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport' => 'refresh',
        )
    );

    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        'snodev_contact_page_banner_control',
        array(
            'label' => __('Contact Page Banner', 'snodev'),
            'settings' => 'snodev_contact_page_banner',
            'priority' => 10,
            'section' => 'snodev_contact_section',
        )
    ));

    /**
     * #End: Contact Options
     */
}