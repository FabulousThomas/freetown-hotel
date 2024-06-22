<!-- STYLING -->
<style>
  label {
    margin-bottom: 0;
  }

  .modal input {
    background-color: transparent;
  }
</style>

<!-- == Modal GENERAL SETTINGS == -->
<div class="modal fade" id="general-s" tabindex="-1" role="dialog" data-bs-backdrop="static">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header py-2 bg-light">
        <h5 class="modal-title">General Settings</h5>
        <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
      </div>
      <div class="modal-body">
        <form method="POST" id="general-s-form" enctype="multipart/form-data">
          <?php $res = selectWhere("settings", "id", "1");
          $row = $res->fetch_assoc(); ?>
          <div class="form-group mb-3">
            <label for="site_title">Site Title</label>
            <input type="text" name="site_title" value="<?= $row['site_title'] ?>" class="form-control shadow-none" required>
          </div>

          <div class="form-group mb-3">
            <label for="site_about">About Us</label>
            <textarea name="site_about" class="form-control shadow-none" rows="4" required><?= trim($row['site_about']); ?></textarea>
          </div>
          <div class="modal-footer py-2">
            <button type="submit" class="btn-secondary btn-md shadow-none" name="btn_update_settings">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- == Modal TEAM MANAGEMENT SETTINGS == -->
<div class="modal fade" id="team-s" tabindex="-1" role="dialog" data-bs-backdrop="static">
  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header py-2 bg-light">
        <h5 class="modal-title">Add Team Members</h5>
        <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
      </div>
      <div class="modal-body">
        <form method="POST" id="general-s-form" enctype="multipart/form-data">
          <div class="form-group mb-3">
            <label for="team_name">Team Name</label>
            <input type="text" name="team_name" class="form-control shadow-none" required>
          </div>

          <div class="form-group mb-3">
            <label for="team_photo">Picture</label>
            <input type="file" name="team_photo" class="form-control shadow-none" accept="image/*" required>
          </div>
          <div class="modal-footer py-2">
            <button type="submit" class="btn-secondary btn-md shadow-none" name="btn_add_team">Add Team</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- == Modal IMAGE SLIDER SETTINGS == -->
<div class="modal fade" id="slider-s" tabindex="-1" role="dialog" data-bs-backdrop="static">
  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header py-2 bg-light">
        <h5 class="modal-title">Add Image Slider</h5>
        <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
      </div>
      <div class="modal-body">
        <form method="POST" id="general-s-form" enctype="multipart/form-data">
          <div class="form-group mb-3">
            <label for="slider_photo">Picture</label>
            <input type="file" name="slider_photo" class="form-control shadow-none" accept="image/*" required>
          </div>
          <div class="modal-footer py-2">
            <button type="submit" class="btn-secondary btn-md shadow-none" name="btn_add_slider">Add Image</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- == ADD ROOMS == -->
