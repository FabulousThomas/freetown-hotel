<?php require_once APPROOT . '/views/inc/head.php' ?>
<title><?= SITENAME ?> | Account</title>

<body class="bg-light">
    <!-- NAVBAR -->
    <?php require APPROOT . "/views/inc/navbar.php"; ?>
    <!-- ACCOUNT -->
    <section class="mt-3 py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 mb-4 d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="text-capitalize">PROFILE</h2>
                        <div class="" style="font-size: 13px;">
                            <a href="<?= URLROOT ?>/index" class="text-secondary">HOME</a>
                            <span class="text-secondary"> > </span>
                            <a class="text-muted ">PROFILE</a>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="<?= URLROOT ?>/rooms" class="btn btn-sm rounded-0 btn-success mb-3 me-lg-2">Continue Booking</a>
                        <a href="#booking" class="btn btn-sm rounded-0 btn-custom-bg mb-3 me-lg-2">Your Booking</a>
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    <?php flash_msg('message'); ?>
                </div>

                <?php foreach ($data['userDetails'] as $row) : ?>
                    <div class="col-lg-8 col-md-12 mb-4">
                        <div class="card border-0 shadow-sm text-bg-white p-3">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="m-0">Basic Information</h5>
                                <h6 class="mb-0">User ID: <?= $row->user_id ?></h6>
                            </div>
                            <form method="POST" autocomplete="off">
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <label for="">Name</label>
                                        <input type="text" name="name" value="<?= $row->name ?>" class="form-control shadow-none rounded-0 border" readonly required>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="">Email</label>
                                        <input type="text" name="email" value="<?= $row->email ?>" class="form-control shadow-none rounded-0 border" readonly required>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="">Phone</label>
                                        <input type="tel" name="phone" value="<?= $row->phone ?>" class="form-control shadow-none rounded-0 border" required>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="">Address</label>
                                        <textarea rows="1" name="address" class="form-control shadow-none rounded-0 border" required><?= $row->address ?></textarea>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <button type="submit" name="btn_save_changes" class="btn btn-sm btn-custom-bg rounded-0 form-control">Save Changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>

                <div class="col-lg-4 col-md-12 mb-5">
                    <div class="card border-0 shadow-sm text-bg-white p-3">
                        <div class="mb-3">
                            <h5 class="m-0">Change Password</h5>
                        </div>
                        <form method="POST" autocomplete="off">
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <label for="">New Password</label>
                                    <input type="password" name="password" class="form-control shadow-none rounded-0 border" required>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="">Confirm Password</label>
                                    <input type="password" name="cpassword" class="form-control shadow-none rounded-0 border" required>
                                </div>

                                <div class="col-md-12x mb-2">
                                    <button type="submit" name="btn_change_password" class="btn btn-sm btn-custom-bg rounded-0 form-control">Change Password</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- BOOKINGS -->
    <section id="booking" class="booking container">
        <div class="container pt-lg-4 pt-0 text-center">
            <h2 class="font-weight-bold text-uppercase">your bookings</h2>
        </div>
        <div class="table-responsive-md pb-5">
            <table class="table my-5 pb-5 text-center table-hover">
                <thead>
                    <tr class="text-bg-secondary">
                        <th>Booking Id</th>
                        <th>Room Id</th>
                        <th>Booking Cost</th>
                        <th>Booking Status</th>
                        <th>Booking Date</th>
                        <th></th>
                    </tr>
                </thead>
                <?php if (!$data['bookings']) : ?>
                    <tr>
                        <td colspan="5">
                            <h4>Booking is empty</h4>
                        </td>
                    </tr>
                <?php else : ?>
                    <?php foreach ($data['bookings'] as $row) : ?>
                        <tr class="align-middle bg-light">
                            <td><?= $row->booking_id ?></td>
                            <td><?= $row->room_id ?></td>
                            <td><?= CURRENCY ?><?= number_format($row->cost) ?></td>
                            <td><?= $row->status ?></td>
                            <td><?= $row->date ?></td>
                            <td hidden><?= $row->name ?></td>
                            <td hidden><?= CURRENCY ?><?= number_format($row->r_price) ?></td>
                            <td hidden><?= $row->days ?></td>
                            <td>
                                <div class="dropdown open">
                                    <button class="btn btn-light btn-sm dropdown-toggle border" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="triggerId">
                                        <a class="btn btn-sm dropdown-item d-none" href="<?= URLROOT ?>/receipt/<?= $row->booking_id ?>">View Receipt</a>
                                        <form method="POST" action="<?= URLROOT ?>/bookingdetails/<?= $row->booking_id ?>" class="d-none">
                                            <input type="hidden" name="booking_id" value="<?= $row->booking_id ?>">
                                            <input type="hidden" name="booking_status" value="<?= $row->status ?>">
                                            <button type="submit" class="btn btn-sm dropdown-item" name="btn_booking_details">Booking Details</button>
                                            <!-- <button type="button" class="btn btn-sm dropdown-item" data-bs-toggle="modal" data-bs-target="#booking-details">Booking Details</button> -->
                                        </form>
                                        <button type="button" class="btn btn-sm dropdown-item booking_receipt">View Receipt</button>
                                        <button type="button" class="btn btn-sm dropdown-item booking_details">Booking Details</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </table>
        </div>

    </section>

    <!-- FOOTER -->
    <?php require APPROOT . "/views/inc/footer.php"; ?>
</body>

</html>