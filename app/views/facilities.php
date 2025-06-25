<!-- Head -->
<?php require_once APPROOT. '/views/inc/head.php' ?>
<title><?= SITENAME ?> | Facilities</title>

<body class="bg-light">
  <!-- Navbar -->
  <?php require_once APPROOT. '/views/inc/navbar.php' ?>

  <section class="facilities my-5">
    <div class="container">
      <h2 class="text-center text-uppercase mb-4">Our Facilities</h2>
      <p class="text-center">Our facility boasts an array of world-class amenities designed to elevate your experience. Whether you're unwinding by the pool, rejuvenating in the spa, or maintaining your fitness routine in our cutting-edge gym, every corner of our facility is crafted with your well-being in mind.</p>

      <div class="row text-center my-5 pb-5">
        <?php if ($data['getAll'] >= 1) : ?>
          <?php foreach ($data['getAll'] as $row) : ?>
            <div class="col-md-6 py-3 card">
              <div class="row justify-content-between align-items-center p-3">
                <div class="col-lg-2">
                  <?php if (isset($row->icon) && $row->icon != "") : ?>
                    <div class="carousel-item active">
                      <img src="<?= URLROOT ?>/assets/images/facilities/<?= $row->icon ?>" class="d-block w-100 rounded" height="70px">
                    </div>
                  <?php else : ?>
                    <span class="icons las la-image"></span>
                  <?php endif; ?>
                </div>
                <div class="col-lg-10">
                  <h4 class="purple text-capitalize"><?= $row->name ?></h4>
                  <p class="text-left m-0">
                    <?= $row->description ?>
                  </p>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else : ?>
          <div class="text-bg-warning p-5 text-center text-uppercase">nothing to show</div>
        <?php endif; ?>
      </div>
    </div>

  </section>

  <!-- Footer -->
  <?php require_once APPROOT. '/views/inc/footer.php' ?>