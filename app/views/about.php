<!-- Head -->
<?php require_once APPROOT . '/views/inc/head.php' ?>
<title><?= SITENAME ?> | About Us</title>

<style>
  .team-img img {
    height: 400px !important;
  }

  @media screen and (min-width: 375px) {
    .team-img img {
      height: 100%;
    }
  }
</style>

<body class="bg-light">
  <!-- Navbar -->
  <?php require_once APPROOT . '/views/inc/navbar.php' ?>


  <section class="about my-5 pt-5">
    <div class="container">
      <?php
      $res = selectAll('settings', 'id');
      $row = $res->fetch_assoc();
      ?>
      <h2 class="text-center text-uppercase mb-4">About us</h2>
      <p class="text-center"><?= $row['site_about']; ?></p>

      <div class="row mt-5 align-items-center d-none">
        <div class="col-lg-7 mb-3 order-lg-2">
          <img src="./assets/images/about.png" class="img-fluid rounded-end w-100" alt="">
        </div>
        <div class="col-lg-5">
          <h5><?= $row['site_title']; ?></h5>
          <p><?= $row['site_about']; ?></p>
        </div>
      </div>

      <div class="row mt-5">
        <div class="col-lg-3 col-md-6 mb-3 ">
          <div class="bg-white p-4 text-center rounded shadow box pop">
            <img src="./assets/images/icons/hotel.png" width="65px" />
            <h5 class="mb-0 mt-2">100+ Rooms</h5>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3 ">
          <div class="bg-white p-4 text-center rounded shadow box pop">
            <img src="./assets/images/icons/customers.png" width="65px" />
            <h5 class="mb-0 mt-2">200+ Customers</h5>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3 ">
          <div class="bg-white p-4 text-center rounded shadow box pop">
            <img src="./assets/images/icons/ratings.png" width="65px" />
            <h5 class="mb-0 mt-2">150+ Reviews</h5>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3 ">
          <div class="bg-white p-4 text-center rounded shadow box pop">
            <img src="./assets/images/icons/staffs.png" width="65px" />
            <h5 class="mb-0 mt-2">200+ Staffs</h5>
          </div>
        </div>
      </div>
    </div>

  </section>

  <section class="management-team py-5">
    <div class="container">
      <h2 class="text-center text-uppercase mb-">Our Team</h2>

      <!-- Swiper -->
      <div class="swiper swiper-team">
        <div class="swiper-wrapper py-5">
          <?php foreach ($data['getTeam'] as $row) : ?>
            <div class="swiper-slide bg-white text-center rounded overflow-hidden team-img">
              <img src="<?= URLROOT ?>/assets/images/team/<?= $row->team_picture ?>" class="w-100" style="" height="400px" />
              <h5 class="pt-3"><?= $row->team_name ?></h5>
            </div>
          <?php endforeach; ?>
        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>
  </section>


  <!-- Footer -->
  <?php require_once APPROOT . '/views/inc/footer.php' ?>

  <script>
    var swiper = new Swiper(".swiper-team", {
      slidesPerView: 3,
      spaceBetween: 40,
      autoplay: {
        delay: 6500,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
      },
      breakpoints: {
        180: {
          slidesPerView: 1,
        },
        320: {
          slidesPerView: 1,
        },
        640: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 3,
        },
      }
    });
  </script>