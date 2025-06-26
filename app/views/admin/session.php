<?php require_once APPROOT . "/views/admin/inc/head.php"; ?>
<title><?= SITENAME ?> | Login Sessions</title>

<?php $i = 1; ?>

<body>
  <?php require_once APPROOT . "/views/admin/inc/sidebar.php"; ?>

  <div class="main-content">
    <?php require_once APPROOT . "/views/admin/inc/header.php"; ?>

    <main class="mt-">
      <div class="">
        <div class="col-lg-12">

          <div class="d-flex align-items-center justify-content-between">
            <h4 class="text-uppercase">Login Sessions</h4>
            <?php flash_msg('success') ?>
          </div>

          <div class="card shadow-sm border-0 mb-3 ">
            <div class="card-header float-end w-100">
              <div>
                <input type="text" class="form-control border shadow-none" id="myInput" placeholder="Search for...">
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive-md" style="height: 450px; overflow-y: scroll;">
                <table class="table table-hover" id="myTable">
                  <thead class="sticky-top">
                    <tr class="">
                      <th scope="col">#</th>
                      <th scope="col">User Id</th>
                      <th scope="col">Username</th>
                      <th scope="col">User Role</th>
                      <th scope="col">Date & Time</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (isset($data['getAll']) && $data['getAll'] <= 0) : ?>
                      <tr>
                        <th scope="row" colspan="8" class="text-center">Session is empty</th>
                      </tr>
                    <?php elseif (isset($data['getAll'])) : ?>
                      <?php foreach ($data['getAll'] as $row) : ?>
                        <tr>
                          <th scope="row"><?= $i++ ?></th>
                          <td><?= $row->user_id ?></td>
                          <td><?= $row->username ?></td>
                          <td><?= $row->access == "1" ? "Super Admin" : "Admin" ?></td>
                          <td><?= $row->created_at ?></td>

                        </tr>
                      <?php endforeach; ?>
                    <?php endif; ?>
                </table>
              </div>
            </div>

          </div>

        </div>
      </div>
    </main>

    <?php require_once APPROOT . "/views/admin/inc/footer.php"; ?>
  </div>

</body>

</html>