    <footer>
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-lg-3">
            <a href="/" class="logo" title="<?php bloginfo('name') ?>">
              <?php bloginfo('name') ?>
            </a>
            <div class="social">
              <ul>
                <?php if (get_theme_mod('facebook')) : ?>
                  <li class="icon facebook"><a href="<?php echo get_theme_mod('facebook'); ?>" target="_blank" title="<?php bloginfo('name'); ?> on Facebook"><?php bloginfo('name'); ?> on Facebook</a></li>
                <?php endif; ?>
                <?php if (get_theme_mod('twitter')) : ?>
                  <li class="icon twitter"><a href="<?php echo get_theme_mod('twitter'); ?>" target="_blank" title="<?php bloginfo('name'); ?> on Twitter"><?php bloginfo('name'); ?> on Twitter</a></li>
                <?php endif; ?>
                <?php if (get_theme_mod('instagram')) : ?>
                  <li class="icon instagram"><a href="<?php echo get_theme_mod('instagram'); ?>" target="_blank" title="<?php bloginfo('name'); ?> on Instagram"><?php bloginfo('name'); ?> on Instagram</a></li>
                <?php endif; ?>
                <?php if (get_theme_mod('youtube')) : ?>
                  <li class="icon youtube"><a href="<?php echo get_theme_mod('youtube'); ?>" target="_blank" title="<?php bloginfo('name'); ?> on YouTube"><?php bloginfo('name'); ?> on YouTube</a></li>
                <?php endif; ?>
                <?php if (get_theme_mod('linkedin')) : ?>
                  <li class="icon linkedin"><a href="<?php echo get_theme_mod('linkedin'); ?>" target="_blank" title="<?php bloginfo('name'); ?> on LinkedIn"><?php bloginfo('name'); ?> on LinkedIn</a></li>
                <?php endif; ?>
                <?php if (get_theme_mod('pintrest')) : ?>
                  <li class="icon pintrest"><a href="<?php echo get_theme_mod('pintrest'); ?>" target="_blank" title="<?php bloginfo('name'); ?> on Pintrest"><?php bloginfo('name'); ?> on Pintrest</a></li>
                <?php endif; ?>
              </ul>
            </div>
          </div>
          <div class="col-xs-12 col-lg-2">
            <nav class="sitemap" role="navigation">
              <h4>Sitemap</h4>
              <?php footer_nav(); ?>
            </nav>
          </div>
          <div class="col-xs-6 col-lg-2">
            <nav class="contact" role="navigation">
              <h4>Contact</h4>
              <div class="menu-footer-contact-container">
                <ul>
                  <?php if (get_theme_mod('phone')) : ?>
                    <li class="menu-item"><a href="tel:<?php echo get_theme_mod('phone'); ?>"><?php echo get_theme_mod('phone'); ?></a></li>
                  <?php endif; ?>
                  <?php if (get_theme_mod('email')) : ?>
                    <li class="menu-item"><a href="mailto:<?php echo get_theme_mod('email'); ?>"><?php echo get_theme_mod('email'); ?></a></li>
                  <?php endif; ?>
                </ul>
              </div>
            </nav>
          </div>
          <div class="col-xs-6 col-lg-2">
            <nav class="legal" role="navigation">
              <h4>Legal</h4>
              <?php footer_legal(); ?>
            </nav>
          </div>
          <div class="col-xs-12 col-lg-3">
            <div class="form">
              <h4>Newsletter</h4>
              <!--[if lte IE 8]>
              <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
              <![endif]-->
              <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
              <script>
                hbspt.forms.create({
                  portalId: "7796129",
                  formId: "1aeef208-2fba-4cb2-acf5-6256520dbe67"
                });
              </script>
            </div>
          </div>
        </div>
        <div class="row credits">
          <div>
            <p>&copy; <?php echo date('Y') ?> SeatsPlus</p>
          </div>
          <div>
            <p><a href="//360south.com.au" target"_blank" title="Website by 360South">Website by 360South</a></p>
          </div>
        </div>
      </div>
    </footer>

    <?php wp_footer(); ?>
    <nav class="floating-get-quote">
      <a href="<?php echo wc_get_cart_url() ?>" class="button primary" title="Get a quote">Get a quote</a>
    </nav>
    <nav class="nav mobile" role="navigation">
      <a class="menu-toggle">
        <span></span>
        <span></span>
        <span></span>
      </a>
      <?php main_nav(); ?>
    </nav>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MTMNPX4" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    </body>

    </html>