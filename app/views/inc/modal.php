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
  <div class="modal fade modal-center" id="booking_details" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header pb-2">
          <h5 class="modal-title d-flex align-items-center">Booking Details</h5>
          <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="text-center">
            <div class="table-responsive-md">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Booking ID</th>
                    <th scope="col">Room ID</th>
                    <th scope="col">Days</th>
                    <th scope="col">Price</th>
                    <th scope="col">Total Cost</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="">
                    <td><input type="text" class="form-crontrol text-center w-100 shadow-none border-0" readonly id="name"></td>
                    <td><input type="text" class="form-crontrol text-center w-100 shadow-none border-0" readonly id="bk_id"></td>
                    <td><input type="text" class="form-crontrol text-center w-100 shadow-none border-0" readonly id="rm_id"></td>
                    <td><input type="text" class="form-crontrol text-center w-100 shadow-none border-0" readonly id="days"></td>
                    <td><input type="text" class="form-crontrol text-center w-100 shadow-none border-0" readonly id="price"></td>
                    <td><input type="text" class="form-crontrol text-center w-100 shadow-none border-0" readonly id="cost"></td>
                    <td><input type="text" class="form-crontrol text-center w-100 shadow-none border-0" readonly id="status"></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Booking RECEIPT -->
  <div class="modal fade modal-center" id="booking_receipt" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header pb-2">
          <h5 class="modal-title d-flex align-items-center">Booking Receipt</h5>
          <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="text-cente">
            <div class="px-3 position-relative">
              <div class="d-flex justify-content-between mt-3 mb-3">
                <?= SITELOGO ?>
                <h3 class="text-uppercase text-success">Receipt</h3>
              </div>

              <div class="d-flex justify-content-evenly align-items-cente">
                <div class="mb-5">
                  <p class="mb-0 d-flex align-items-center">Name: <input type="text" class="text-center shadow-none border-0" readonly id="u_name"></p>
                  <p class="mb-0 d-flex align-items-center">Email: <input type="text" class="text-center shadow-none border-0" readonly id="email"></p>
                  <p class="mb-0 d-flex align-items-center">Phone: <input type="text" class="text-center shadow-none border-0" readonly id="phone"></p>
                  <p class="mb-0 d-flex align-items-center">User ID: <input type="text" class="text-center shadow-none border-0" readonly id="user_id"></p>
                </div>

                <div class="mb-5">
                  <p class="mb-0 d-flex align-items-center">Room ID: <input type="text" class="text-center shadow-none border-0" readonly id="room_id"></p>
                  <p class="mb-0 d-flex align-items-center">Check In: <input type="text" class="text-center shadow-none border-0" readonly id="check_in"></p>
                  <p class="mb-0 d-flex align-items-center">Check Out: <input type="text" class="text-center shadow-none border-0" readonly id="check_out"></p>
                </div>
              </div>

              <div class="table-responsive-md">
                <table class="table borde text-center align-middle">
                  <thead class="table-light border">
                    <caption>
                      <!-- Receipt -->
                    </caption>
                    <tr class="">
                      <th width="50%">Description</th>
                      <th>Days</th>
                      <th>Price</th>
                      <th>Amount</th>
                    </tr>
                  </thead>
                  <tbody class="table-group-divide borde">
                    <tr class="">
                      <td scope="row">Room Name: <input type="text" class="form-crontrol text-center w-100 shadow-none border-0" readonly id="r_name">
                        <span>Booking ID: <input type="text" class="form-crontrol text-center w-100 shadow-none border-0" readonly id="book_id"></span>
                        <span>Room Type: <input type="text" class="form-crontrol text-center w-100 shadow-none border-0" readonly id="r_type"></span>
                      </td>
                      <td><input type="text" class="form-crontrol text-center w-100 shadow-none border-0" readonly id="r_days"></td>
                      <td><input type="text" class="form-crontrol text-center w-100 shadow-none border-0" readonly id="r_price"></td>
                      <td><input type="text" class="form-crontrol text-center w-100 shadow-none border-0" readonly id="r_cost"></td>
                    </tr>
                    <tr class="float-en">
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>Subtotal: <input type="text" class="form-crontrol d-inline text-center w-100 shadow-none border-0" readonly id="sub_total">
                        <span>Total Tax: <?= number_format(0, 2) ?></span>
                      </td>
                    </tr>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td>
                        <h6 class="text-danger mb-0">Thank you for your patronage</h6>
                      </td>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>