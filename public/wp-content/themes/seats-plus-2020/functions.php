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
