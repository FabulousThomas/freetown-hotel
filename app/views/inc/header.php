<style>
  nav.bg-light {
    transition: all 1s;
  }

  nav ul li a,
  nav .navbar-toggler {
    color: #fff !important;
  }

  nav.bg-light ul li a,
  nav.bg-light .navbar-toggler {
    color: #000 !important;
  }
</style>

<!-- Banner Image  -->
<header class="">
  <!-- Navbar  -->
  <nav id="nav-bar" class="navbar navbar-expand-lg navbar- ps-lg-3 me-lg-0 py-lg-0 shadow-sm fixed-top">
    <div class="container-fluid pe-lg-0">
      <a href="<?= URLROOT ?>" class="text-dark">
        <h5 class="text-uppercase mb-0 me-3">
          <!-- -FreeTown&acd;<br>&ThinSpace; &ThinSpace; &ThinSpace;Hotel&Suit- -->
          <?= SITELOGO ?>
        </h5>
      </a>
      <button class="navbar-toggler d-lg-none shadow-none border-0 fs-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"><i class="bi bi-list"></i></button>
      <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav me-auto mt-2 mt-lg-0">
          <li class="nav-item">
            <a class="nav-link pb-0 pt-1" href="<?= URLROOT ?>">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link pb-0 pt-1" href="<?= URLROOT ?>/rooms">Rooms</a>
          </li>
          <li class="nav-item">
            <a class="nav-link pb-0 pt-1" href="<?= URLROOT ?>/facilities">Facilities</a>
          </li>
          <li class="nav-item">
            <a class="nav-link pb-0 pt-1" href="<?= URLROOT ?>/about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link pb-0 pt-1" href="<?= URLROOT ?>/contact">Contact Us</a>
          </li>
        </ul>

        <a class="btn text-light btn-sm my-lg-0 my-1 btn-custom-bg py-lg-4 rounded-0" href="<?= URLROOT ?>/shortlet">Short Let/Apartment</a>

        <?php if (isUserLoggedIn()) : ?>
          <div class="dropdown open">
            <a class="btn btn-outline-dark btn-sm dropdown-toggle py-lg-4 rounded-0" type="button" id="triggerId" data-bs-toggle="dropdown">
              <?= $_SESSION['user_name']; ?>
            </a>
            <ul class="dropdown-menu rounded-0 shadow" aria-labelledby="triggerId">
              <li>
                <a class="dropdown-item text-dark" href="<?= URLROOT ?>/users/account/<?= $_SESSION['user_id'] ?>">
                  Account
                </a>
              </li>
              <li>
                <a class="dropdown-item text-danger" href="<?= URLROOT ?>/users/logout">
                  Logout
                </a>
              </li>
            </ul>
          </div>
      </div>
    <?php else : ?>
      <a class="btn btn-dark btn-sm rounded-0 py-lg-4" href="<?= URLROOT ?>/users/login">
        Login/Register
      </a>
    <?php endif; ?>
    </div>
    </div>
  </nav>
  <!-- ======================================= -->

  <!-- Swiper -->
  <div class="swiper slider-container">
    <div class="swiper-wrapper">
      <?php $res = selectAll('slider', 'id'); ?>
      <?php if (mysqli_num_rows($res) > 0) : ?>
        <?php while ($row = $res->fetch_assoc()) : ?>
          <div class="swiper-slide banner-image d-flex justify-content-center align-items-center" style="background: url(<?= URLROOT ?>/assets/images/carousel/<?= $row['slider_picture']; ?>);">

            <div class="content text-center">
              <!-- Check availability form -->
              <section class="container availability-form mt-lg-1 mt-5">
                <div class="row align-items-end justify-content-center mt-lg-0 mt-5">
                  <div class="col-lg-10 col-md-12 bg-transparent shadow-none text-white px-lg-0 px-4 py-4 mt-lg-0 mt-5 rounded">
                    <h5 class="text-capitalize mb-3 mt-lg-0 mt-5 pt-lg-0 pt-4 text-center">Check Room availability</h5>
                    <form method="POST" action="rooms">
                      <div class="row align-items-end justify-content-center">
                        <div class="col-lg-4 px-1 mb-1">
                          <label for="">Availability</label>
                          <select class="form-select form-control shadow-none rounded-0 mb-" name="availability">
                            <?php foreach ($data['getAvailability'] as $row) : ?>
                              <option value="<?= $row['status'] ?>"><?= $row['status'] == '1' ? 'Available Rooms' : 'Unavailable Rooms' ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                        <div class="col-lg-4 px-1 mb-1">
                          <label for="">Price</label>
                          <select class="form-select form-control shadow-none rounded-0" name="price">
                            <?php foreach ($data['getPrice'] as $row) : ?>
                              <option selected value="<?= $row['price'] ?>"><?= '₦' . number_format($row['price']) ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                        <div class="col-lg-2 px-1 my-2">
                          <button type="submit" name="btn_filter_rooms" class="rounded-0 border-0 btn-custom-bg btn-sm form-control shadow-none">Search</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </section>
              <h3 class="text-white text-uppercase btn-custom-b py-0 mb- px-1">Your #1 Best Hotel/Apartment with affordable prices</h3>
              <a href="rooms" class="btn btn-md btn-custom-bg rounded-0">START BOOKING</a>

            </div>

          </div>
        <?php endwhile ?>
      <?php else : ?>
        <div class="swiper-slide">
          <img src="<?= URLROOT ?>/assets/images/carousel/slider-1.jpg" />
        </div>
      <?php endif; ?>
    </div>
  </div>
</header>


<script type="text/javascript">
  var nav = document.querySelector("nav");

  window.addEventListener("scroll", () => {
    if (window.pageYOffset > 100) {
      nav.classList.add("bg-light", "navbar-white", "shadow");
    } else {
      nav.classList.remove("bg-light", "navbar-white", "shadow");
    }
  });
</script>