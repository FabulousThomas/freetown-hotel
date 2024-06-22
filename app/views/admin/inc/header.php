<?php !isAdmin() ? redirect('admin/login') : '' ?>
<header class="d-non">
  <h2 class="m-0">
    <label for="nav-toggle" class="m-0">
      <span class="las la-bars"></span>
    </label>
  </h2>
  <div class="search-wrapper d-none">
    <span class="fas la-search"></span>
    <input type="search" placeholder="Search here...">
  </div>
  <div class="user-wrapper">
    <!-- <img src="<?= URLROOT ?>/admin/img/prf.jpg" width="40px" height="40px" alt="Admin"> -->

    <div class="dropdown open d-flex align-items-center">
      <i class="las la-user-circle la-2x"></i>
      <a class="p-1 dropdown-toggle text-dark" type="button" data-bs-toggle="dropdown">
        <small>Admin</small>
      </a>
      <div class="dropdown-menu text-center border-0 shadow">
        <?php if (isset($_SESSION['admin_access']) && $_SESSION['admin_access'] == '1') : ?>
          <small class="text-capitalize text-dark">Supper Admin</small>
          <hr class="m-0">
        <?php else : ?>
          <small class="text-capitalize text-dark">
              <?= isAdmin() ? $_SESSION['admin_name'] : '' ?>
          </small>
          <hr class="m-0">
        <?php endif; ?>
        <?php if (isset($_SESSION['admin_access']) && $_SESSION['admin_access'] == '1') : ?>
          <small class="dropdown-item text-dark btn-sm" data-bs-toggle="modal" data-bs-target="#modal-user" type='button'>Add New User</small>
          <hr class="m-0">
        <?php endif; ?>
        <small class="dropdown-item text-dark btn-sm" data-bs-toggle="modal" data-bs-target="#room-s" type='button'>Add Rooms</small>
        <hr class="m-0">
        <small class="dropdown-item text-dark btn-sm" data-bs-toggle="modal" data-bs-target="#room-short" type='button'>Add Short-let</small>
        <hr class="m-0">
        <a class="dropdown-item text-danger btn-sm" href='<?= URLROOT ?>/admin/logout'>Logout</a>
      </div>
    </div>
  </div>
</header>