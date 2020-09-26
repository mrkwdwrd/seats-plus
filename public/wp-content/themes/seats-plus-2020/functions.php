<?php

/**
 * Theme Name: Seats Plus 2020
 * Theme URI: https://seatsplus.com.au
 * Description: Seats Plus 2020 Wordpress Theme
 * Version: 0.0.1
 * Author: Mark Woodward | 360South
 * URL: https://360south.com.au
 */

// Add carbon fields for field csutomisations
// https://carbonfields.net/docs/

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'crb_attach_theme_options');
function crb_attach_theme_options()
{
    Container::make('post_meta', 'Slider')
        ->where('post_type', '=', 'page')
        ->where('post_template', '=', 'template-home-page.php')
        ->add_fields(array(
            Field::make('complex', 'crb_slides')->add_fields(array(
                Field::make('image', 'image')->set_width(2),
                Field::make('textarea', 'crb_caption', 'Caption')
                    ->set_rows(4)->set_width(20),
                Field::make('association', 'crb_association', 'Link to')
                    ->set_types(
                        array(
                            array('type' => 'post', 'post_type' => 'product'),
                            array('type' => 'post', 'post_type' => 'page')
                        )
                    )->set_max(1)->set_width(50),
            ))->set_layout('tabbed-horizontal'),
        ));
}

add_action('after_setup_theme', 'crb_load');
function crb_load()
{
    require_once('vendor/autoload.php');
    \Carbon_Fields\Carbon_Fields::boot();
}

// Theme Support
if (function_exists('add_theme_support')) {
    // Add Menu Support
    add_theme_support('menus');
}

// Functions
function main_nav()
{
    wp_nav_menu(
        array(
            'theme_location'  => 'header-menu',
            'menu'            => '',
            'container'       => 'div',
            'container_class' => 'menu-{menu slug}-container',
            'container_id'    => '',
            'menu_class'      => 'menu',
            'menu_id'         => '',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'before'          => '',
            'after'           => '',
            'link_before'     => '',
            'link_after'      => '',
            'items_wrap'      => '<ul>%3$s</ul>',
            'depth'           => 0,
            'walker'          => ''
        )
    );
}

function footer_nav()
{
    wp_nav_menu(
        array(
            'theme_location'  => 'footer-sitemap',
            'menu'            => '',
            'container'       => 'div',
            'container_class' => 'menu-{menu slug}-container',
            'container_id'    => '',
            'menu_class'      => 'menu',
            'menu_id'         => '',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'before'          => '',
            'after'           => '',
            'link_before'     => '',
            'link_after'      => '',
            'items_wrap'      => '<ul>%3$s</ul>',
            'depth'           => 0,
            'walker'          => ''
        )
    );
}

function footer_contact()
{
    wp_nav_menu(
        array(
            'theme_location'  => 'footer-contact',
            'menu'            => '',
            'container'       => 'div',
            'container_class' => 'menu-{menu slug}-container',
            'container_id'    => '',
            'menu_class'      => 'menu',
            'menu_id'         => '',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'before'          => '',
            'after'           => '',
            'link_before'     => '',
            'link_after'      => '',
            'items_wrap'      => '<ul>%3$s</ul>',
            'depth'           => 0,
            'walker'          => ''
        )
    );
}

function footer_legal()
{
    wp_nav_menu(
        array(
            'theme_location'  => 'footer-legal',
            'menu'            => '',
            'container'       => 'div',
            'container_class' => 'menu-{menu slug}-container',
            'container_id'    => '',
            'menu_class'      => 'menu',
            'menu_id'         => '',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'before'          => '',
            'after'           => '',
            'link_before'     => '',
            'link_after'      => '',
            'items_wrap'      => '<ul>%3$s</ul>',
            'depth'           => 0,
            'walker'          => ''
        )
    );
}

// Register Navigation
function register_menus()
{
    register_nav_menus(array(
        'header-menu' => __('Header Menu'),
        'footer-sitemap' => __('Footer Sitemap'),
        'footer-contact' => __('Footer Contact'),
        'footer-legal' => __('Footer Legal')
    ));
}

// Actions
add_action('init', 'register_menus');
