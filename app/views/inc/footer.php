<footer class="bg-white border-top">
  <div class="container py-4">
    <div class="row align-items-cente">

      <div class="col-lg-6 mb-lg-0 mb-md-3">
        <a href="<?= URLROOT ?>" class="text-dark">
          <h5 class="text-uppercase mb- me-3"><?= SITELOGO ?></h5>
        </a>
        <p class="mb-0" style="font-size: .95rem;">Freetown hotel and shortlet apartment expect a seamless and tranquil luxury travel experience. Upon reservation, look forward to a serene retreat at our prestigious hotel nestled in the heart of Benin, where relaxation is paramount.</p>
      </div>

      <div class="col-lg-2 col-md-6 mb-lg-0 mb-md-3">
        <h6 class="text-uppercas pb-3 border-bottom">Pages</h6>
        <ul>
          <li><a href="<?= URLROOT ?>/rooms" class="text-dark">Rooms</a></li>
          <li><a href="<?= URLROOT ?>/facilities" class="text-dark">Facilities</a></li>
          <li><a href="<?= URLROOT ?>/about" class="text-dark">About Us</a></li>
          <li><a href="<?= URLROOT ?>/contact" class="text-dark">Contact Us</a></li>
          <li><a href="<?= URLROOT ?>/shortlet" class="text-dark">Short Let/Apartment</a></li>
        </ul>
      </div>
      <div class="col-lg-2 col-md-6 mb-lg-0 mb-3">
        <h6 class="text-uppercas pb-3  border-bottom">Social Links</h6>
        <ul>
          <li class="d-flex align-items-center"><i class="la-2x lab la-twitter"></i> <a href="#" class="text-dark">Twitter</a></li>
          <li class="d-flex align-items-center"><i class="la-2x lab la-facebook"></i> <a href="#" class="text-dark">Facebook</a></li>
          <li class="d-flex align-items-center"><i class="la-2x lab la-instagram"></i> <a href="#" class="text-dark">Instagram</a></li>
          <li class="d-flex align-items-center"><i class="la-2x lab la-whatsapp"></i> <a href="#" class="text-dark">Whatsapp</a></li>
        </ul>
      </div>

      <div class="col-lg-2 col-md-6 mb-lg-0 mb-3">
        <h6 class="text-uppercas pb-3 border-bottom">Privacy & Policy</h6>
        <ul>
          <li class="d-flex align-items-center"><a href="#" class="text-dark">Privacy</a></li>
          <li class="d-flex align-items-center"><a href="#" class="text-dark">Terms & Conditions</a></li>
        </ul>
      </div>

    </div>
  </div>

  <div class="custom-bg py-2 text-center">
    <small class="text-white">&copy;
      <?= date('Y') ?>
      FreeTown Hotel & Suite | All rights reserved
    </small>
    <small class="mt-2 text-cente text-white d-block">Developer: <a class="text-white" href="mailto:thomasangel697@gmail.com">iCode</a></small>
  </div>
</footer>

<?php require_once APPROOT . '/views/inc/script-links.php' ?>

<!-- Modal -->
<?php require_once APPROOT . '/views/inc/modal.php' ?>

<script>
  // SET AVTIVE NAV-BAR COLOR
  function setActive() {
    let navbar = document.getElementById('nav-bar');
    let a_tags = navbar.getElementsByTagName('a');

    for (i = 0; i < a_tags.length; i++) {
      let file = a_tags[i].href.split('/').pop();
      let file_name = file.split('.')[0];

      if (document.location.href.indexOf(file_name) >= 0) {
        a_tags[i].classList.add('active');
      }
    }
  }
  setActive();

  // let user_form = document.getElementById('user-form');
  // user_form.addEventListener('submit', (e) => {
  //   e.preventDefault();
  // });
</script>

<!-- PAYSTACK LINK -->
<script src="https://js.paystack.co/v1/inline.js"></script>


</body>

</html>