<?php require APPROOT . "/views/inc/head.php"; ?>
<title><?= SITENAME ?> | Payment</title>

<body>
  <!-- NAVBAR -->
  <?php require_once APPROOT . "/views/inc/navbar.php"; ?>
  <!-- CHECKOUT -->
  <section class="mt-3 mb-5 py-5 d-fle flex-column align-items-center justify-content-center">
    <!-- <h2 class="text-center mb-3">Payment</h2> -->
    <div class="checkout container col-lg-8 col-12 mx-auto text-center btn-custom-bg p-lg-4 p-2">
      <?php if (isset($_POST['booking_status']) && $_POST['booking_status'] == 'unpaid') : ?>
        <?php $amount = strval($_POST['booking_price']); ?>
        <?php $booking_id = $_POST['booking_id']; ?>
        <?php $booking_room_id = $_POST['booking_room_id']; ?>
        <h2>You have a pending booking</h2>
        <h4>Amount to pay:
          <span class="text-warning" style=" font-weight: bolder;">
            <?= CURRENCY ?><?= number_format($_POST['booking_price']) ?>
          </span>
        </h4>
        <!-- Set up a container element for the button -->
        <!-- <div class="py-4" id="paypal-button-container"></div> -->
        <div class="card py-2 mt-5">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-3">
              <form id="paymentForm" method="POST">
                <div class="form-group">
                  <input type="hidden" id="email-address" class="form-control shadow-none" value="<?= $_SESSION['user_email'] ?>" />
                </div>
                <div class="form-group">
                  <input type="hidden" id="amount" class="form-control shadow-none" value="<?= $_POST['booking_price'] ?>" />
                </div>
                <button type="submit" class="btn border my-2" onclick="payWithPaystack()">
                  <img src="<?= URLROOT; ?>/assets/images/logo/paystack-Logo.png" width="150px" height="">
                </button>
              </form>
            </div>
            <div class="col-md-3">
              <button type="submit" class="btn border my-2" onclick="alert('Not Available')">
                <img src="<?= URLROOT; ?>/assets/images/logo/paypal-Logo.png" width="150px" height="33px">
              </button>
            </div>
            <div class="col-md-3">
              <button type="submit" class="btn border my-2" onclick="alert('Not Available')">
                <img src="<?= URLROOT; ?>/assets/images/logo/flutterwave-Logo.png" width="150px" height="">
              </button>
            </div>
          </div>
        </div>
      <?php else : ?>
        <?php if (isset($_SESSION['room']['payment']) && $_SESSION['room']['payment'] != 0) : ?>
          <?php $amount = strval($_SESSION['room']['payment']); ?>
          <?php $booking_id = $_SESSION['booking_id']; ?>
          <?php $booking_room_id = $_SESSION['r_id']; ?>
          <h2>Your booking is placed successfully!</h2>
          <h4>Your payment:
            <span class="fw-bolder text-warning">
              <?= CURRENCY ?><?= number_format($_SESSION['room']['payment']) ?>
            </span>
          </h4>
          <!-- Set up a container element for the button -->
          <!--PAYMENT BUTTONS-->
          <!--<div class="py-4 text-center" id="paypal-button-container"></div>-->
          <div class="card py-2 mt-4">
            <div class="row align-items-center justify-content-center">
              <div class="col-md-3">
                <form id="paymentForm">
                  <div class="form-group">
                    <input type="hidden" id="email-address" class="form-control shadow-none" value="<?= $_SESSION['email'] ?>" />
                  </div>
                  <div class="form-group">
                    <input type="hidden" id="amount" class="form-control shadow-none" value="<?= $_SESSION['room']['payment'] ?>">
                  </div>
                  <button type="submit" class="btn border my-2" onclick="payWithPaystack()">
                    <img src="<?= URLROOT; ?>/assets/images/logo/paystack-Logo.png" width="150px" height="">
                  </button>
                </form>
              </div>
              <div class="col-md-3">
                <button type="submit" class="btn border my-2" onclick="alert('Not Available')">
                  <img src="<?= URLROOT; ?>/assets/images/logo/paypal-Logo.png" width="150px" height="40px">
                </button>
              </div>
              <div class="col-md-3">
                <button type="submit" class="btn border my-2" onclick="alert('Not Available')">
                  <img src="<?= URLROOT; ?>/assets/images/logo/flutterwave-Logo.png" width="150px" height="">
                </button>
              </div>
            </div>
          </div>
        <?php else : ?>
          <?php if (isUserLoggedIn()) : ?>
            <?php redirect("account/$_SESSION[user_id]"); ?>
          <?php else : ?>
            <?php redirect("receipt"); ?>
            <!-- <h4>YOU DON'T HAVE AN ORDER</h4> -->
          <?php endif; ?>
        <?php endif; ?>
      <?php endif; ?>
    </div>
  </section>


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
              value: '<?= $amount; ?>' // Can also reference a variable or function
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

          // window.location.href = "../server/complete_payment.php?transaction_id=" + transaction.id + "&booking_id=" +
          //   <?= $booking_id ?>;

          // window.location.href = "<?= URLROOT ?>/users/completePayment/" + response.reference + "/" + <?= $booking_id ?> + "/" + <?= $booking_room_id ?>;

          // When ready to go live, remove the alert and show a success message within this page. For example:
          // const element = document.getElementById('paypal-button-container');
          // element.innerHTML = '<h3>Thank you for your payment!</h3>';
          // Or go to another URL:  actions.redirect('thank_you.html');
        });
      }
    }).render('#paypal-button-container');
  </script>

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
        ), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
        // label: "Optional string that replaces customer email"
        onClose: function() {
          alert('Window closed.');
        },
        callback: function(response) {
          let message = 'Payment complete! Reference: ' + response.reference;
          let status = 'Status: ' + response.status;
          let booking = 'Booking: ' + <?= $booking_id ?>;

          // if (response.status === 'success') {
          // alert(message + ', ' + status + ', ' + booking);
          // window.location.href = "<?= URLROOT ?>/server/complete_payment.php?tnx_id=" + response.reference + "&booking_id=" + <?= $booking_id ?>;

          window.location.href = "<?= URLROOT ?>/users/completePayment/" + response.reference + "/" + <?= $booking_id ?> + "/" + <?= $booking_room_id ?>;
          // } 
          // else if (response.status == 'Declined') {
          //   alert(message + ', ' + status + ', ' + booking);

          // }
        }
      });

      handler.openIframe();
    }
  </script>

  <!-- FOOTER -->
  <?php require_once APPROOT . "/views/inc/footer.php"; ?>
</body>

</html>