<!-- Head -->
<?php require_once APPROOT . '/views/inc/head.php' ?>

<title><?= SITENAME ?> | Check-Out</title>

<body class="bg-light">
  <!-- Navbar -->
  <?php require_once APPROOT . '/views/inc/navbar.php' ?>

  <section class="contact my-5 pt-5">
    <div class="container px-lg-5">
      <h2 class="text-center text-uppercase mb-4">Checkout</h2>

      <div class="row mt-5 align-items-cente">
        <div class="col-lg-6 col-md-6 mb-3 ">
          <h4 class="text-uppercase border-bottom pb-3 text-center">Confirm your entries</h4>
          <div class="bg-white p-4">
            <?php if (isset($_SESSION['form'])) : ?>
              <?php //foreach ($data['bookingDetails'] as $row) : 
              ?>
              <div class="form-group mb-2 d-flex align-items-center justify-content-between border-bottom">
                <label class="text-capitalize">Check In</label>
                <small><?= $_SESSION['f_check_in'] ?></small>
              </div>
              <div class="form-group mb-2 d-flex align-items-center justify-content-between border-bottom">
                <label class="text-capitalize">Check Out</label>
                <small><?= $_SESSION['f_check_out'] ?></small>
              </div>
              <div class="form-group mb-2 d-flex align-items-center justify-content-between border-bottom">
                <label class="text-capitalize">Days to stay</label>
                <small><?= $_SESSION['count_days'] ?> Day<sub>(s)</small>
              </div>
              <div class="form-group mb-2 d-flex align-items-center justify-content-between border-bottom">
                <label class="text-capitalize"><?= $_SESSION['room']['r_name'] ?></label>
                <small class="fs-"><?= CURRENCY ?><?= $_SESSION['payment'] ?><sub>/Night</sub></small>
              </div>
              <div class="form-group mb-2 d-flex align-items-center justify-content-between border-bottom">
                <label class="text-capitalize">Adult<sub>(s)</sub></label>
                <small class="fs-"><?= $_SESSION['f_adult'] ?> Person<sub>(s)</sub></small>
              </div>
              <div class="form-group mb-2 d-flex align-items-center justify-content-between border-bottom">
                <label class="text-capitalize">Children</label>
                <small class="fs-"><?= $_SESSION['f_children'] ?> Person<sub>(s)</sub></small>
              </div>
              <div class="form-group mb-2 d-flex align-items-center justify-content-between border-bottom">
                <label class="text-capitalize">Full name</label>
                <small class="fs-"><?= $_SESSION['f_name'] ?></small>
              </div>
              <div class="form-group mb-2 d-flex align-items-center justify-content-between border-bottom">
                <label class="text-capitalize">Phone</label>
                <small class="fs-"><?= $_SESSION['f_phone'] ?></small>
              </div>
              <div class="form-group mb-2 d-flex align-items-center justify-content-between border-bottom">
                <label class="text-capitalize">Address</label>
                <small class="fs-"><?= $_SESSION['f_address'] ?></small>
              </div>
              <div class="form-group mb-2 d-flex align-items-center justify-content-between border-bottom">
                <label class="text-capitalize">0 % Tax</label>
                <small class="fs-"><?= '₦0.00' ?></small>
              </div>
              <div class="form-group mb-2 d-flex align-items-center justify-content-between border-bottom">
                <label class="text-capitalize">0 % service charge</label>
                <small class="fs-"><?= '₦0.00' ?></small>
              </div>
              <div class="form-group mb-3 d-flex align-items-center justify-content-between">
                <input type="text" name="coupon" class="form-control shadow-none border" placeholder="Coupon Code">
                <input type="button" class="form-contro btn btn-custom-bg shadow-none" value="Apply Code">
              </div>
              <div class="form-group mb-2 d-flex align-items-center justify-content-between border-bottom">
                <label class="text-capitalize">Total Price</label>
                <h5 class="fs-"><?= CURRENCY ?><?= number_format($_SESSION['payment'], 2) ?></h5>
              </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 mb-3 ">
          <h4 class="text-uppercase border-bottom pb-3 text-center">Payment Methods</h4>
          <div class="bg-white p-4">
            <div class="form-group mb-3">
              <h5 class="text-center pb-4">Select payment method</h5>
              <div class="row justify-content-between">
                <div class="col-lg-4 col-12 mb-3">
                  <form id="paymentForm">
                    <input type="hidden" id="email-address" class="form-control shadow-none border-bottom border-0" value="<?= $_SESSION['email'] ?>" readonly>
                    <input type="hidden" id="amount" class="form-control shadow-none border-bottom border-0" value="<?= $_SESSION['payment'] ?>" readonly>
                    <button type="submit" class="btn border p-2 text-uppercase rounded-0 w-100" onclick="payWithPaystack()">Paystack</button>
                  </form>
                </div>
                <div class="col-lg-4 col-12 mb-3">
                  <button type="submit" class="btn border p-2 text-uppercase rounded-0 w-100" onclick="alert('Not Available')">Paypal</button>
                </div>
                <div class="col-lg-4 col-12 mb-1">
                  <button type="submit" class="btn border p-2 text-uppercase rounded-0 w-100" onclick="alert('Not Available')">Flutterwave</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php //endforeach; 
        ?>
      <?php endif; ?>
      </div>
    </div>
  </section>

  <!-- PAYSTACK PAYMENT INTEGRATION -->
  <script>
    const paymentForm = document.getElementById('paymentForm');
    paymentForm.addEventListener("submit", payWithPaystack, false);

    function payWithPaystack(e) {
      e.preventDefault();

      let handler = PaystackPop.setup({
        key: 'pk_test_9d1f8787b3516050315685ddc3a8116c44cd9a53', // Replace with your public key
        email: document.getElementById("email-address").value,
        amount: document.getElementById("amount").value * 100,
        ref: '' + Math.floor((Math.random() * 1000000000) +
          1
        ),
        onClose: function() {
          alert('Window closed.');
        },
        callback: function(response) {
          let message = 'Payment complete! Reference: ' + response.reference;
          let status = 'Status: ' + response.status;
          let booking = 'Booking: ' + <?= isset($_SESSION['booking_id']) ? $_SESSION['booking_id'] : '' ?>

          window.location.href = "<?= URLROOT ?>/users/completePayment/" + response.reference + "/" + <?= isset($_SESSION['booking_id']) ?  $_SESSION['booking_id'] : '' ?> + "/" + <?= isset($_SESSION['r_id']) ?  $_SESSION['r_id'] : '' ?>;
        }
      });

      handler.openIframe();
    }
  </script>

  <!-- ======================================================================= -->

  <!-- PAYPAL PAYMENT INTEGRATION -->
  <!-- Replace "test" with your own sandbox Business account app client ID -->
  <script src="https://www.paypal.com/sdk/js?client-id=Ae_d_PYfdXSPRDd9fFkX28vsbb9HOfqY5--5GpT7SfaPh97osu3aBzXBNxDTW8zPjTYpHFU0NweN7uvp&currency=USD">
  </script>

  <script>
    paypal.Buttons({
      // Sets up the transaction when a payment button is clicked
      createOrder: (data, actions) => {
        return actions.order.create({
          purchase_units: [{
            amount: {
              value: '<?= isset($_SESSION['payment']) ? $_SESSION['payment'] : ''; ?>' // Can also reference a variable or function
            }
          }]
        });
      },
      // Finalize the transaction after payer approval
      onApprove: (data, actions) => {
        return actions.order.capture().then(function(orderData) {
          // Successful capture! For dev/demo purposes:
          console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
          const transaction = orderData.purchase_units[0].payments.captures[0];
          alert(
            `Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);

          // window.location.href = "<?= URLROOT ?>/users/completePayment/" + response.reference + "/" + <?= isset($row) ?  $row->booking_id : '' ?> + "/" + <?= isset($row) ? $row->room_id : '' ?>;

          // When ready to go live, remove the alert and show a success message within this page. For example:
          // const element = document.getElementById('paypal-button-container');
          // element.innerHTML = '<h3>Thank you for your payment!</h3>';
          // Or go to another URL:  actions.redirect('thank_you.html');
        });
      }
    }).render('#paypal-button-container');
  </script>

  <!-- Footer -->
  <?php require_once APPROOT . '/views/inc/footer.php' ?>