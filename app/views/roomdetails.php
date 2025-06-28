<!-- Head -->
<?php require_once APPROOT . '/views/inc/head.php' ?>

<title><?= SITENAME ?> | Room Details</title>

<body class="bg-light">
  <!-- Navbar -->
  <?php require_once APPROOT . '/views/inc/navbar.php' ?>

  <section class="facilities my-5 p3-5">
    <div class="container">
      <div class="row mt-5">
        <?php foreach ($data['getRoomDetails'] as $room_data) : ?>
          <div class="col-12 mb-4">
            <h2 class="text-capitalize"><?= $room_data->name ?></h2>
            <div class="" style="font-size: 13px;">
              <a href="<?= URLROOT ?>/index" class="text-secondary">HOME</a>
              <span class="text-secondary"> > </span>
              <a href="<?= URLROOT ?>/rooms" class="text-secondary">ROOMS</a>
              <span class="text-secondary"> > </span>
              <a class="text-muted ">ROOM DETAILS</a>
            </div>
          </div>

          <div class="col-lg-7 col-md-12">
            <div id="roomCarousel" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner">
                <?php if (isset($room_data->image1) && $room_data->image1 != "") : ?>
                  <div class="carousel-item active">
                    <img src="<?= URLROOT ?>/assets/images/rooms/<?= $room_data->image1 ?>" class="d-block w-100 rounded" height="550px" alt="...">
                  </div>
                <?php endif; ?>
                <?php if (isset($room_data->image2) && $room_data->image2 != "") : ?>
                  <div class="carousel-item">
                    <img src="<?= URLROOT ?>/assets/images/rooms/<?= $room_data->image2 ?>" class="d-block w-100 rounded" height="550px" alt="...">
                  </div>
                <?php endif; ?>
                <?php if (isset($room_data->image3) && $room_data->image3 != "") : ?>
                  <div class="carousel-item">
                    <img src="<?= URLROOT ?>/assets/images/rooms/<?= $room_data->image3 ?>" class="d-block w-100 rounded" height="550px" alt="...">
                  </div>
                <?php endif; ?>
                <?php if (isset($room_data->image4) && $room_data->image4 != "") : ?>
                  <div class="carousel-item">
                    <img src="<?= URLROOT ?>/assets/images/rooms/<?= $room_data->image4 ?>" class="d-block w-100 rounded" height="550px" alt="...">
                  </div>
                <?php endif; ?>
              </div>
              <div class="d-flex align-items-center justify-content-between position-relative d-none">
                <button class="carousel-control-prev position-absolute text-end" type="button" data-bs-target="#roomCarousel" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#roomCarousel" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
            </div>
          </div>

          <div class="col-lg-5 col-md-12">
            <div class="card mb-3 border-0 shadow-sm rounded-3">
              <div class="card-body">
                <h5 class="ps-lg-0 ps-md-0 ps-sm-2">₦<?= number_format($room_data->price) ?>/night</h5>
                <span>
                  <i class="la la-star text-warning"></i>
                  <i class="la la-star text-warning"></i>
                  <i class="la la-star text-warning"></i>
                  <i class="la la-star text-warning"></i>
                  <i class="la la-star text-warning"></i>
                </span>

                <div class="features my-2">
                  <h6 class="mb-">Features</h6>
                  <?php $feat = explode(',', $room_data->features);
                  for ($i = 0; $i < count($feat); $i++) : ?>
                    <span class="badge text-bg-light text-wrap py-2 mb-1 fw-light"><?= $feat[$i] ?></span>
                  <?php endfor; ?>
                </div>
                <div class="facilities my-2">
                  <h6 class="mb-">Facilities</h6>
                  <?php $feat = explode(',', $room_data->facilities);
                  for ($i = 0; $i < count($feat); $i++) : ?>
                    <span class="badge text-bg-light text-wrap py-2 mb-1 fw-light"><?= $feat[$i] ?></span>
                  <?php endfor; ?>
                </div>
                <?php if (isset($room_data->status) && $room_data->status == '0') : ?>
                  <button type="buuton" data-bs-toggle="modal" data-bs-target="#room-unavailable" class="btn btn-danger btn-sm shadow-none mb-2 w-100">Not Available</button>
                <?php else : ?>
                  <a href="<?= URLROOT ?>/confirmbooking/<?= $room_data->room_id ?>" class="btn btn-custom-bg btn-sm shadow-none mb-2 w-100">Book Now</a>
                <?php endif; ?>
              </div>
            </div>
          </div>

          <div class="col-12 mt-5 mb-3">
            <div class="accordion" id="roomAccordion">
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button shadow-none text-bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <h5 class="mb-0">Description</h5>
                  </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#roomAccordion">
                  <div class="accordion-body">
                    <?= $room_data->description ?>
                  </div>
                </div>
              </div>

            </div>
          </div>
        <?php endforeach; ?>
      </div>

    </div>

  </section>

  <!-- Footer -->
  <?php require_once APPROOT . '/views/inc/footer.php' ?>