<?php
global $con;
$stmt = $con->prepare("SELECT COUNT(*)  AS room_total FROM `rooms`");
$stmt->execute();
$room_total = $stmt->get_result();

$stmt = $con->prepare("SELECT COUNT(*)  AS booking_total FROM `bookings`");
$stmt->execute();
$booking_total = $stmt->get_result();

$stmt = $con->prepare("SELECT COUNT(*)  AS customers FROM `users`");
$stmt->execute();
$customers = $stmt->get_result();

$stmt = $con->prepare("SELECT SUM(cost)  AS booking_cost FROM `bookings` WHERE `status`='paid'");
$stmt->execute();
$booking_cost = $stmt->get_result();

?>

<div class="cards">

  <div class="card-single">
    <div>
      <?php foreach ($room_total as $total) { ?>
        <h2><?= $total['room_total']; ?></h2>
      <?php } ?>
      <span>Rooms</span>
    </div>
    <div>
      <span class="las la-hotel"></span>
    </div>
  </div>

  <div class="card-single">
    <div>
      <?php foreach ($customers as $total) { ?>
        <h2><?= $total['customers']; ?></h2>
      <?php } ?>
      <span>Registered Customers</span>
    </div>
    <div>
      <span class="las la-users"></span>
    </div>
  </div>

  <div class="card-single">
    <div>
      <?php foreach ($booking_total as $total) { ?>
        <h2><?= $total['booking_total']; ?></h2>
      <?php } ?>
      <span>Bookings</span>
    </div>
    <div>
      <span class="las la-clipboard"></span>
    </div>
  </div>

  <div class="card-single">
    <div>
      <?php if (isset($_SESSION['admin_access']) && $_SESSION['admin_access'] == '1') : ?>
        <?php foreach ($booking_cost as $total) { ?>
          <h2><?= CURRENCY ?> <?= number_format($total['booking_cost']) ?></h2>
        <?php } ?>
      <?php else : ?>
        <h2>*****</h2>
      <?php endif; ?>
      <span>Income</span>
    </div>
    <div>
      <span class="lab la-google-wallet"></span>
    </div>
  </div>
</div>