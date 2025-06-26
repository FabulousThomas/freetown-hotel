<?php require_once  APPROOT . "/views/inc/head.php"; ?>
<title><?= SITENAME ?> | Booking Details</title>

<body>
   <!-- NAVBAR -->
   <?php require_once APPROOT . "/views/inc/navbar.php"; ?>
   <!-- ORDER DETAILS -->
   <section id="orders" class="orders container mb-5 mt-3 py-5">
      <div class="container pt-4 pt-0 text-center">
         <h2 class="font-weight-bold text-uppercase">Booking Details</h2>
      </div>
      <div class="table-responsive-md">
         <table class="table text-center table-hover mt-5 pt-5">
            <thead>
               <tr class="text-bg-secondary">
                  <th>Booking Id</th>
                  <th>Room Id</th>
                  <th>Name</th>
                  <th>Days</th>
                  <th>Price</th>
                  <th>Cost</th>
                  <th></th>
               </tr>
            </thead>
            <tbody>
               <?php foreach ($data['bookingDetails'] as $row) : ?>
                  <tr class="align-middle bg-light">
                     <td><?= $row->booking_id ?></td>
                     <td><?= $row->room_id ?></td>
                     <td><?= $row->name ?></td>
                     <td><?= $row->days ?></td>
                     <td><?= CURRENCY ?><?= number_format($row->r_price) ?></td>
                     <td><?= CURRENCY ?><?= number_format($row->cost) ?></td>
                     <td>
                        <?php if ($row->status == 'unpaid') : ?>
                           <form class="text-end" action="<?= URLROOT ?>/payment" method="POST">
                              <input type="hidden" name="booking_id" value="<?= $row->booking_id ?>">
                              <input type="hidden" name="booking_price" value="<?= $row->cost ?>">
                              <input type="hidden" name="booking_status" value="<?= $row->status ?>">
                              <input type="hidden" name="booking_room_id" value="<?= $row->room_id ?>">

                              <input type="submit" name="btn_pay_booking" class="btn btn-custom-bg d-none" value="Pay Now">
                              <button type="button" onclick="window.location.href='<?= URLROOT ?>/users/account/<?= isUserLoggedIn() ? $_SESSION['user_id'] : '' ?>#booking'" class="btn btn-custom-bg">Your Booking</button>
                           </form>
                        <?php else : ?>
                           <div class="text-end">
                              <button onclick="window.location.href='<?= URLROOT ?>/users/account/<?= $_SESSION['user_id'] ?>#booking'" class="btn btn-custom-bg">Your Booking</button>
                           </div>
                        <?php endif; ?>
                     </td>
                  </tr>
               <?php endforeach; ?>
            </tbody>
         </table>
      </div>

   </section>

   <!-- FOOTER -->
   <?php require_once APPROOT . "/views/inc/footer.php"; ?>
   
</body>

</html>