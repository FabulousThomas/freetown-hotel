<?php require_once APPROOT . "/views/admin/inc/head.php"; ?>
<title><?= SITENAME ?> | User Query</title>

<body>
   <?php require APPROOT . "/views/admin/inc/sidebar.php"; ?>

   <div class="main-content">
      <?php require APPROOT . "/views/admin/inc/header.php"; ?>

      <main class="mt-">
         <div class="">
            <div class="col-lg-12">

               <div class="d-flex align-items-center justify-content-between">
                  <h4 class="text-uppercase">Users Query</h4>
                  <?php flash_msg('success') ?>
               </div>

               <div class="card shadow-sm border-0 mb-3 ">
                  <form method="POST">
                     <div class="card-header float-end w-100">
                        <div>
                           <input type="text" class="form-control border shadow-none" id="myInput" placeholder="Search for...">
                        </div>
                        <div>
                           <button type="submit" name="btn_seen_all" class="btn-sm shadow-none "><i class="las la-check-double"></i> Mark all as read</button>
                           <button type="submit" name="btn_delete_all" class="btn-sm shadow-none btn-danger"><i class="las la-trash"></i> Delete all</button>
                        </div>
                     </div>
                  </form>
                  <div class="card-body">
                     <div class="table-responsive-md" style="height: 450px; overflow-y: scroll;">
                        <table class="table table-hover" id="myTable">
                           <?php $i = 1; ?>
                           <thead class="sticky-top">
                              <tr class="">
                                 <th scope="col">#</th>
                                 <th scope="col">Name</th>
                                 <th scope="col">Email</th>
                                 <th scope="col" width="20%">Subject</th>
                                 <th scope="col" width="30%">Message</th>
                                 <th scope="col">Date</th>
                                 <th scope="col"></th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php if (!$data['getAll']) : ?>
                                 <tr>
                                    <th scope="row" colspan="8" class="text-center">Users Query is empty</th>
                                 </tr>
                              <?php else : ?>
                                 <?php foreach ($data['getAll'] as $row1) : ?>
                                    <tr>
                                       <th scope="row"><?= $i++ ?></th>
                                       <td><?= $row1->name ?></td>
                                       <td><?= $row1->email ?></td>
                                       <td><?= $row1->subject ?></td>
                                       <td><?= $row1->message ?></td>
                                       <td><?= $row1->date ?></td>
                                       <td>

                                          <div class="dropdown open">
                                             <a class="btn btn-sm shadow-none border btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                Action
                                             </a>
                                             <div class="dropdown-menu text-bg-light shadow-sm border">
                                                <form method="POST" id="form_action">
                                                   <input type="hidden" name="user_query_id" value="<?= $row1->id ?>">
                                                   <?php if ($row1->seen != 1) : ?>
                                                      <button type="submit" name="btn_seen_user_query" title="Mark" class="dropdown-item text-bg-primary"><i class="las la-check"></i> Mark as read</button>
                                                   <?php endif; ?>
                                                   <button type="submit" name="btn_delete_user_query" title="Delete" class="dropdown-item text-bg-danger"><i class="las la-trash"></i> Delete</button>
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
         </div>
      </main>

      <?php require_once APPROOT . "/views/admin/inc/footer.php"; ?>
   </div>

</body>

</html>