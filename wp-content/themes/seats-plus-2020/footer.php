    <footer>
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-md-3">
            <a href="/" class="logo" title="<?php bloginfo('name') ?>">
              <?php bloginfo('name') ?>
            </a>
          </div>
          <div class="col-xs-12 col-md-2">
            <nav class="sitemap" role="navigation">
              <h4>Sitemap</h4>
              <?php footer_nav(); ?>
            </nav>
          </div>
          <div class="col-xs-6 col-md-2">
            <nav class="contact" role="navigation">
              <h4>Contact</h4>
              <?php footer_contact(); ?>
            </nav>
          </div>
          <div class="col-xs-6 col-md-2">
            <nav class="legal" role="navigation">
              <h4>Legal</h4>
              <?php footer_legal(); ?>
            </nav>
          </div>
          <div class="col-xs-12 col-md-3">
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
    <nav class="nav mobile" role="navigation">
      <a class="menu-toggle">
        <span></span>
        <span></span>
        <span></span>
      </a>
      <?php main_nav(); ?>
    </nav>
    </body>

    </html>