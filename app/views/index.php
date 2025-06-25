<!-- Head -->
<?php require_once APPROOT . '/views/inc/head.php' ?>
<title><?= SITENAME ?></title>

<body class="bg-light">

  <!-- Header -->
  <?php require_once APPROOT . '/views/inc/header.php' ?>

  <!-- Check availability form -->
  <!-- <section class="container availability-form">
    <div class="row align-items-end justify-content-center">
      <div class="col-lg-10 col-md-12 bg-white shadow px-lg-0 px-4 py-4 rounded">
        <h5 class="text-capitalize mb-3 text-center">Check Room availability</h5>
        <form method="POST" action="rooms.php">
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
            <div class="col-lg-2 px-1 my-1">
              <button type="submit" name="btn_get_rooms" class="rounded-0 border-0 btn-custom-bg btn-sm form-control shadow-none">Search</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section> -->

  <section id="" class="mb-4 py-3  bg-white text-white">
    <div class="container text-dark">
      <div class="row align-items-center text-lg-start text-center">

        <div class="text-">
          <h1 class="mt-5 mb-3 text-capitalize text-center">Built for Your<br>Maximum Relaxation</h1>

          <p class="">A stay at FreeTown Hotel grants you access to premium hospitality, luxurious rooms and a wide range of delectable cuisines – both local and intercontinental. We trust your stay in our Serene Hotel will be enjoyable, rejuvenating and an experience you’ll always come back for to provide you the best experience you would ever imagined.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Our Rooms -->
  <section class="container room-section my-5 pt-4">
    <!-- <h2 class="text-center mb- text-uppercase">Our Rooms</h2> -->
    <div class="row">
      <?php if ($data['randomRoom'] >= 1) : ?>
        <?php foreach ($data['randomRoom'] as $row) : ?>
          <div class="col-lg-4 col-md-6 my-3 px-0 shadow-sm">
            <img src="<?= URLROOT ?>/assets/images/rooms/<?= $row->image1 ?>" class="card-img-top w-100" height="350px" alt="room-img">
            <div class="card border-0 bg-transparent">
              <div class="card-body px-1">
                <h5 class="text-capitalize"><?= $row->name ?></h5>
                <div class="d-flex align-items-center justify-content-between mb-2">
                  <span>
                    <i class="la la-star text-warning"></i>
                    <i class="la la-star text-warning"></i>
                    <i class="la la-star text-warning"></i>
                    <i class="la la-star text-warning"></i>
                    <i class="la la-star text-warning"></i>
                  </span>
                  <p class="mb-0">₦<?= number_format($row->price) ?>/night</p>
                </div>
                <div class="features mb-2">
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
                    <span class="badge text-bg-light text-wrap py-2 fw-light"><?= $fac[$i] ?></span>
                  <?php endfor; ?>
                </div>
                <div class="d-flex justify-content-between align-items-center mt-3">
                  <a href="<?= URLROOT ?>/confirmbooking/<?= $row->room_id ?>" class="btn btn-custom-bg btn-s shadow-none form-control">Select Room</a>
                  <a href="<?= URLROOT ?>/roomdetails/<?= $row->room_id ?>" class="btn btn-outline-dark btn-sm shadow-none d-none">More Details</a>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else : ?>
        <div class="text-bg-warning p-5 text-center text-uppercase">Rooms are currently unavailable</div>
      <?php endif; ?>
      <div class="col-lg-12 text-center mt-5">
        <a href="<?= URLROOT ?>/rooms" class="btn btn-sm btn-outline-dark rounded-0 fw-bol shadow-none">More Rooms >></a>
      </div>
    </div>
  </section>

  <!-- Our Features -->
  <section class="mt-5 py-5 custom-bg d-none">
    <div class="container">
      <!-- <h2 class="mb-0 text-uppercase text-center">Our Facilities</h2> -->
      <div class="row text-center mt-3">
        <?php if ($data['randomFacilities'] >= 1) : ?>
          <?php foreach ($data['randomFacilities'] as $row) : ?>
            <div class="col-lg-4 col-md-6 my-4 border-md-0 border-top-0 border-bottom-0 px-0">
              <?php if (isset($row->icon) && $row->icon != "") : ?>
                <div class="mb-3">
                  <img src="<?= URLROOT ?>/assets/images/facilities/<?= $row->icon ?>" class="d- w-100 " height="370px">
                </div>
                <div class="card rounded-0 border-0 bg-transparent">
                  <div class="card-body">
                    <h5 class="mb-3"><?= $row->name ?></h5>
                    <p class="fw-light"><?= $row->description ?></p>
                  </div>
                </div>

              <?php else : ?>
                <span class="icons las la-image"></span>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        <?php else : ?>
          <div class="text-bg-warning p-5 text-center text-uppercase">nothing to show</div>
        <?php endif; ?>

        <div class="col-lg-12 text-center mt-5 d-none">
          <a href="<?= URLROOT ?>/facilities.php" class="btn btn-sm btn-outline-dark rounded-0 fw-bol shadow-none">See More >></a>
        </div>
      </div>
    </div>
  </section>

  <section class="mb-5 py-5">
    <div class="container">
      <h1 class="mb-0 text-center">Why Choose Us?</h1>
      <div class="row text-center mt-5">
        <?php if ($data['randomFacilities'] >= 1) : ?>
          <?php foreach ($data['randomFacilities'] as $row) : ?>
            <div class="col-md-6 py-3 card">
              <div class="row justify-content-between align-items-center p-3">
                <?php if (isset($row->icon) && $row->icon != "") : ?>
                  <div class="col-lg-2 mb-md-3">
                    <!-- <span class="icons las la-swimming-pool wiggle-up"></span> -->
                    <img src="<?= URLROOT ?>/assets/images/facilities/<?= $row->icon ?>" class="d- w-100" height="70">
                  </div>
                <?php else : ?>
                  <div class="col-lg-2">
                    <!-- <span class="icons las la-swimming-pool wiggle-up"></span> -->
                    <span class="icons las la-image"></span>
                  </div>

                <?php endif; ?>
                <div class="col-lg-10">
                  <div>
                    <h4 class="purple text-capitalize"><?= $row->name ?></h4>
                    <p class="text-left m-0"><?= $row->description ?></p>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else : ?>
          <div class="text-bg-warning p-5 text-center text-uppercase">nothing to show</div>
        <?php endif; ?>

        <div class="col-md-6 py-3 card d-none">
          <div class="row justify-content-between align-items-center p-3">
            <div class="col-lg-2">
              <span class="icons las la-hotel wiggle-up"></span>
            </div>
            <div class="col-lg-10">
              <div>
                <h4 class="purple text-capitalize">Hotel Rooms</h4>
                <p class="text-left m-0">Book and save on your hotel booking today, best rate, No booking fee. 24/7 customer service. We speak your language. Get instant confirmation with just a click.
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 py-3 card d-none">
          <div class="row justify-content-between align-items-center p-3">
            <div class="col-lg-2">
              <span class="icons las la-wifi wiggle-up"></span>
            </div>
            <div class="col-lg-10">
              <div>
                <h4 class="purple text-capitalize">Free Wifi</h4>
                <p class="text-left m-0">We offer you a free and fast internet access, when you lodge into our prestigious hotel. Visit FreeTown Hotel & Suit today for that amazing experience.
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 py-3 card d-none">
          <div class="row justify-content-between align-items-center p-3">
            <div class="col-lg-2">
              <span class="icons las la-lock wiggle-up"></span>
            </div>
            <div class="col-lg-10">
              <div>
                <h4 class="purple text-capitalize">Privacy</h4>
                <p class="text-left m-0">At FreeTown Hotel & Suit, we respect your privacy and that is why we have made your privacy our uttermost priority.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- GALLERY SECTION -->
  <section class="gallery container mb-0 mt-5">
    <h2 class="text-center mb-5">OUR GALLERY</h2>
    <div class="row mb-lg-4 mb-1">
      <div class="col-lg-4 col-md-6 px-0 mb-lg-0 mb-4">
        <img src="<?= URLROOT ?>/assets/images/rooms/IMG_16049.jpg" alt="" class="img- w-100" height="400px">
      </div>
      <div class="col-lg-4 col-md-6 px-0 mb-lg-0 mb-4">
        <img src="<?= URLROOT ?>/assets/images/rooms/freetown-gym.jpg" alt="" class="img- w-100" height="400px">
      </div>
      <div class="col-lg-4 col-md-6 px-0 mb-lg-0 mb-4">
        <img src="<?= URLROOT ?>/assets/images/facilities/IMG_26064.jpg" alt="" class="img- w-100" height="400px">
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4 col-md-6 px-0 mb-lg-0 mb-4">
        <img src="<?= URLROOT ?>/assets/images/rooms/IMG_45969.jpg" alt="" class="img- w-100" height="400px">
      </div>
      <div class="col-lg-4 col-md-6 px-0 mb-lg-0 mb-4">
        <img src="<?= URLROOT ?>/assets/images/rooms/IMG_93817.jpg" alt="" class="img- w-100" height="400px">
      </div>
      <div class="col-lg-4 col-md-6 px-0 mb-lg-0 mb-4">
        <img src="<?= URLROOT ?>/assets/images/rooms/IMG_52280.jpg" alt="" class="img- w-100" height="400px">
      </div>
    </div>
  </section>

  <!-- Testimonials -->
  <section class="mb-5 pt-5 bg-light">
    <div class="container">
      <h2 class="mb-0 text-uppercase text-center">Testimonials</h2>

      <!-- Swiper -->
      <div class="swiper swiper-testimony mt-5">
        <div class="swiper-wrapper pb-5">
          <div class="swiper-slide custom-bg p-4">
            <div class="profile d-flex align-items-center mb-3">
              <i class="la la-star me-1"></i>
              <h6 class="mb-0">Colins Obinna</h6>
            </div>
            <p>"From the moment we stepped into Freetown hotel & Short-let Apartment, our experience was nothing short of extraordinary. The attention to detail and commitment to guest satisfaction surpassed our expectations, making our stay truly memorable.</p>
            <div class="rating">
              <i class="la la-star text-warning"></i>
              <i class="la la-star text-warning"></i>
              <i class="la la-star text-warning"></i>
              <i class="la la-star text-warning"></i>
              <i class="la la-star text-warning"></i>
            </div>
          </div>
          <div class="swiper-slide custom-bg p-4">
            <div class="profile d-flex align-items-center mb-3">
              <i class="la la-star me-1"></i>
              <h6 class="mb-0">Mike Osas</h6>
            </div>
            <p>The warm and personalized welcome at check-in set the tone for our entire visit. The staff went above and beyond to ensure our comfort and cater to our individual needs. Every request, whether big or small, was handled with efficiency and a genuine smile.</p>
            <div class="rating">
              <i class="la la-star text-warning"></i>
              <i class="la la-star text-warning"></i>
              <i class="la la-star text-warning"></i>
              <i class="la la-star text-warning"></i>
              <i class="la la-star text-warning"></i>
            </div>
          </div>
          <div class="swiper-slide p-4 custom-bg">
            <div class="profile d-flex align-items-center mb-3">
              <i class="la la-star me-1"></i>
              <h6 class="mb-0">Osareme Daniel</h6>
            </div>
            <p>Dining at Freetown Short let Apartment, was a culinary journey in itself. The diverse menu, featuring both international delicacies and local flavors, showcased the culinary expertise of the chefs. Each meal was a delightful experience, and the attentive service added to the overall enjoyment.</p>
            <div class="rating">
              <i class="la la-star text-warning"></i>
              <i class="la la-star text-warning"></i>
              <i class="la la-star text-warning"></i>
              <i class="la la-star text-warning"></i>
              <i class="la la-star text-warning"></i>
            </div>
          </div>
        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>
  </section>


  <!-- Footer -->
  <?php require_once APPROOT . '/views/inc/footer.php' ?>