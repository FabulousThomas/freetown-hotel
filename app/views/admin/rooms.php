<?php require_once APPROOT . "/views/admin/inc/head.php"; ?>
<title><?= SITENAME ?> | Rooms</title>
<style>
   span.badge {
      font-size: 11px !important;
      font-weight: 500 !important;
   }
</style>

<body>
   <?php require APPROOT . "/views/admin/inc/sidebar.php"; ?>

   <div class="main-content">
      <?php require APPROOT . "/views/admin/inc/header.php"; ?>

      <main class="mt-">
         <div class="">
            <div class="col-lg-12">

               <div class="d-flex align-items-center justify-content-between">
                  <h4 class="text-uppercase">Rooms</h4>
                  <?php flash_msg('success') ?>
               </div>

               <div class="card shadow-sm border-0 mb-3 ">
                  <div class="card-header py-1">
                     <div>
                        <input type="text" class="form-control border shadow-none" id="myInput" placeholder="Search for...">
                     </div>
                     <button class="btn-sm border-0 shadow-none d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#room-s"><i class="las la-plus fs-6"></i> Add Room</button>
                  </div>
                  <div class="card-body">
                     <div class="table-responsive-md" style="height: 450px; overflow-y: scroll;">
                        <table class="table table-hover text-center sticky-top" id="myTable">

                           <?php $i = 1; ?>
                           <thead class="sticky-top">
                              <tr class="">
                                 <th scope="col">#</th>
                                 <th scope="col">Name</th>
                                 <th hidden scope="col">Area</th>
                                 <th scope="col">Features</th>
                                 <th scope="col">Facilities</th>
                                 <th scope="col">Price</th>
                                 <th hidden scope="col">Qty</th>
                                 <th scope="col">Status</th>
                                 <th scope="col"></th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php if ($data['getRooms'] <= 0) : ?>
                                 <tr>
                                    <th scope="row" colspan="8" class="text-center">Room is empty</th>
                                 </tr>
                              <?php else : ?>
                                 <?php foreach ($data['getRooms'] as $row1) : ?>
                                    <tr class="align-middle">
                                       <td scope="row"><?= $i++ ?></td>
                                       <td hidden><?= $row1->room_id ?></td>
                                       <td><?= $row1->name ?></td>
                                       <td hidden><?= $row1->area ?></td>
                                       <td width="20%">
                                          <?php $feat = explode(',', $row1->features);
                                          for ($i = 0; $i < count($feat); $i++) : ?>
                                             <span class="badge text-bg-light text-wrap py-2 fw-light col-lg-4 col-12 mb-1"><?= $feat[$i] ?></span>
                                          <?php endfor; ?>
                                       </td>
                                       <td width="20%">
                                          <?php $fac = explode(',', $row1->facilities);
                                          for ($i = 0; $i < count($fac); $i++) : ?>
                                             <span class="badge text-bg-light text-wrap py-2 fw-light col-lg-4 col-12 mb-1"><?= $fac[$i] ?></span>
                                          <?php endfor; ?>
                                       </td>
                                       <td><?= $row1->price ?></td>
                                       <td hidden><?= $row1->description ?></td>
                                       <td><?= $row1->status == '1' ? "<span class='badge text-bg-success'>active</span>" : "<span class='badge text-bg-warning'>inactive</span>" ?></td>
                                       <td>
                                          <div class="dropdown open">
                                             <a class="btn btn-sm shadow-none border-0 rounded-0 btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                Action
                                             </a>
                                             <div class="dropdown-menu text-bg-light shadow border rounded-0 p-1">
                                                <form method="POST" id="form_action">
                                                   <input type="hidden" name="room_id" value="<?= $row1->room_id ?>">

                                                   <a href="<?= URLROOT ?>/admin/editrooms/<?= $row1->room_id ?>" class="dropdown-item text-bg-primary mb-1 room- btn btn-sm rounded-0" title="Edit"><i class="las la-edit"></i> Edit</a>

                                                   <?php if ($row1->status == 1) : ?>
                                                      <button type="submit" name="btn_inactive" title="Deactivate Room" class="dropdown-item text-bg-warning mb-1">
                                                         <i class="las la-times"></i>
                                                         Inactive
                                                      </button>
                                                   <?php else : ?>
                                                      <button type="submit" name="btn_active" title="Activate Room" class="dropdown-item text-bg-success mb-1">
                                                         <i class="las la-check"></i>
                                                         Active
                                                      </button>
                                                   <?php endif; ?>
                                                   <button type="submit" name="btn_delete_rooms" title="Delete" class="dropdown-item text-bg-danger mb-1">
                                                      <i class="las la-trash"></i>
                                                      Delete
                                                   </button>
                                                </form>
                                             </div>
                                          </div>
                                       </td>
                                    </tr>
                                 <?php endforeach; ?>
                              <?php endif; ?>
                           </tbody>
                        </table>
                     </div>
                  </div>

               </div>

            </div>
         </div>
      </main>

      <?php require_once APPROOT . "/views/admin/inc/footer.php"; ?>
   </div>

   <script>
      $(document).ready(function() {
         $('.room-image-s').on('click', function() {
            $('#room-image-s').modal('show');

            $tr = $(this).closest("tr");
            var data = $tr.children("td").map(function() {
               return $(this).text();
            }).get();
            // console.log(data);
            $('#room_image_id').val(data[0]);
         });
      });
   </script>

</body>

</html>