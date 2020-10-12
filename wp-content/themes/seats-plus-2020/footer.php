    <footer>
      <div class="container">
        <div class="row">
          <div class="col-xs-3">
            <a href="/" class="logo" title="<?php bloginfo('name') ?>">
              <?php bloginfo('name') ?>
            </a>
          </div>
          <div class="col-xs-2">
            <h4>Sitemap</h4>
            <nav class="nav" role="navigation">
              <?php footer_nav(); ?>
            </nav>
          </div>
          <div class="col-xs-2">
            <h4>Contact</h4>
            <nav class="nav" role="navigation">
              <?php footer_contact(); ?>
            </nav>
          </div>
          <div class="col-xs-2">
            <h4>Legal</h4>
            <nav class="nav" role="navigation">
              <?php footer_legal(); ?>
            </nav>
          </div>
          <div class="col-xs-3">
            <form>
              <label for="email">Newsletter</label>
              <fieldset>
                <input type="email" name="email" placeholder="Your email" />
                <button type="submit">Subscribe</button>
              </fieldset>
            </form>
          </div>
        </div>
        <div class="row credits">
          <div>
            <p>&copy; <?php echo date('Y') ?> SeatsPlus</p>
          </div>
          <div>
            <p>Website by 360South</p>
          </div>
        </div>
      </div>
    </footer>
    <?php wp_footer(); ?>
    </body>

    </html>