<div class="modal fade" id="room-s" tabindex="-1" role="dialog" data-bs-backdrop="static">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header py-2 bg-light">
        <h5 class="modal-title">Add Room</h5>
        <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        </a>
      </div>
      <div class="modal-body">
        <form method="POST" id="general-s-form" enctype="multipart/form-data" autocomplete="off">
          <input type="hidden" value="">
          <div class="row">
            <div class="col-md-6 mb-2">
              <label for="">Name</label>
              <input type="text" name="name" min="1" class="form-control shadow-none" placeholder="Name" required>
            </div>

            <div class="col-md-6 mb-2">
              <label for="">Area</label>
              <input type="number" name="area" min="1" class="form-control shadow-none" placeholder="Area" required>
            </div>

            <div class="col-md-6 mb-2">
              <label for="">Price</label>
              <input type="number" name="price" min="1" class="form-control shadow-none" placeholder="Price" required>
            </div>


            <div class="col-md-6 mb-2">
              <label for="">Room Image 1</label>
              <input type="file" name="image1" id="image1" min="1" class="form-control shadow-none" required>
            </div>
            <div class="col-md-6 mb-2">
              <label for="">Room Image 2</label>
              <input type="file" name="image2" id="image2" min="1" class="form-control shadow-none">
            </div>
            <div class="col-md-6 mb-2">
              <label for="">Room Image 3</label>
              <input type="file" name="image3" id="image3" min="1" class="form-control shadow-none">
            </div>
            <div class="col-md-6 mb-2">
              <label for="">Room Image 4</label>
              <input type="file" name="image4" id="image4" min="1" class="form-control shadow-none">
            </div>

            <div class="col-md-12 mb-2 row">
              <label for="">Features</label>
              <?php $res = selectAll('features', 'id') ?>
              <?php while ($opt = $res->fetch_assoc()) : ?>
                <div class="col-md-3 mb-">
                  <label class="mb-0">
                    <input type="checkbox" name="features[]" value="<?= $opt['name'] ?>" class="shadow-none">
                    <?= $opt['name'] ?>
                  </label>
                </div>
              <?php endwhile; ?>
            </div>

            <div class="col-md-12 mb-2 row">
              <label for="">Facilities</label>
              <?php $res = selectAll('facilities', 'id') ?>
              <?php while ($opt = $res->fetch_assoc()) : ?>
                <div class="col-md-3 mb-">
                  <label class="mb-0">
                    <input type="checkbox" name="facilities[]" value="<?= $opt['name'] ?>" class="shadow-none">
                    <?= $opt['name'] ?>
                  </label>
                </div>
              <?php endwhile; ?>
            </div>
          </div>

          <div class="form-group mb-0 mb-lg-3">
            <label for="">Description</label>
            <textarea name="desc" rows="3" class="form-control shadow-none" placeholder="Details about this room" required></textarea>
          </div>

          <div class="modal-footer py-2">
            <button type="submit" class="btn-sm" name="btn_add_rooms"><i class="las la-plus"></i>
              Add Room</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- == ADD SHORT LET ROOMS == -->
<div class="modal fade" id="room-short" tabindex="-1" role="dialog" data-bs-backdrop="static">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header py-2 bg-light">
        <h5 class="modal-title">Add Short-Let Room</h5>
        <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        </a>
      </div>
      <div class="modal-body">
        <form method="POST" id="general-s-form" enctype="multipart/form-data" autocomplete="off">
          <input type="hidden" value="">
          <div class="row">
            <div class="col-md-6 mb-2">
              <label for="">Name</label>
              <input type="text" name="name" min="1" class="form-control shadow-none" placeholder="Name" required>
            </div>

            <div class="col-md-6 mb-2">
              <label for="">Area</label>
              <input type="number" name="area" min="1" class="form-control shadow-none" placeholder="Area" required>
            </div>

            <div class="col-md-6 mb-2">
              <label for="">Price</label>
              <input type="number" name="price" min="1" class="form-control shadow-none" placeholder="Price" required>
            </div>


            <div class="col-md-6 mb-2">
              <label for="">Room Image 1</label>
              <input type="file" name="image1" id="image1" min="1" class="form-control shadow-none" required>
            </div>
            <div class="col-md-6 mb-2">
              <label for="">Room Image 2</label>
              <input type="file" name="image2" id="image2" min="1" class="form-control shadow-none">
            </div>
            <div class="col-md-6 mb-2">
              <label for="">Room Image 3</label>
              <input type="file" name="image3" id="image3" min="1" class="form-control shadow-none">
            </div>
            <div class="col-md-6 mb-2">
              <label for="">Room Image 4</label>
              <input type="file" name="image4" id="image4" min="1" class="form-control shadow-none">
            </div>

            <div class="col-md-12 mb-2 row">
              <label for="">Features</label>
              <?php $res = selectAll('features', 'id') ?>
              <?php while ($opt = $res->fetch_assoc()) : ?>
                <div class="col-md-3 mb-">
                  <label class="mb-0">
                    <input type="checkbox" name="features[]" value="<?= $opt['name'] ?>" class="shadow-none">
                    <?= $opt['name'] ?>
                  </label>
                </div>
              <?php endwhile; ?>
            </div>

            <div class="col-md-12 mb-2 row">
              <label for="">Facilities</label>
              <?php $res = selectAll('facilities', 'id') ?>
              <?php while ($opt = $res->fetch_assoc()) : ?>
                <div class="col-md-3 mb-">
                  <label class="mb-0">
                    <input type="checkbox" name="facilities[]" value="<?= $opt['name'] ?>" class="shadow-none">
                    <?= $opt['name'] ?>
                  </label>
                </div>
              <?php endwhile; ?>
            </div>
          </div>

          <div class="form-group mb-0 mb-lg-3">
            <label for="">Description</label>
            <textarea name="desc" rows="3" class="form-control shadow-none" placeholder="Details about this room" required></textarea>
          </div>

          <div class="modal-footer py-2">
            <button type="submit" class="btn-sm" name="btn_add_short_let"><i class="las la-plus"></i>
              Add Room</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- == EDIT ROOMS == -->
