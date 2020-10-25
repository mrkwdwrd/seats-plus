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

include_once 'inc/breadcrumbs.php';

// Theme Support
if (function_exists('add_theme_support')) {
    // Add Menu Support
    add_theme_support('menus');
}

// Functions
function header_scripts()
{
    if ($GLOBALS['pagenow'] !== 'wp-login.php' && !is_admin()) {
        wp_register_script('manifest', get_template_directory_uri() . '/js/manifest.js', '', '', true);
        wp_enqueue_script('manifest');

        wp_register_script('vendor', get_template_directory_uri() . '/js/vendor.js', '', '', true);
        wp_enqueue_script('vendor');

        wp_register_script('swiper', get_template_directory_uri() . '/lib/swiper/swiper-bundle.min.js', '', '', true);
        wp_enqueue_script('swiper');

        wp_register_script('selectize', get_template_directory_uri() . '/lib/selectize/js/standalone/selectize.min.js', '', '', true);
        wp_enqueue_script('selectize');

        wp_register_script('scripts', get_template_directory_uri() . '/js/app.js', '', '', true);
        wp_enqueue_script('scripts');
    }
}

function theme_styles()
{
    wp_register_style('styles', get_template_directory_uri() . '/style.css', '', 'all');
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
            'container_class' => 'menu-main-nav-container',
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

function secondary_nav()
{
    wp_nav_menu(
        array(
            'theme_location'  => 'header-secondary',
            'menu'            => '',
            'container'       => 'div',
            'container_class' => 'menu-secondary-nav-container',
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
            'container_class' => 'menu-footer-nav-container',
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
            'container_class' => 'menu-footer-contact-container',
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
            'container_class' => 'menu-footer-legal-container',
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
        'header-secondary'  => __('Header Secondary'),
        'footer-sitemap'    => __('Footer Sitemap'),
        'footer-contact'    => __('Footer Contact'),
        'footer-legal'      => __('Footer Legal')
    ));
}

// Register Projects Custom Posts
function register_projects()
{
    register_taxonomy_for_object_type('category', 'project');
    register_taxonomy_for_object_type('tag', 'project');
    register_post_type(
        'project',
        array(
            'rewrite' => array(
                'slug'                  => 'our-work',
            ),
            'labels' => array(
                'name'                  => __('Our Work'),
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
                'thumbnail'
            ),
            'can_export'    => true,
            'taxonomies'    => array(
                'tag',
                'category'
            )
        )
    );
}


// Add carbon fields for field customisations
// https://carbonfields.net/docs/
function crb_attach_theme_options()
{
    Container::make('theme_options', 'SeatsPlus')
        ->add_fields([
            Field::make('file', 'catalogue', 'Catalogue PDF')
        ]);

    Container::make('post_meta', 'Slider')
        ->where('post_type', '=', 'page')
        ->where('post_template', '=', 'template-home-page.php')
        ->add_fields([
            Field::make('complex', 'crb_slides', '')
                ->add_fields([
                    Field::make('image', 'image'),
                    Field::make('textarea', 'crb_caption', 'Caption')->set_rows(4),
                    Field::make('text', 'button_text'),
                    Field::make('association', 'crb_association', 'Link to')
                        ->set_types(
                            [
                                ['type' => 'post', 'post_type' => 'product'],
                                ['type' => 'post', 'post_type' => 'page']
                            ]
                        )->set_max(1),
                ])->set_layout('tabbed-horizontal'),
        ]);

    Container::make('post_meta', 'Features')
        ->where('post_type', '=', 'page')
        ->where('post_template', '=', 'template-home-page.php')
        ->add_fields([
            Field::make('complex', 'crb_features', '')
                ->add_fields([
                    Field::make('image', 'icon'),
                    Field::make('text', 'title'),
                    Field::make('textarea', 'content'),
                ])
                ->set_layout('grid')
        ]);

    Container::make('post_meta', 'Clients')
        ->where('post_type', '=', 'page')
        ->where('post_template', '=', 'template-home-page.php')
        ->add_fields([
            Field::make('complex', 'crb_clients', '')
                ->add_fields([
                    Field::make('image', 'logo')->set_width(10),
                    Field::make('text', 'name')->set_width(10),
                ])
                ->set_layout('grid')
        ]);

    // Product Downloads
    Container::make('post_meta', 'Downloads')
        ->where('post_type', '=', 'product')
        ->add_fields([
            Field::make('complex', 'crb_downloads', '')
                ->add_fields([
                    Field::make('file', 'file'),
                    Field::make('text', 'title')
                ])
                ->set_layout('grid')
        ]);

    // Colour Guide
    Container::make('post_meta', 'Colours')
        ->where('post_type', '=', 'page')
        ->where('post_template', '=', 'template-colour-chart.php')
        ->add_fields([
            Field::make('complex', 'crb_colours', '')
                ->add_fields([
                    Field::make('select', 'category')
                        ->add_options([
                            'brights' => 'Brights',
                            'colorbond' => 'Colorbond'
                        ])->set_width(10),
                    Field::make('text', 'name')->set_width(10),
                    Field::make('color', 'colour')->set_width(10)
                ])
                ->set_layout('grid')
        ]);

    // Project Content
    Container::make('post_meta', 'Project Content')
        ->where('post_type', '=', 'project')
        ->add_fields([
            Field::make('text', 'crb_client', 'Client'),
            Field::make('text', 'crb_location', 'Location'),
            // Field::make('rich_text', 'crb_location_content', 'Location'),
            Field::make('rich_text', 'crb_requirement_content', 'Requirement'),
            Field::make('rich_text', 'crb_solution_content', 'Solution'),
            Field::make('rich_text', 'crb_result_content', 'Result'),
        ]);

    // Project Images
    Container::make('post_meta', 'Slider')
        ->where('post_type', '=', 'project')
        ->add_fields([
            Field::make('complex', 'crb_slides', '')
                ->add_fields([
                    Field::make('image', 'image'),
                ])->set_layout('tabbed-horizontal'),
        ]);

    // FAQs
    Container::make('post_meta', 'FAQs')
        ->where('post_type', '=', 'page')
        ->where('post_template', '=', 'template-faqs.php')
        ->add_fields([
            Field::make('complex', 'crb_faqs', '')
                ->add_fields([
                    Field::make('text', 'title'),
                    Field::make('rich_text', 'content'),
                ])
                ->set_layout('grid')
        ]);
}

function crb_load()
{
    require_once('vendor/autoload.php');
    \Carbon_Fields\Carbon_Fields::boot();
}

// Add catalogue link to menu
add_filter('wp_nav_menu_objects', 'inject_catalogue_links_into_menu', 10, 2);

function inject_catalogue_links_into_menu($items, $args)
{
    $catalogue_id = carbon_get_theme_option('catalogue');
    $catalogue_url = wp_get_attachment_url($catalogue_id);

    foreach ($items as $item) {
        if ($item->title == 'Catalogue') {
            $item->target = '_blank';
            $item->url = $catalogue_url;
        }
    }
    return $items;
}


// Add WooCommerce Support
function add_woocommerce_support()
{
    add_theme_support('woocommerce');
}

// Rename tab
function woo_rename_tab($tabs)
{
    $tabs['additional_information']['title'] = 'Technical';
    return $tabs;
}

// Add downloads tab
function woo_new_product_tab($tabs)
{
    if (carbon_get_the_post_meta('crb_downloads')) {
        $tabs['downloads'] = [
            'title'        => __('Downloads & resources', 'woocommerce'),
            'callback'     => 'downloads_callback'
        ];
    }
    return $tabs;
}

// Get downloads
function downloads_callback()
{
    $downloads = carbon_get_the_post_meta('crb_downloads');
    echo '<ul>';
    foreach ($downloads as $download) {
        echo '<li>';
        echo '<a href="' . esc_url(wp_get_attachment_url($download['file'])) . '" title="' . $download['title'] . '">' . $download['title'] . '</a>';
        echo '</li>';
    }
    echo '</ul>';
}

// Customise exceprt display
function custom_excerpt_length($length)
{
    return 300;
}
function custom_excerpt_more($more)
{
    return '';
}

// Actions
add_action('init', 'header_scripts');
add_action('wp_enqueue_scripts', 'theme_styles');
add_action('wp_enqueue_scripts', 'header_cleanup');
add_filter('body_class', 'add_slug_to_body_class');

add_action('init', 'register_menus');
add_action('init', 'register_projects');

add_action('carbon_fields_register_fields', 'crb_attach_theme_options');
add_action('after_setup_theme', 'crb_load');
add_action('after_setup_theme', 'add_woocommerce_support');

add_filter('woocommerce_product_tabs', 'woo_rename_tab');
add_filter('woocommerce_product_tabs', 'woo_new_product_tab');

add_filter('get_the_archive_title', function ($title) {
    if (is_category()) {
        $title = single_cat_title('', false);
    } elseif (is_tag()) {
        $title = single_tag_title('', false);
    } elseif (is_author()) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif (is_tax()) { //for custom post types
        $title = sprintf(__('%1$s'), single_term_title('', false));
    } elseif (is_post_type_archive()) {
        $title = post_type_archive_title('', false);
    }
    return $title;
});

add_filter('excerpt_length', 'custom_excerpt_length');
add_filter('excerpt_more', 'custom_excerpt_more');

add_filter('woocommerce_get_image_size_gallery_thumbnail', function () {
    return array(
        'width' => 1200,
        'height' => 900,
        'crop' => 1,
    );
});
add_filter('woocommerce_get_image_size_thumbnail', function () {
    return array(
        'width' => 920,
        'height' => 690,
        'crop' => 1,
    );
});

add_filter('woocommerce_output_related_products_args', function () {
    return array(
        'posts_per_page' => 6
    );
});

add_filter('woocommerce_single_product_image_thumbnail_html', function ($html) {
    return preg_replace("!<(a|/a).*?>!", '', $html);
});

add_filter('woocommerce_placeholder_img_src', function () {
    $theme = get_stylesheet_directory_uri();
    return $theme . '/images/placeholder.png';
});

add_filter('woocommerce_placeholder_img_src', 'custom_woocommerce_placeholder_img_src');
function custom_woocommerce_placeholder_img_src($src)
{
    $theme = get_stylesheet_directory_uri();
    return $theme . '/images/placeholder.png';
}

remove_action('woocommerce_before_shop_loop', 'wc_print_notices', 10); /*Archive Product*/
remove_action('woocommerce_before_single_product', 'wc_print_notices', 10); /*Single Product*/
remove_action('storefront_content_top', 'storefront_shop_messages', 1);

// Customise WooCommerce text
add_filter('woocommerce_product_single_add_to_cart_text', 'custom_single_add_to_cart_text');
function custom_single_add_to_cart_text()
{
    return 'Add To Quote';
}

add_filter('gettext', 'proceed_to_checkout_to_add_your_details');
add_filter('ngettext', 'proceed_to_checkout_to_add_your_details');

function proceed_to_checkout_to_add_your_details($replaced)
{
    return str_ireplace('proceed to checkout', 'add your details', $replaced);
}

add_filter('gettext', 'place_order_to_request_quote');
add_filter('ngettext', 'place_order_to_request_quote');

function place_order_to_request_quote($replaced)
{
    return str_ireplace('place order', 'request quote', $replaced);
}

add_filter('gettext', 'cart_to_quote');
add_filter('ngettext', 'cart_to_quote');

function cart_to_quote($replaced)
{
    return str_ireplace('cart', 'quote', $replaced);
}

// add_filter('gettext', 'order_to_quote_request');
add_filter('ngettext', 'order_to_quote_request');

function order_to_quote_request($replaced)
{
    return str_ireplace('order', 'quote request', $replaced);
}
