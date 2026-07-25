<?php get_header(); ?>

<main>

  <div class="group-div">

    <div class="contact-form-div">
      <form method="POST" id="contact-form">
        <fieldset>
          <legend>Contact Form</legend>
          <input type="hidden" name="access_key" value="f86dfd61-2f0b-465c-bb38-2c52a29036b4">

          <div class="form-field">
            <label for="name">Full Name</label>
            <input type="text" name="name" required placeholder="Your Name">
          </div>
          <div class="form-field">
            <label for="email">Email Address</label>
            <input type="email" name="email" required placeholder="you@company.com">
          </div>
          <div class="form-field">
            <label for="phone">Phone Number</label>
            <input id="tel-input" type="tel" name="phone" pattern="\+?[0-9\s\-]+" placeholder="(+1) 123-456-7890">
          </div>
          <div class="form-field">
            <fieldset>
              <legend>What service(s) interests you</legend>

              <div data-group="services" class="services-options">
                <label>
                  <input type="checkbox" name="services" value="mobile-phlebotomy" />
                  Mobile Phlebotomy
                </label>
                <label>
                  <input type="checkbox" name="services" value="biofeedback-scan" />
                  Biofeedback Scan
                </label>

                <label>
                  <input type="checkbox" name="services" value="spatial-harmony" />
                  Spatial Harmony
                </label>
              </div>

            </fieldset>
          </div>

          <div class="form-field">
            <label for="message">Your Message</label>
            <textarea rows="5" name="message" required placeholder="Your Message"></textarea>
          </div>

          <!-- Honeypot Spam Protection -->
          <input type="checkbox" name="botcheck" class="hidden" style="display: none;">

          <button type="submit">Submit Form</button>

          <div id="result"></div>

          <div class="loader-overlay">
            <div class="loader"></div>
          </div>
        </fieldset>
      </form>
    </div>

    <div class="map-embed">
      <iframe
        src="https://www.google.com/maps/d/u/0/embed?mid=1wiVTDzqe4GBbui-BIl7JslT2QELcam0&ehbc=2E312F&noprof=1"
        width="640" height="480"></iframe>
    </div>

  </div>

  <div class="page-content <?php echo esc_attr(get_page_content_class()); ?>">
    <?php
    if (have_posts()) :
      while (have_posts()) : the_post();
        the_content();
      endwhile;
    endif;
    ?>
  </div>

</main>

<?php get_footer(); ?>
