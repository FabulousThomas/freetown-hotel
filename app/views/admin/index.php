<?php require APPROOT . "/views/admin/inc/head.php"; ?>
<title><?= SITENAME ?> | Dashboard</title>
<?php
global $con;
if (isset($_POST['btn_check_out'])) {
  $frm_data = filteration($_POST);

  $q = "UPDATE `rooms` SET `status`=? WHERE `room_id`=?";
  $v = array(1, $frm_data['room_id']);

  if (update($q, $v, 'ii')) {
    alert('success', 'Room checked out');
    $con->query("UPDATE `bookings` SET `r_status`='1' WHERE `booking_id`='$frm_data[booking_id]'");
  } else {
    alert('error', 'Unable to check out');
  }
} else if (isset($_POST['btn_check_in'])) {
  $frm_data = filteration($_POST);

  $q = "UPDATE `rooms` SET `status`=? WHERE `room_id`=?";
  $v = array(0, $frm_data['room_id']);

  if (update($q, $v, 'ii')) {
    alert('success', 'Room checked in');
    $con->query("UPDATE `bookings` SET `r_status`='0' WHERE `booking_id`='$frm_data[booking_id]'");
  } else {
    alert('error', 'Unable to check out');
  }
}
?>

<body>
  <?php require APPROOT . "/views/admin/inc/sidebar.php"; ?>

  <div class="main-content">
    <?php require APPROOT . "/views/admin/inc/header.php"; ?>

    <main class="">
      <?php require APPROOT . "/views/admin/inc/card.php"; ?>

      <div class="my-5">
        <div class="products">
          <div class="card">
            <div class="card-header float-end w-100">
              <h4>Bookings</h4>
              <?php flash_msg('success') ?>
              <div class="d-flex justify-content-between">
                <input type="text" class="form-control border shadow-none" id="myInput" placeholder="Search for...">
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive-md" style="height: 450px; overflow-y: scroll;">
                <table class="table table-hover text- sticky-top" id="myTable">
                  <thead class="sticky-top">
                    <tr class="">
                      <th>#</th>
                      <th>User Details</th>
                      <th>Room Details</th>
                      <th>Booking Details</th>
                      <th>Status</th>
                      <th>Room</th>
                      <th>Due</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $booking = selectAll('bookings', 'id');
                    $i = 1; ?>
                    <?php if (mysqli_num_rows($booking) >= 1) : ?>
                      <?php foreach ($booking as $book) : ?>
                        <tr class="align-middle">
                          <td><?= $i++ ?></td>
                          <td>
                            <p class="mb-0">
                              <?= 'Booking Id: ' . $book['booking_id'] ?>
                            </p>
                            <p class="mb-0">
                              <?= 'Name: ' . $book['name'] ?>
                            </p>
                            <p class="mb-0">
                              <?= 'Phone: ' . $book['phone'] ?>
                            </p>
                          </td>
                          <td>
                            <p class="mb-0">
                              <?= 'Room: ' . $book['r_name'] ?>
                            </p>
                            <p class="mb-0">
                              <?= 'Price: ' . number_format($book['r_price']) ?>
                            </p>
                            <p class="mb-0">
                              <?= 'Room: ' . $book['room_id'] . ' - ' . $book['r_type'] ?>
                            </p>
                          </td>
                          <td>
                            <p class="mb-0">
                              <?= 'Amount: ' . number_format($book['cost']) ?>
                            </p>
                            <p class="mb-0">
                              <?= 'Check in: ' . $book['check_in'] ?>
                            </p>
                            <p class="mb-0">
                              <?= 'Check out: ' . $book['check_out'] ?>
                            </p>
                          </td>
                          <td>
                            <?= $book['status'] == 'paid' ? "<span class='badge text-bg-success'>paid</span>" : "<span class='badge text-bg-danger'>unpaid</span>" ?>
                          </td>
                          <td>
                            <?= $book['r_status'] == '0' ? "<span class='badge text-bg-success'>checked in</span>" : "<span class='badge text-bg-danger'>checked out</span>" ?>
                          </td>
                          <td>
                            <?= date('Y-m-d') >= $book['check_out'] ? "<span class='badge text-bg-danger'>expired</span>" : "<span class='badge text-bg-success'>active</span>"; ?>
                          </td>

                          <td>
                            <div class="dropdown open">
                              <a class="btn btn-sm shadow-none border-0 rounded-0 btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                Action
                              </a>
                              <div class="dropdown-menu text-bg-light shadow border rounded-0 p-1">
                                <form method="POST" id="form_action">
                                  <input type="hidden" name="room_id" value="<?= $book['room_id'] ?>">
                                  <input type="hidden" name="booking_id" value="<?= $book['booking_id'] ?>">

                                  <button type="button" class="dropdown-item text-bg-primary mb-1 room-e d-none" title="Edit"><i class="las la-edit"></i> Edit</button>

                                  <?php if ($book['r_status'] != '1') : ?>
                                    <button type="submit" name="btn_check_out" class="dropdown-item text-bg-danger mb-1">Check out room</button>
                                  <?php else : ?>
                                    <button type="submit" name="btn_check_in" class="dropdown-item text-bg-primary mb-1">Check In room</button>
                                  <?php endif; ?>

                                  <button type="submit" name="btn_delete_user_query" title="Delete" class="dropdown-item text-bg-danger mb-1 d-none">
                                    <i class="las la-trash"></i>
                                    Delete
                                  </button>
                                </form>
                              </div>
                            </div>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    <?php else : ?>
                      <tr>
                        <td colspan="10" class="text-center">
                          <h5 class="text-center">No Bookings Available</h5>
                        </td>
                      </tr>
                    <?php endif; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

    </main>

    <?php
    require APPROOT . "/views/admin/inc/modals.php";
    require APPROOT . "/views/admin/inc/footer.php";
    ?>

  </div>

</body>

</html>