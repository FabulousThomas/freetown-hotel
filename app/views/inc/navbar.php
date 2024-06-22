  <!-- Navbar  -->
  <nav id="nav-bar" class="navbar navbar-expand-lg navbar-light bg-white ps-lg-3 me-lg-0 py-lg-0 shadow-sm sticky-top">
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

        <a class="btn btn-sm my-lg-0 my-1 btn-custom-bg text-white py-lg-4 rounded-0" href="<?= URLROOT ?>/shortlet">Short Let/Apartment</a>

        <?php if (isUserLoggedIn()) : ?>
          <div class="dropdown open">
            <a class="btn btn-outline-dark btn-sm dropdown-toggle py-lg-4 rounded-0" type="button" id="triggerId" data-bs-toggle="dropdown">
              <?= $_SESSION['user_name']; ?>
            </a>
            <ul class="dropdown-menu rounded-0 shadow" aria-labelledby="triggerId">
              <li>
                <a class="dropdown-item text-dark" href="<?= URLROOT ?>/users/account/<?= $_SESSION['user_id'] ?>">Account</a>
              </li>
              <li>
                <a class="dropdown-item text-danger" href="<?= URLROOT ?>/users/logout">Logout</a>
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

  <!-- ========================================== -->