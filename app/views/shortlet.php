<!-- Head -->
<?php require_once APPROOT . '/views/inc/head.php' ?>
<title><?= SITENAME ?> | Short-Let/Apartments</title>

<body class="bg-light">
  <!-- Navbar -->
  <?php require_once APPROOT . '/views/inc/navbar.php' ?>

  <section class="facilities my-5 p3-5">
    <div class="container">
      <h2 class="text-center text-uppercase">ShortLet Apartment</h2>
      <div class="h-line bg-dark mb-4 d-none"></div>

      <div class="row mt-5">
        <div class="col-lg-3 col-md-12 mb-lg-0 mb-4 px-lg-2 px-0">
          <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow">
            <div class="container-fluid flex-lg-column align-items-stretch">
              <h5 class="mt-2" style="font-size: 19px;">FILTERS</h5>
              <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="collapse" data-bs-target="#filterDropdown" aria-controls="filterDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="filterDropdown">
                <div class="border bg-light p-3 rounded-0 mb-3">
                  <h6 class="mb-3">CHECK AVAILABILITY</h6>
                  <form method="POST">
                    <label for="">Availability</label>
                    <select class="form-select form-control shadow-none rounded-0 mb-2" name="availability">
                      <?php foreach ($data['getAvailability'] as $row) : ?>
                        <option value="<?= $row['status'] ?>"><?= $row['status'] == '1' ? 'Available Rooms' : 'Unavailable Rooms' ?></option>
                      <?php endforeach; ?>
                    </select>
                    <label for="">Price</label>
                    <select class="form-select form-control shadow-none rounded-0" name="price">
                      <?php foreach ($data['getPrice'] as $row) : ?>
                        <option selected value="<?= $row['price'] ?>"><?= '₦' . number_format($row['price']) ?></option>
                      <?php endforeach; ?>
                    </select>
                    <button type="submit" name="btn_filter_rooms" class="btn btn-warning btn-sm form-control shadow-none rounded-0 mt-2">Search</button>
                  </form>
                </div>
              </div>
            </div>
          </nav>
        </div>

        <?php if (isset($_POST['btn_filter_rooms'])) : ?>

          <div class="col-lg-9 col-md-12">
            
            <?php if ($data['filterRooms']) : ?>
              <?php foreach ($data['filterRooms'] as $row) : ?>
                <div class="card mb-3 border-0 shadow">
                  <div class="row g-0 p-3 align-items-center">
                    <div class="col-md-5">
                      <img src="<?= URLROOT ?>/assets/images/rooms/<?= $row->image1 ?>" class="img-fluid rounded-start w-100" alt="" style="height: 280px;">
                    </div>
                    <div class="col-md-5">
                      <div class="card-body px- py-1">
                        <h5 class="card-title pb-3 pt-lg-0 pt-2 mb-0"><?= $row->name ?></h5>
                        <div class="features mb-3">
                          <h6 class="mb-">Features</h6>
                          <?php $feat = explode(',', $row->features);
                          for ($i = 0; $i < count($feat); $i++) : ?>
                            <span class="badge text-bg-light text-wrap py-2 fw-light"><?= $feat[$i] ?></span>
                          <?php endfor; ?>
                        </div>
                        <div class="facility mb-3">
                          <h6 class="mb-">Facilities</h6>
                          <?php $fac = explode(',', $row->facilities);
                          for ($i = 0; $i < count($fac); $i++) : ?>
                            <span class="badge text-bg-light text-wrap py-2 mb-1 fw-light"><?= $fac[$i] ?></span>
                          <?php endfor; ?>
                        </div>

                      </div>
                    </div>
                    <div class="col-md-2">
                      <p class="ps-lg-0 ps-md-0 ps-sm-2">₦<?= number_format($row->price) ?>/night</p>
                      <?php if (isset($row->status) && $row->status == '0') : ?>
                        <button type="buuton" data-bs-toggle="modal" data-bs-target="#room-unavailable" class="btn btn-danger btn-sm shadow-none mb-2 w-100 rounded-0">Not Available</button>
                      <?php else : ?>
                        <a href="<?= URLROOT ?>/confirmbooking/<?= $row->room_id ?>" class="btn btn-warning btn-sm shadow-none mb-2 w-100 rounded-0">Select Room</a>
                      <?php endif; ?>
                      <a href="<?= URLROOT ?>/roomdetails/<?= $row->room_id ?>" class="btn btn-outline-dark btn-sm shadow-none w-100 d-none">More Details</a>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            <?php else : ?>
              <div class="text-bg-warning p-5 text-center text-uppercase">Rooms are currently unavailable</div>
            <?php endif; ?>
          </div>
        <?php else : ?>
          <div class="col-lg-9 col-md-12">
            
            <?php if ($data['getRooms']) : ?>
              <?php foreach ($data['getRooms'] as $row) : ?>
                <div class="card mb-3 border-0 shadow">
                  <div class="row g-0 p-3 align-items-center">
                    <div class="col-md-5">
                      <img src="<?= URLROOT ?>/assets/images/rooms/<?= $row->image1 ?>" class="img-fluid rounded-start w-100" alt="" style="height: 280px;">
                    </div>
                    <div class="col-md-5">
                      <div class="card-body px- py-1">
                        <h5 class="card-title pb-3 pt-lg-0 pt-2 mb-0"><?= $row->name ?></h5>
                        <div class="features mb-3">
                          <h6 class="mb-">Features</h6>
                          <?php $feat = explode(',', $row->features);
                          for ($i = 0; $i < count($feat); $i++) : ?>
                            <span class="badge text-bg-light text-wrap py-2 fw-light"><?= $feat[$i] ?></span>
                          <?php endfor; ?>
                        </div>
                        <div class="facility mb-3">
                          <h6 class="mb-">Facilities</h6>
                          <?php $fac = explode(',', $row->facilities);
                          for ($i = 0; $i < count($fac); $i++) : ?>
                            <span class="badge text-bg-light text-wrap py-2 mb-1 fw-light"><?= $fac[$i] ?></span>
                          <?php endfor; ?>
                        </div>

                      </div>
                    </div>
                    <div class="col-md-2">
                      <p class="ps-lg-0 ps-md-0 ps-sm-2">₦<?= number_format($row->price) ?>/night</p>
                      <?php if (isset($row->status) && $row->status == '0') : ?>
                        <button type="buuton" data-bs-toggle="modal" data-bs-target="#room-unavailable" class="btn btn-danger btn-sm shadow-none mb-2 w-100 rounded-0">Not Available</button>
                      <?php else : ?>
                        <a href="<?= URLROOT ?>/confirmbooking/<?= $row->room_id ?>" class="btn btn-warning btn-sm shadow-none mb-2 w-100 rounded-0">Select Room</a>
                      <?php endif; ?>
                      <a href="<?= URLROOT ?>/roomdetails/<?= $row->room_id ?>" class="btn btn-outline-dark btn-sm shadow-none w-100 d-none">More Details</a>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            <?php else : ?>
              <div class="text-bg-warning p-5 text-center text-uppercase">Rooms are currently unavailable</div>
            <?php endif; ?>

          </div>
        <?php endif; ?>
      </div>
    </div>

  </section>

  <!-- Footer -->
  <?php require_once APPROOT . '/views/inc/footer.php' ?>