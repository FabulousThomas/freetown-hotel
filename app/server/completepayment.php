<?php
// require '../directories.php';

if (isset($_GET['tnx_id']) && isset($_GET['booking_id'])) {

    $r_status = '0';
    $booking_status = 'paid';
    $tnx_id = $_GET['tnx_id'];
    $room_id = $_SESSION['r_id'];
    $user_id = isUserLoggedIn() ? $_SESSION['user_id'] : null;
    $booking_id = $_SESSION['booking_id'];

    // UPDATE AND CHANGE BOOKING STATUS TO 'PAID'
    $stmt = $con->prepare("UPDATE `bookings` SET `status`=?, `r_status`=? WHERE `booking_id` = ? LIMIT 1");
    $stmt->bind_param('sii', $booking_status, $r_status, $booking_id);

    if ($stmt->execute()) {
        flash_msg('success', '<strong>Congrats! </strong>Transaction completed');
        if (!isUserLoggedIn()) {
            redirect('receipt');
        } else {
            redirect("account/$_SESSION[user_id]");
        }
    } else {
        flash_msg('success', 'Could not complete transaction', 'alert-danger');
        if (!isUserLoggedIn()) {
            redirect('receipt');
        } else {
            redirect("account/$_SESSION[user_id]");
        }
    }

    // SAVE PAYMENT INFO
    $stmt1 = $con->prepare("INSERT INTO `payments`(`booking_id`, `user_id`, `tnx_id`) VALUES (?,?,?)");
    $stmt1->bind_param("iis", $booking_id, $user_id, $tnx_id);
    $stmt1->execute();

    // UPDATE ROOM STATUS IF PAYMENT IS MADE SUCCESSFULLY
    $q = "UPDATE `rooms` SET `status`=? WHERE `room_id` = ?";
    $v = array(0, $room_id);
    update($q, $v, "ii");

    // REDIRECT TO ACCOUNT PAGE
    flash_msg('success', 'Paid successfully! Thanks for booking with us - ' . $_SESSION['user_name']);

    if (!isUserLoggedIn()) {
        redirect('receipt');
    } else {
        redirect("account/$_SESSION[user_id]");
    }
} else {
    redirect('rooms');
    exit();
}
