<!-- Head -->
<?php require_once APPROOT . '/views/inc/head.php' ?>

<title><?= SITENAME ?> | Contact Us</title>

<body class="bg-light">
  <!-- Navbar -->
  <?php require_once APPROOT . '/views/inc/navbar.php' ?>

  <section class="map">
    <iframe class="w-100" height="320" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.1793594585624!2d5.6368199!3d6.2400766!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1040d3ebae0804c1%3A0x5af0bf6e8252bc4!2sBenin%20Sapele%20Rd%2C%20Benin%20City%2C%20Edo%2C%20Nig%C3%A9rie!5e0!3m2!1scs!2scz!4v1701729313382!5m2!1scs!2scz" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </section>

  <section class="contact my-5 pt-5">
    <div class="container px-lg-5">
      <h2 class="text-center text-uppercase mb-4">Let us hear from you direcly!</h2>
      <p class="text-center">At freetown hotel & shortlet apartment, we value your inquiries, feedback, and the opportunity to assist you. Our dedicated support team is designed to be your direct link to exceptional service and prompt assistance.</p>

      <div class="row mt-5 align-items-center">
        <div class="col-lg-6 col-md-6 mb-3 ">
          <div class="bg-whites p-4">
            <div class="mt-3">
              <h6 class="pb-3 border-bottom"><span class="-line"></span>Address</h6>
              <div class="pb-4">
                <i class="las la-map-marker"></i>
                <a href="https://maps.app.goo.gl/kJKetqhyqxQPQaJY7" target="_blank">Plot 4, Okha Town, Sapele Road, Benin City, Edo State.</a>
              </div>
              <div class="mt-3">
                <h6 class="pb-3 border-bottom"> <sub>-</sub> Phone & WhatsApp Number</h6>
                <div class="pb-2">
                  <i class=" las la-phone"></i>
                  <a href="tel: +2349135753996" class="text-dark">09135753996</a>
                </div>
                <div class="pb-2">
                  <i class=" las la-phone"></i>
                  <a href="tel: +234812 481 9667" class="text-dark">0812 481 9667</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 mb-3 ">
          <div class="bg-white p-4">
            <form method="POST">
              <div class="form-group mb-3">
                <input type="text" name="name" id="name" class="form-control shadow-none border" placeholder="Full Name" required>
              </div>
              <div class="form-group mb-3">
                <input type="email" name="email" id="email" class="form-control shadow-none border" placeholder="Email Address" required>
              </div>
              <div class="form-group mb-3">
                <input type="text" name="subject" id="subject" class="form-control shadow-none border" placeholder="Subject" required>
              </div>
              <div class="form-group mb-3">
                <textarea name="message" id="message" rows="5" class="form-control shadow-none border" placeholder="Tell us what we can help you with..." required></textarea>
              </div>
              <div class="form-group mb-3">
                <button type="submit" name="btn_message" class="btn btn-custom-bg border-0 shadow-none rounded-0">Send Message</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  </section>

  <!-- Footer -->
  <?php require_once APPROOT . '/views/inc/footer.php' ?>