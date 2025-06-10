<?php require_once APPROOT . "/views/admin/inc/head.php"; ?>
<title><?= SITENAME ?> | Edit Room</title>

<?php
$i = 1;

// if (isset($_GET['rid'])) {
//    $rid = $_GET['rid'];
//    $resAll = $con->query("SELECT * FROM `rooms` WHERE `room_id` = '$rid' LIMIT 1");
//    $row = mysqli_fetch_assoc($resAll);
//    if ($resAll && $rid !== $row['room_id']) {
//       redirect('admin/rooms.php');
//    }
// } else {
//    redirect("admin/rooms.php");
// }
?>

<body>
   <?php require APPROOT . "/views/admin/inc/sidebar.php"; ?>

   <div class="main-content">
      <?php require APPROOT . "/views/admin/inc/header.php"; ?>

      <main class="mt-">
         <div class="">
            <div class="col-lg-12">

               <div class="d-flex align-items-center justify-content-between">
                  <h4 class="text-uppercase">Edit Room</h4>
                  <?php flash_msg('success') ?>
               </div>

               <div class="card shadow-sm border-0 mb-3 ">

                  <div class="card-body">
                     <!-- == EDIT ROOMS == -->
                     <?php foreach ($data['editRooms'] as $row) : ?>
                        <form method="POST" id="general-s-form" enctype="multipart/form-data" autocomplete="off">
                           <div class="row">
                              <input type="hidden" name="room_id" value="<?= $row->room_id ?>" class="form-control shadow-none" placeholder="Name" required>
                              <div class="col-md-6 mb-3">
                                 <label for="">Name</label>
                                 <input type="text" name="name" value="<?= $row->name ?>" class="form-control shadow-none" placeholder="Name" required>
                              </div>

                              <div class="col-md-6 mb-3">
                                 <label for="">Price</label>
                                 <input type="number" name="price" value="<?= $row->price ?>" min="1" class="form-control shadow-none" placeholder="Price" required>
                              </div>

                              <div class="col-md-12 mb-2 row">
                                 <label for="">Features</label>
                                 <?php $res = selectAll('features', 'id') ?>
                                 <?php foreach ($res as $opt) : ?>
                                    <div class="col-md-3 mb-">
                                       <label class="mb-0">
                                          <?php $fea = explode(',', $row->features); ?>
                                          <input type="checkbox" name="features[]" id="e_room_features" value="<?= $opt['name'] ?>" <?= $fea[$i] ? 'checked' : ''; ?> class="shadow-none">
                                          <?= $opt['name'] ?>
                                       </label>
                                    </div>
                                 <?php endforeach; ?>
                              </div>

                              <div class="col-md-12 mb-2 row">
                                 <label for="">Facilities</label>
                                 <?php $res = selectAll('facilities', 'id') ?>
                                 <?php foreach ($res as $opt) : ?>
                                    <div class="col-md-3 mb-">
                                       <label class="mb-0">
                                          <?php $fac = explode(',', $row->facilities); ?>
                                          <input type="checkbox" name="facilities[]" id="e_room_facilities" value="<?= $opt['name'] ?>" <?= $fac[$i] ? 'checked' : ''; ?> class="shadow-none">
                                          <?= $opt['name'] ?>
                                       </label>
                                    </div>
                                 <?php endforeach; ?>
                              </div>
                           </div>

                           <div class="form-group mb-0 mb-lg-3">
                              <label for="">Description</label>
                              <textarea name="desc" rows="3" class="form-control shadow-none" placeholder="Details about this room" required><?= $row->description ?></textarea>
                           </div>

                           <div class="modal-footer py-2">
                              <button type="submit" class="btn-sm" name="btn_edit_rooms"><i class="las la-check"></i>
                                 Save</button>
                           </div>
                        </form>
                     <?php endforeach; ?>
                  </div>
               </div>
            </div>
         </div>
      </main>

      <?php require_once APPROOT . "/views/admin/inc/footer.php"; ?>
   </div>

</body>

</html>