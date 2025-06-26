<!-- Head -->
<?php require_once APPROOT . '/views/inc/head.php' ?>
<title><?= SITENAME ?> | Confirm Booking</title>

<body class="bg-light">
  <!-- Navbar -->
  <?php require_once APPROOT . '/views/inc/navbar.php' ?>

  <section class="facilities my-5 p3-5">
    <div class="container">

      <div class="row mt-5 justify-content-between">
        <div class="col-lg-12 col-md-12 mb-4">
          <h2 class="text-capitalize">CONFIRM BOOKING</h2>
          <div class="" style="font-size: .9rem;">
            <?php flash_msg('message') ?>
          </div>
        </div>

        <div class="col-lg-5 col-md-12 mb-3">
          <div class="card border rounded-0 mb-2">
            <div class="card-body">
              <div class="row align-items-cente justify-content-between">
                <div class="col-2">
                  <i class="las la-info la-1x border p-2"></i>
                </div>
                <div class="col-10">
                  <h6 class="mb- fw-bold">It's almost yours</h6>
                  <p class="text-muted" style="font-size: .9rem;">We just need a few more details to confirm your booking at FreeTown Hotel & Apartments.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="card border rounded-0 mb-2">
            <div class="card-body">
              <div class="row align-items-cente justify-content-between">
                <div class="col-2">
                  <i class="las la-info la-1x border p-2"></i>
                </div>
                <div class="col-10">
                  <h6 class="mb- fw-bold">No surprises</h6>
                  <p class="text-muted" style="font-size: .9rem;">Pay the price you see – no booking fees!</p>
                </div>
              </div>
            </div>
          </div>
          <div class="card border rounded-0 mb-2">
            <div class="card-body">
              <div class="row align-items-cente justify-content-between">
                <div class="col-2">
                  <i class="las la-info la-1x border p-2"></i>
                </div>
                <div class="col-10">
                  <h6 class="mb- fw-bold">Your details are secure</h6>
                  <p class="text-muted" style="font-size: .9rem;">Your details are protected by a secure connection.</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <?php if (isUserLoggedIn()) : ?>
          <div class="col-lg-7 col-md-12">
            <div class="card mb-3 border rounded-0">
              <div class="card-body">
                <h5 class="ps-lg-0 ps-md-0 ps-sm-2">ENTER YOUR DETAILS</h5>

                <form method="POST" id="booking_form">
                  <?php foreach ($data['getUsersDetails'] as $row) : ?>
                    <div class="row">
                      <div class="col-md-12 mb-3">
                        <input type="text" name="name" class="form-control shadow-none" value="<?= $row->name ?>" placeholder="Full Name" required>
                      </div>
                      <div class="col-md-6 mb-lg-2 mb-3">
                        <input type="number" name="phone" class="form-control shadow-none" value="<?= $row->phone ?>" placeholder="Phone Number" readonly required>
                      </div>
                      <div class="col-md-6 mb-2">
                        <input type="email" name="email" class="form-control shadow-none" value="<?= $row->email ?>" placeholder="Email Address" readonly required>
                      </div>
                      <div class="col-md-6 mb-2">
                        <label for="">Check-in</label>
                        <input type="date" name="check_in" class="form-control shadow-none" value="<?= date('Y-m-d') ?>" required>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="">Check-out</label>
                        <input type="date" name="check_out" class="form-control shadow-none" value="" required>
                      </div>
                      <div class="col-md-12 mb-2">
                        <textarea rows="2" name="address" class="form-control shadow-none" placeholder="Your Address" required><?= $row->address ?></textarea>
                      </div>
                      <div class="col-md-6 mb-2 row">
                        <div class="col-6">
                          <label for="">Adult</label>
                          <input type="number" name="adult" value="1" id="adult" class="form-control shadow-none w-100">
                        </div>
                        <div class="col-6">
                          <label for="">Children</label>
                          <input type="number" name="children" value="0" id="adult" class="form-control shadow-none w-100">
                        </div>
                      </div>
                      <?php foreach ($data['getBookingDetails'] as $row) : ?>
                        <div class="col-md-12 my-2">
                          <?php if (isset($row->status) && $row->status == '0') : ?>
                            <button type="buuton" data-bs-toggle="modal" data-bs-target="#room-unavailable" class="btn btn-danger btn-sm shadow-none mb-2 w-100">Not Available</button>
                          <?php else : ?>
                            <button type="submit" name="btn_pay_now" class="btn btn-custom-bg shadow-none w-100">Next: Final step...</button>
                          <?php endif ?>
                        </div>
                      <?php endforeach; ?>
                    </div>
                  <?php endforeach; ?>
                </form>
              </div>
            </div>

            <div class="card mb-3 border shadow-s rounded-0">
              <div class="card-body row">
                <div class="col-6 d-non">
                  <?php foreach ($data['getBookingDetails'] as $row) : ?>
                    <div class="card border-0">
                      <?php if (isset($row->image1) && $row->image1 != "") : ?>
                        <div class="carousel-item active">
                          <img src="<?= URLROOT ?>/assets/images/rooms/<?= $row->image1 ?>" class="d-block w-100 rounded-0 mb-2" height="220px">
                        </div>
                      <?php endif; ?>
                    </div>
                </div>
                <div class="col-6">
                  <h5 class=""><?= $row->name ?></h5>
                  <h6 class="">₦<?= number_format($row->price) ?><sub class="text-primary">/night</sub></h6>
                  <div class="features py-2">
                    <h6 class="mb-0">Features</h6>
                    <?php $feat = explode(',', $row->features);
                    for ($i = 0; $i < count($feat); $i++) : ?>
                      <span class="badge text-bg-light text-wrap py-2 fw-light"><?= $feat[$i] ?></span>
                    <?php endfor; ?>
                  </div>
                  <div class="facility mb-2">
                    <h6 class="mb-0">Facilities</h6>
                    <?php $fac = explode(',', $row->facilities);
                    for ($i = 0; $i < count($fac); $i++) : ?>
                      <span class="badge text-bg-light text-wrap py-2 mb-1 fw-light"><?= $fac[$i] ?></span>
                    <?php endfor; ?>
                  </div>
                </div>
              <?php endforeach; ?>
              </div>
            </div>
          </div>

        <?php else : ?>
          <div class="col-lg-7 col-md-12">
            <div class="card mb-3 border shadow-s rounded-0">
              <div class="card-body">
                <h5 class="ps-lg-0 ps-md-0 ps-sm-2">ENTER YOUR DETAILS</h5>
                <form method="POST" id="booking_form">
                  <div class="row">
                    <div class="col-md-12 mb-3">
                      <input type="text" name="name" class="form-control shadow-none" placeholder="Full Name" required>
                    </div>
                    <div class="col-md-6 mb-lg-2 mb-3">
                      <input type="number" name="phone" class="form-control shadow-none" placeholder="Phone Number" required>
                    </div>
                    <div class="col-md-6 mb-2">
                      <input type="email" name="email" class="form-control shadow-none" placeholder="Email Address" required>
                    </div>
                    <div class="col-md-6 mb-2">
                      <label for="">Check-in</label>
                      <input type="date" name="check_in" class="form-control shadow-none" value="<?= date('Y-m-d') ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="">Check-out</label>
                      <input type="date" name="check_out" class="form-control shadow-none" value="" required>
                    </div>
                    <div class="col-md-12 mb-2">
                      <textarea rows="2" name="address" class="form-control shadow-none" placeholder="Your Address" required></textarea>
                    </div>
                    <div class="col-md-6 mb-2 row">
                      <div class="col-6">
                        <label for="">Adult</label>
                        <input type="number" name="adult" value="1" id="adult" class="form-control shadow-none w-100">
                      </div>
                      <div class="col-6">
                        <label for="">Children</label>
                        <input type="number" name="children" value="0" id="adult" class="form-control shadow-none w-100">
                      </div>
                    </div>
                    <div class="col-md-6 mb-2">
                      <label class="text-danger fs-4"> * </label>
                      <label for="create">
                        <input type="checkbox" name="create" id="create" class="rounded-0 shadow-none" value=""> Create an account?
                      </label>
                    </div>

                    <?php foreach ($data['getBookingDetails'] as $row) : ?>
                      <div class="col-md-12 my-2">
                        <?php if (isset($row->status) && $row->status == '0') : ?>
                          <button type="buuton" data-bs-toggle="modal" data-bs-target="#room-unavailable" class="btn btn-danger btn-sm shadow-none mb-2 w-100">Not Available</button>
                        <?php else : ?>
                          <button type="submit" name="btn_pay_now" class="btn btn-custom-bg shadow-none w-100">Next: Final step...</button>
                        <?php endif ?>
                      </div>
                    <?php endforeach; ?>
                  </div>
                </form>
              </div>
            </div>

            <div class="card mb-3 border shadow-s rounded-0">
              <div class="card-body row">
                <div class="col-6 d-non">
                  <?php foreach ($data['getBookingDetails'] as $row) : ?>
                    <div class="card border-0">
                      <?php if (isset($row->image1) && $row->image1 != "") : ?>
                        <div class="carousel-item active">
                          <img src="<?= URLROOT ?>/assets/images/rooms/<?= $row->image1 ?>" class="d-block w-100 rounded-0 mb-2" height="220px">
                        </div>
                      <?php endif; ?>
                    </div>
                </div>
                <div class="col-6">
                  <h5 class=""><?= $row->name ?></h5>
                  <h6 class="">₦<?= number_format($row->price) ?><sub class="text-primary">/night</sub></h6>
                  <div class="features py-2">
                    <h6 class="mb-0">Features</h6>
                    <?php $feat = explode(',', $row->features);
                    for ($i = 0; $i < count($feat); $i++) : ?>
                      <span class="badge text-bg-light text-wrap py-2 fw-light"><?= $feat[$i] ?></span>
                    <?php endfor; ?>
                  </div>
                  <div class="facility mb-2">
                    <h6 class="mb-0">Facilities</h6>
                    <?php $fac = explode(',', $row->facilities);
                    for ($i = 0; $i < count($fac); $i++) : ?>
                      <span class="badge text-bg-light text-wrap py-2 mb-1 fw-light"><?= $fac[$i] ?></span>
                    <?php endfor; ?>
                  </div>

                </div>
              <?php endforeach; ?>
              </div>
            </div>
          </div>
        <?php endif; ?>

      </div>

    </div>
  </section>
  <!-- Footer -->
  <?php require_once APPROOT . '/views/inc/footer.php' ?>