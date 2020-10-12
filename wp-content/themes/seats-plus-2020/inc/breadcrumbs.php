<?php
function the_breadcrumb()
{
  global $post, $wp_query;

  if (!is_front_page()) {

    echo '<ul>';

    echo '<li class="item-home"><a class="breadcrumb-link breadcrumb-home" href="' . get_home_url() . '" title="' . get_the_title(get_option('page_on_front'))  . '">' . get_the_title(get_option('page_on_front')) . '</a></li>';

    if (is_archive() && !is_tax() && !is_category() && !is_tag()) {

      echo '<li class="item-current item-archive"><span class="breadcrumb-current breadcrumb-archive">' . post_type_archive_title() . '</span></li>';
    } else if (is_archive() && is_tax() && !is_category() && !is_tag()) {

      $post_type = get_post_type();

      if ($post_type != 'post') {

        $post_type_object = get_post_type_object($post_type);
        $post_type_archive = get_post_type_archive_link($post_type);

        echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="breadcrumb-cat breadcrumb-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
      }

      $custom_tax_name = get_queried_object()->name;
      echo '<li class="item-current item-archive"><span class="breadcrumb-current breadcrumb-archive">' . $custom_tax_name . '</span></li>';
    } else if (is_single()) {

      $post_type = get_post_type();

      if ($post_type != 'post') {

        $post_type_object = get_post_type_object($post_type);
        $post_type_archive = get_post_type_archive_link($post_type);

        echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="breadcrumb-cat breadcrumb-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
      }

      $category = get_the_category();

      if (!empty($category)) {

        // $last_category = end(array_values($category));
        $last_category = $category[count($category) - 1];

        $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','), ',');
        $cat_parents = explode(',', $get_cat_parents);

        $cat_display = '';
        // foreach ($cat_parents as $parents) {
        //   $cat_display .= '<li class="item-cat">' . $parents . '</li>';
        // }
      }

      if (!empty($last_category)) {
        echo $cat_display;
        echo '<li class="item-current item-' . $post->ID . '"><span class="breadcrumb-current breadcrumb-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</span></li>';
      } else if (!empty($cat_id)) {

        echo '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="breadcrumb-cat breadcrumb-cat-' . $cat_id . ' breadcrumb-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
        echo '<li class="item-current item-' . $post->ID . '"><span class="breadcrumb-current breadcrumb-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</span></li>';
      } else {

        echo '<li class="item-current item-' . $post->ID . '"><span class="breadcrumb-current breadcrumb-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</span></li>';
      }
    } else if (is_category()) {

      echo '<li class="item-current item-cat"><span class="breadcrumb-current breadcrumb-cat">' . single_cat_title('', false) . '</span></li>';
    } else if (is_page()) {

      if ($post->post_parent) {

        $anc = get_post_ancestors($post->ID);

        $anc = array_reverse($anc);

        if (!isset($parents)) $parents = null;
        foreach ($anc as $ancestor) {
          $parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="breadcrumb-parent breadcrumb-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
        }

        echo $parents;

        echo '<li class="item-current item-' . $post->ID . '"><span title="' . get_the_title() . '"> ' . get_the_title() . '</span></li>';
      } else {

        echo '<li class="item-current item-' . $post->ID . '"><span class="breadcrumb-current breadcrumb-' . $post->ID . '"> ' . get_the_title() . '</span></li>';
      }
    } else if (is_tag()) {

      $term_id        = get_query_var('tag_id');
      $taxonomy       = 'post_tag';
      $args           = 'include=' . $term_id;
      $terms          = get_terms($taxonomy, $args);
      $get_term_id    = $terms[0]->term_id;
      $get_term_slug  = $terms[0]->slug;
      $get_term_name  = $terms[0]->name;

      echo '<li class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><span class="breadcrumb-current breadcrumb-tag-' . $get_term_id . ' breadcrumb-tag-' . $get_term_slug . '">' . $get_term_name . '</span></li>';
    } elseif (is_day()) {

      echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="breadcrumb-year breadcrumb-year-' . get_the_time('Y') . '" href="' . get_year_link(get_the_time('Y')) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';

      echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="breadcrumb-month breadcrumb-month-' . get_the_time('m') . '" href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';

      echo '<li class="item-current item-' . get_the_time('j') . '"><span class="breadcrumb-current breadcrumb-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</span></li>';
    } else if (is_month()) {

      echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="breadcrumb-year breadcrumb-year-' . get_the_time('Y') . '" href="' . get_year_link(get_the_time('Y')) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';

      echo '<li class="item-month item-month-' . get_the_time('m') . '"><span class="breadcrumb-month breadcrumb-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</span></li>';
    } else if (is_year()) {

      echo '<li class="item-current item-current-' . get_the_time('Y') . '"><span class="breadcrumb-current breadcrumb-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</span></li>';
    } else if (is_author()) {

      global $author;
      $userdata = get_userdata($author);

      echo '<li class="item-current item-current-' . $userdata->user_nicename . '"><span class="breadcrumb-current breadcrumb-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</span></li>';
    } else if (get_query_var('paged')) {

      echo '<li class="item-current item-current-' . get_query_var('paged') . '"><span class="breadcrumb-current breadcrumb-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">' . __('Page') . ' ' . get_query_var('paged') . '</span></li>';
    } else if (is_search()) {

      echo '<li class="item-current item-current-' . get_search_query() . '"><span class="breadcrumb-current breadcrumb-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</span></li>';
    } elseif (is_404()) {

      echo '<li>' . 'Error 404' . '</li>';
    }

    echo '</ul>';
  }
}
