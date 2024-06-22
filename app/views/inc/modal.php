  <!-- Modal LOGIN -->
  <div class="modal fade" id="loginModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header pb-2">
          <h5 class="modal-title d-flex align-items-center">
            <i class="bi bi-person-fill fs-3 me-2"></i> User Login
          </h5>
          <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="user-form" method="POST">
          <div class="modal-body">
            <div class="form-group mb-2">
              <label for="" class="form-label mb-0">Email Address</label>
              <input type="email" name="email" class="form-control shadow-none" placeholder="" required>
            </div>
            <div class="form-group mb-0">
              <label for="" class="form-label mb-0">Password</label>
              <input type="password" name="password" id="show_pass" class="form-control shadow-none" placeholder="" required>
            </div>
            <div class="form-check form-switch mb-2">
              <label for="show">
                <small>Show Password</small>
                <input class="form-check-input shadow-none border" type="checkbox" id="show" role="switch" onclick="showPassword()">
              </label>
            </div>
            <div class="form-group mb-2 d-flex align-items-center justify-content-between">
              <button type="submit" class="btn btn-dark btn-sm" name="btn_login_user">Login</button>
              <button type="button" class="btn btn-custom-bg btn-sm" data-bs-toggle="modal" data-bs-target="#registerModal">Register
              </button>
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>

  <!-- Modal REGISTER -->
  <div class="modal fade" id="registerModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header pb-2">
          <h5 class="modal-title d-flex align-items-center">
            <i class="bi bi-person-fill-add fs-3 me-2"></i> User Registration
          </h5>
          <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <span class="badge text-bg-light text-wrap py-2 fw-light d-none">Note: Your details must match your ID (NIN, Passport,
          Drivers
          License,
          etc.) that will be required during check-in</span>
        <span class="badge text-bg-light text-wrap py-2 fw-light"><?php flash_msg('success'); ?></span>
        <form id="user-form" method="POST" enctype="multipart/form-data">
          <div class="modal-body row">
            <div class="form-group mb-2 col-lg-6 px-1">
              <label for="" class="form-label mb-0">Name</label>
              <input type="text" name="name" class="form-control shadow-none" required>
            </div>
            <div class="form-group mb-2 col-lg-6 px-1">
              <label for="" class="form-label mb-0">Email</label>
              <input type="email" name="email" class="form-control shadow-none" required>
            </div>
            <div class="form-group mb-2 col-lg-12 px-1">
              <label for="" class="form-label mb-0">Address</label>
              <textarea name="address" rows="1" class="form-control shadow-none" required></textarea>
            </div>
            <div class="form-group mb-2 col-lg-6 px-1">
              <label for="" class="form-label mb-0">Phone Number</label>
              <input type="number" name="phone" class="form-control shadow-none" required>
            </div>
            <div class="form-group mb-2 col-lg-6 px-1 d-none">
              <label for="" class="form-label mb-0">Picture</label>
              <input type="file" name="image" class="form-control shadow-none">
            </div>

            <div class="form-group mb-2 col-lg-6 px-1">
              <label for="" class="form-label mb-0">Password</label>
              <input type="password" name="password" id="show_pass" class="form-control shadow-none" required>
            </div>
            <div class="form-check form-switch mb-2 d-none">
              <label for="show">
                <small>Show Password</small>
                <input class="form-check-input shadow-none border" type="checkbox" id="show" role="switch" onclick="showPassword()">
              </label>
            </div>
            <div class="form-group my-2 d-flex align-items-center justify-content-center">
              <button type="submit" class="btn btn-dark btn-sm" name="btn_register_user">Register</button>
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>

  <!-- Modal Message -->
  <div class="modal fade modal-center" id="room-unavailable" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header pb-2">
          <h5 class="modal-title d-flex align-items-center">
            <i class="las la-envelope fs-3 me-2"></i> Message
          </h5>
          <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="text-center">
            <h5 class="text-danger text-capitalize">This room is Not available for booking!</h5>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Booking Details -->
