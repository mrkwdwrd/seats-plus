<?php

/**
 * Theme Name: Seats Plus 2020
 * Theme URI: https://seatsplus.com.au
 * Description: Seats Plus 2020 Wordpress Theme
 * Version: 0.0.1
 * Author: Mark Woodward | 360South
 * URL: https://360south.com.au
 */

use Carbon_Fields\Container;
use Carbon_Fields\Field;

// Theme Support
if (function_exists('add_theme_support')) {
    // Add Menu Support
    add_theme_support('menus');
}

// Functions
function header_scripts()
{
    if ($GLOBALS['pagenow'] !== 'wp-login.php' && !is_admin()) {
        wp_register_script('manifest', get_template_directory_uri() . '/js/manifest.js', '1.0.0');
        wp_enqueue_script('manifest');

        wp_register_script('vendor', get_template_directory_uri() . '/js/vendor.js', '1.0.0');
        wp_enqueue_script('vendor');

        wp_register_script('scripts', get_template_directory_uri() . '/js/app.js', '1.0.0');
        wp_enqueue_script('scripts');
    }
}

function theme_styles()
{
    wp_register_style('styles', get_template_directory_uri() . '/style.css', '1.0.0', 'all');
    wp_enqueue_style('styles');
}

// Cleanup  Wordpress stuff in the header that is likely uneeded
function header_cleanup()
{
    remove_action('wp_head', 'feed_links_extra', 3);
    remove_action('wp_head', 'feed_links', 2);
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'index_rel_link');
    remove_action('wp_head', 'parent_post_rel_link', 10, 0);
    remove_action('wp_head', 'start_post_rel_link', 10, 0);
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
    remove_action('wp_head', 'wp_generator');
    if (!is_admin()) {
        // Use theme's jQuery version for nom admin
        wp_deregister_script('jquery');
        wp_register_script('jquery', '', '', '', true);
    }
}

// Inlcude page slug in body class (Credit: https://github.com/aaronallport/starkers)
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

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
        'header-menu'       => __('Header Menu'),
        'footer-sitemap'    => __('Footer Sitemap'),
        'footer-contact'    => __('Footer Contact'),
        'footer-legal'      => __('Footer Legal')
    ));
}

// Register Projects Custom Posts
function register_projects()
{
    register_taxonomy_for_object_type('category', 'project');
    register_taxonomy_for_object_type('post_tag', 'project');
    register_post_type(
        'project',
        array(
            'labels' => array(
                'name'                  => __('Projects'),
                'singular_name'         => __('Project'),
                'add_new'               => __('Add New'),
                'add_new_item'          => __('Add New Project'),
                'edit'                  => __('Edit'),
                'edit_item'             => __('Edit Project'),
                'new_item'              => __('New Project'),
                'view'                  => __('View Project'),
                'view_item'             => __('View Project'),
                'search_items'          => __('Search Projects'),
                'not_found'             => __('No Projects found'),
                'not_found_in_trash'    => __('No Projects found in Trash')
            ),
            'public'        => true,
            'hierarchical'  => false,
            'has_archive'   => true,
            'supports'      => array(
                'title',
                'editor',
                'excerpt',
                'thumbnail'
            ),
            'can_export'    => true,
            'taxonomies'    => array(
                'post_tag',
                'category'
            )
        )
    );
}

// Add carbon fields for field csutomisations
// https://carbonfields.net/docs/
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

function crb_load()
{
    require_once('vendor/autoload.php');
    \Carbon_Fields\Carbon_Fields::boot();
}

// Actions
add_action('init', 'header_scripts');
add_action('wp_enqueue_scripts', 'theme_styles');
add_action('init', 'header_cleanup');
add_filter('body_class', 'add_slug_to_body_class');

add_action('init', 'register_menus');
add_action('init', 'register_projects');

add_action('carbon_fields_register_fields', 'crb_attach_theme_options');
add_action('after_setup_theme', 'crb_load');
