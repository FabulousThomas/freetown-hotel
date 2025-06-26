<?php require_once APPROOT."/views/admin/inc/head.php"; ?>
<title><?= SITENAME ?> | Features & Facilities</title>

<body>
   <?php require APPROOT."/views/admin/inc/sidebar.php"; ?>

   <div class="main-content">
      <?php require APPROOT."/views/admin/inc/header.php"; ?>

      <main class="mt-">
         <div class="">
            <div class="col-lg-12">

               <div class="d-flex align-items-center justify-content-between">
                  <h4 class="">Features & Facilities</h4>
                  <?php flash_msg('success') ?>
               </div>

               <!-- FACILITIES -->
               <div class="card shadow-sm border-0 mb-3 ">
                  <div class="card-header py-1">
                     <h5 class="mb-0">Facilities</h5>
                     <button class="btn-sm border-0 shadow-none d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#facilities-s"><i class="las la-plus fs-6"></i> Add Facilities</button>
                  </div>

                  <div class="card-body">
                     <table class="table table-hover text-middle">
                        <?php $i = 1; ?>
                        <thead>
                           <tr>
                              <th scope="col">#</th>
                              <th scope="col">Name</th>
                              <th scope="col">Icons</th>
                              <th scope="col">Details</th>
                              <th scope="col"></th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php if ($data['getFacilities'] < 1) : ?>
                              <tr>
                                 <th scope="row" colspan="4" class="text-center">Facility is empty</th>
                              </tr>
                           <?php else : ?>
                              <?php foreach ($data['getFacilities'] as $row1) : ?>
                                 <tr>
                                    <th scope="row"><?= $i++ ?></th>
                                    <td hidden><?= $row1->id ?></td>
                                    <td><?= $row1->name ?></td>
                                    <td><img src="<?= URLROOT ?>/assets/images/facilities/<?= $row1->icon ?>" alt=""></td>
                                    <td width="50%"><?= $row1->description ?></td>
                                    <td>

                                       <div class="dropdown open">
                                          <a class="btn btn-sm shadow-none border btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                             Action
                                          </a>
                                          <div class="dropdown-menu text-bg-light shadow-sm border">
                                             <form method="POST">
                                                <input type="hidden" name="facility_id" value="<?= $row1->id ?>">
                                                <button type="submit" name="btn_delete_facilities" title="Delete" class="dropdown-item text-bg-danger"><i class="las la-trash"></i> Delete</button>
                                                <!-- <button class="dropdown-item text-bg-success mt-1" title="Edit" href="#"><i class="las la-edit"></i> Edit</button> -->
                                             </form>
                                          </div>
                                       </div>

                                    </td>
                                 </tr>
                              <?php endforeach; ?>
                           <?php endif; ?>

                     </table>
                  </div>

               </div>

               <!-- FEATURES -->
               <div class="card shadow-sm border-0 mb-3 ">
                  <div class="card-header py-1">
                     <h5 class="mb-0">Features</h5>
                     <button class="btn-sm border-0 shadow-none d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#features-s"><i class="las la-plus fs-6"></i> Add Feature</button>
                  </div>

                  <div class="card-body">
                     <table class="table table-hover">
                        <?php $i = 1; ?>
                        <thead>
                           <tr>
                              <th scope="col">#</th>
                              <th scope="col">Name</th>
                              <th scope="col"></th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php if ($data['getFeatures'] < 1) : ?>
                              <tr>
                                 <th scope="row" colspan="4" class="text-center">Feature is empty</th>
                              </tr>
                           <?php else : ?>
                              <?php foreach ($data['getFeatures'] as $row1) : ?>
                                 <tr>
                                    <th scope="row"><?= $i++ ?></th>
                                    <td><?= $row1->name ?></td>
                                    <td>

                                       <div class="dropdown open">
                                          <a class="btn btn-sm shadow-none border btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                             Action
                                          </a>
                                          <div class="dropdown-menu text-bg-light shadow-sm border">
                                             <form method="POST">
                                                <input type="hidden" name="feature_id" value="<?= $row1->id ?>">
                                                <button type="submit" name="btn_delete_features" title="Delete" class="dropdown-item text-bg-danger"><i class="las la-trash"></i> Delete</button>
                                             </form>
                                             <!-- <button class="dropdown-item text-bg-success mt-1" title="Edit" href="#"><i class="las la-edit"></i> Edit</button> -->
                                          </div>
                                       </div>

                                    </td>
                                 </tr>
                              <?php endforeach; ?>
                           <?php endif; ?>

                     </table>
                  </div>

               </div>

            </div>
         </div>
      </main>

      <?php require_once APPROOT."/views/admin/inc/footer.php"; ?>
   </div>

</body>

</html>