<div class="modal fade" id="room-e" tabindex="-1" role="dialog" data-bs-backdrop="static">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header py-2 bg-light">
        <h5 class="modal-title">Edit Room</h5>
        <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        </a>
      </div>
      <div class="modal-body">

        <form method="POST" id="general-s-form" enctype="multipart/form-data" autocomplete="off">
          <div class="row">
            <input type="hidden" name="room_id" id="room_id" value="" class="form-control shadow-none" placeholder="Name" required>
            <div class="col-md-6 mb-3">
              <label for="">Name</label>
              <input type="text" name="name" id="room_name" class="form-control shadow-none" placeholder="Name" required>
            </div>

            <div class="col-md-6 mb-3">
              <label for="">Area</label>
              <input type="number" name="area" id="room_area" min="1" class="form-control shadow-none" placeholder="Area" required>
            </div>

            <div class="col-md-6 mb-3">
              <label for="">Price</label>
              <input type="number" name="price" id="room_price" min="1" class="form-control shadow-none" placeholder="Price" required>
            </div>

            <div class="col-md-6 mb-3">
              <label for="">Quantity</label>
              <input type="number" name="qty" id="room_qty" class="form-control shadow-none" placeholder="Quantity" required>
            </div>

            <div class="col-md-6 mb-3">
              <label for="">Adult (Max.)</label>
              <input type="number" name="adult" id="room_adult" class="form-control shadow-none" placeholder="Adult" required>
            </div>

            <div class="col-md-6 mb-3">
              <label for="">Children (Max.)</label>
              <input type="number" name="children" id="room_children" min="1" class="form-control shadow-none" placeholder="Children" required>
            </div>

            <div class="col-md-12 mb-2 row">
              <label for="">Features</label>
              <?php $res = selectAll('features', 'id') ?>
              <?php while ($opt = $res->fetch_assoc()) : ?>
                <div class="col-md-3 mb-">
                  <label class="mb-0">
                    <input type="checkbox" name="features[]" id="room_features" value="<?= $opt['id'] ?>" class="shadow-none">
                    <?= $opt['name'] ?>
                  </label>
                </div>
              <?php endwhile; ?>
            </div>

            <div class="col-md-12 mb-2 row">
              <label for="">Facilities</label>
              <?php $res = selectAll('facilities', 'id') ?>
              <?php while ($opt = $res->fetch_assoc()) : ?>
                <div class="col-md-3 mb-">
                  <label class="mb-0">
                    <input type="checkbox" name="facilities[]" id="room_facilities" value="<?= $opt['id'] ?>" class="shadow-none">
                    <?= $opt['name'] ?>
                  </label>
                </div>
              <?php endwhile; ?>
            </div>
          </div>

          <div class="form-group mb-0 mb-lg-3">
            <label for="">Description</label>
            <textarea name="desc" id="room_desc" rows="3" class="form-control shadow-none" placeholder="Details about this room" required></textarea>
          </div>

          <div class="modal-footer py-2">
            <button type="submit" class="btn-sm" name="btn_add_rooms"><i class="las la-check"></i>
              Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- == Modal ROOM IMAGE == -->
<div class="modal fade" id="room-image-s" tabindex="-1" role="dialog" data-bs-backdrop="static">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header py-2 bg-light">
        <h5 class="modal-title">Add Image</h5>
        <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
      </div>
      <div class="modal-body">
        <form method="POST" id="general-s-form" enctype="multipart/form-data">
          <div class="form-group mb-3">
            <input type="text" name="room_image_id" id="room_image_id">
            <label for="slider_photo">Picture</label>
            <input type="file" name="image" class="form-control shadow-none" accept="image/*" required>
          </div>
          <div class="modal-footer py-2">
            <button type="submit" class="btn-secondary btn-md shadow-none" name="btn_add_room_image">Add Image</button>
          </div>
        </form>

        <!-- <div class="table-responsive-md" style="height: 250px; overflow-y: scroll;">
          <table class="table table-hover text-center sticky-top">
            <thead>
              <tr class="text-bg-secondary">
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Thumb</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
              <tr class="">
                <td scope="row">R1C1</td>
                <td>R1C2</td>
                <td>R1C3</td>
                <td>R1C3</td>
              </tr>
              <tr class="">
                <td scope="row">Item</td>
                <td>Item</td>
                <td>Item</td>
                <td>Item</td>
              </tr>
            </tbody>
          </table>
        </div> -->

      </div>
    </div>
  </div>
