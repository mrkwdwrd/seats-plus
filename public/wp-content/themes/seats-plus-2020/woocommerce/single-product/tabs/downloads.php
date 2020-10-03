<?php

global $post;


$downloads = carbon_get_the_post_meta('crb_downloads');
echo '<ul>';
foreach ($downloads as $download) {
  echo '<li>';
  echo '<a href="' . esc_url(wp_get_attachment_url($download['file'])) . '" title="' . $download['title'] . '">' . $download['title'] . '</a>';
  echo '</li>';
}
echo '</ul>';

the_content();
