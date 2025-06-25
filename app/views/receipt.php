<!-- Head -->
<?php require_once APPROOT . '/views/inc/head.php'; ?>
<link rel="stylesheet" href="<?= URLROOT ?>/assets/css/print.css" media="print">
<title><?= SITENAME ?> | Receipt</title>

<style>
   span {
      display: block;
   }

   p {
      font-size: 15px;
   }

   table thead tr th,
   table tbody tr th {
      padding: .3rem .5rem;
   }
</style>

<main class="py-5">

   <div class="text-center">
      <button type="button" onclick="window.location.href='<?= URLROOT ?>/rooms'" class="btn btn-success mb-2" id="print-btn">Continue Booking</button>
      <button type="button" onclick="window.print();" class="btn btn-success mb-2" id="print-btn">Download Receipt</button>
      <p class="note">Please, download or screenshot your receipt as evidence at FREETOWN HOTEL<br><span class="text-danger">Also take note of your BOOKING ID</span></p>
   </div>

   <div class="">
      <?php foreach ($data['receipt'] as $row) : ?>
         <div class="px-3 position-relative">
            <div class="d-flex justify-content-between mt-3 mb-3">
               <?= SITELOGO ?>
               <h3 class="text-uppercase text-success">Receipt</h3>
            </div>

            <div class="d-flex justify-content-between align-items-cente">
               <div class="mb-5">
                  <p class="mb-0">Name: <?= $row->name ?></p>
                  <p class="mb-0">Email: <?= $row->email ?></p>
                  <p class="mb-0">Phone: <?= $row->phone ?></p>
                  <p class="mb-0">User ID: <?= $row->user_id ?></p>
               </div>

               <div class="mb-5">
                  <p class="mb-0">Room ID: <?= $row->room_id ?></p>
                  <p class="mb-0">Check In: <?= $row->check_in ?></p>
                  <p class="mb-0">Check Out: <?= $row->check_out ?></p>
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
                        <td scope="row">
                           <span>Room Name: <?= $row->r_name ?></span>
                           <span>Booking ID: <?= $row->booking_id ?></span>
                           <span>Room Type: <?= $row->r_type ?></span>
                        </td>
                        <td><?= $row->days ?></td>
                        <td><?= number_format($row->r_price) ?></td>
                        <td><?= number_format($row->cost) ?></td>
                     </tr>
                     <tr class="float-en">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td scope="row">
                           <span>Subtotal: <?= number_format($row->cost) ?></span>
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
      <?php endforeach; ?>
   </div>

</main>