</div>

<!-- == Modal FACILITIES == -->
<div class="modal fade" id="facilities-s" tabindex="-1" role="dialog" data-bs-backdrop="static">
  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header py-2 bg-light">
        <h5 class="modal-title">Add Facilities</h5>
        <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
      </div>
      <div class="modal-body">
        <form method="POST" id="general-s-form" enctype="multipart/form-data">
          <div class="form-group mb-3">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control shadow-none" required>
          </div>
          <div class="form-group mb-3">
            <label for="icon">Icon</label>
            <input type="file" name="icon" class="form-control shadow-none" accept="image/*">
          </div>
          <div class="form-group mb-3">
            <label for="desc">Description</label>
            <textarea type="text" name="desc" class="form-control shadow-none" required></textarea>
          </div>
          <div class="modal-footer py-2">
            <button type="submit" class="btn-secondary btn-md shadow-none" name="btn_add_facilities"><i class="las la-plus"></i> Add</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- == Modal FEATURES == -->
<div class="modal fade" id="features-s" tabindex="-1" role="dialog" data-bs-backdrop="static">
  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header py-2 bg-light">
        <h5 class="modal-title">Add Features</h5>
        <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
      </div>
      <div class="modal-body">
        <form method="POST" id="general-s-form" enctype="multipart/form-data">
          <div class="form-group mb-3">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control shadow-none" required>
          </div>
          <div class="modal-footer py-2">
            <button type="submit" class="btn-secondary btn-md shadow-none" name="btn_add_features"><i class="las la-plus"></i> Add</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- == ADD NEW ADMIN == -->
<div class="modal fade" id="modal-user" tabindex="-1" role="dialog" data-bs-backdrop="static">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header py-2 bg-light">
        <h5 class="modal-title">Add New User</h5>
        <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
      </div>
      <div class="modal-body">
        <form method="POST" enctype="multipart/form-data">
          <div class="form-group mb-3">
            <label for="">Username</label>
            <input type="text" name="username" class="form-control shadow-none" required>
          </div>
          <div class="form-group mb-3">
            <label for="">Password</label>
            <input type="password" name="password" class="form-control shadow-none" required>
          </div>
          <div class="form-group mb-3">
            <label for="">Admin Role</label>
            <select class="form-select form-control shadow-none" name="role" required>
              <!-- <option selected disabled>Asign Admin Role</option> -->
              <option value="0" selected>Admin</option>
              <option value="1">Supper Admin</option>
            </select>
          </div>
          <div class="modal-footer py-2">
            <button type="submit" class="btn-orange btn-sm" name="btn_add_admin">Add User</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- == COUPON EDIT == -->
<div class="modal fade" id="edit-coupon-modal" tabindex="-1" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header py-2 bg-light">
        <h5 class="modal-title">Edit Coupon</h5>
        <a type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </a>
      </div>
      <div class="modal-body">
        <form method="POST" enctype="multipart/form-data">
          <div class="form-group mb-3">
            <label for="">Coupon Code</label>
            <input type="hidden" name="coupon-id" id="coupon-id" class="form-control shadow-none">
            <input type="text" name="coupon-code" id="coupon-code" class="form-control shadow-none">
          </div>
          <div class="form-group mb-3">
            <label for="">Discount Price</label>
            <input type="tel" name="discount-price" id="discount-price" class="form-control shadow-none">
          </div>
          <div class="form-group mb-3">
            <label for="">Coupon Status</label>
            <select class="form-select form-control" name="coupon-status" id="c-status">
              <option selected disabled>Product Category</option>
              <option value="">Example</option>
              <option value="">Example</option>
              <option value="">Example</option>
            </select>
          </div>

          <div class="modal-footer py-2">
            <button type="submit" class="btn-orange btn-sm" name="btn-update-coupon">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>