<?php require_once APPROOT . "/views/admin/inc/head.php"; ?>
<title><?= SITENAME ?> | Settings</title>

<?php

// if (filter_has_var(INPUT_POST, 'shutdown_toggle')) {
//    // filter_has_var(INPUT_POST,'checkbox_name'
//    $frm_data = filteration($_POST);

//    $shutdown = $frm_data['shutdown_toggle'] == 1 ? 0 : 1;

//    $q = "UPDATE `settings` SET `shutdown`=? WHERE `id`=?";
//    $values = array($shutdown, 1);

//    $res = update($q, $values, 'ii');

//    if ($res && $shutdown == 1) {
//       flash_msg('success', 'Website shutdown! Turned On');
//       // redirect('admin/settings.php');
//    } elseif ($res && $shutdown == 0) {
//       flash_msg('success', 'Website shutdown! Turned Off');
//       // redirect('admin/settings.php');
//    }
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
                  <h4 class="">Settings</h4>
                  <?php flash_msg('message') ?>
               </div>
               <?php foreach ($data['getSettings'] as $row) : ?>
                  <div class="card shadow-sm border-0 mb-3">
                     <div class="card-header py-1">
                        <h5 class="mb-0">General Settings</h5>
                        <button class="btn-sm border-0 shadow-none" data-bs-toggle="modal" data-bs-target="#general-s">Edit</button>
                     </div>
                     <div class="card-body">
                        <h6 class="">Site Title</h6>
                        <p id="site_title"><?= $row->site_title ?></p>
                        <h6 class="">About Us</h6>
                        <p id="site_about"><?= $row->site_about ?></p>
                     </div>
                  </div>

                  <div class="card shadow-sm border-0 mb-3 d-none">
                     <div class="card-header py-1">
                        <h5 class="mb-0">Contact Settings</h5>
                        <button class="btn-sm border-0 shadow-none" data-bs-toggle="modal" data-bs-target="#contact-s">Edit</button>
                     </div>
                     <div class="card-body">
                        <h6 class="">Site Title</h6>
                        <p id="site_title"><?= $row->site_title ?></p>
                        <h6 class="">About Us</h6>
                        <p id="site_about"><?= $row->site_about ?></p>
                     </div>
                  </div>

                  <div class="card shadow-sm border-0 mb-3 d-none">
                     <div class="card-header py-1">
                        <h5 class="mb-0">Shutdown Website</h5>
                        <form method="POST">
                           <div class="form-check form-switch">
                              <input class="form-check-input shadow-none border" type="checkbox" role="switch" name="shutdown_toggle" <?= $row->shutdown == '1' ? 'checked' : '' ?> value="<?= $row->shutdown ?>">
                           </div>
                        </form>
                     </div>
                     <div class="card-body">
                        <h6 class="">Site Title</h6>
                        <p id="site_title">FreeTown Hotel & Suites is under maintenace, please be patient. We apologize for any incovenieces this may cause. Thank you</p>
                     </div>
                  </div>
               <?php endforeach; ?>

               <!-- TEAM MANAGEMENT -->
               <div class="card shadow-sm border-0 mb-3 ">
                  <div class="card-header py-1">
                     <h5 class="mb-0">Team Management</h5>
                     <button class="btn-sm border-0 shadow-none d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#team-s"><i class="las la-plus fs-6"></i> Add Team</button>
                  </div>

                  <div class="card-body table-responsive-md" style="height: 300px; overflow-y: scroll;">
                     <table class="table table-hover text-center sticky-top">
                        <?php $res = selectAll('team', 'id');
                        $i = 1; ?>
                        <thead>
                           <tr class="">
                              <th scope="col">#</th>
                              <th scope="col">Name</th>
                              <th scope="col">Picture</th>
                              <th scope="col"></th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php if (mysqli_num_rows($res) < 1) : ?>
                              <tr>
                                 <th scope="row" colspan="4" class="text-center">Team Member is empty</th>
                              </tr>
                           <?php else : ?>
                              <?php while ($row1 = $res->fetch_assoc()) : ?>
                                 <tr>
                                    <th scope="row"><?= $i++ ?></th>
                                    <td><?= $row1['team_name'] ?></td>
                                    <td><img src="<?= URLROOT ?>/assets/images/team/<?= $row1['team_picture'] ?>" alt=""></td>
                                    <td>

                                       <div class="dropdown open">
                                          <a class="btn btn-sm shadow-none border btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                             Action
                                          </a>
                                          <div class="dropdown-menu text-bg-light shadow-sm border">
                                             <form method="POST">
                                                <input type="hidden" name="team_id" value="<?= $row1['id'] ?>">
                                                <button type="submit" name="btn_delete_team" title="Delete" class="dropdown-item text-bg-danger"><i class="las la-trash"></i> Delete</button>
                                             </form>
                                             <!-- <button class="dropdown-item text-bg-success mt-1" title="Edit" href="#"><i class="las la-edit"></i> Edit</button> -->
                                          </div>
                                       </div>

                                    </td>
                                 </tr>
                              <?php endwhile; ?>
                           <?php endif; ?>

                     </table>
                  </div>

               </div>

               <!-- IMAGE SLIDER -->
               <div class="card shadow-sm border-0 mb-3 ">
                  <div class="card-header py-1">
                     <h5 class="mb-0">Image Slider</h5>
                     <button class="btn-sm border-0 shadow-none d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#slider-s"><i class="las la-plus fs-6"></i> Add Slider</button>
                  </div>

                  <div class="card-body table-responsive-md" style="height: 300px; overflow-y: scroll;">
                     <table class="table table-hover text-center sticky-top">
                        <?php $res = selectAll('slider', 'id');
                        $i = 1; ?>
                        <thead>
                           <tr class="">
                              <th scope="col">#</th>
                              <th scope="col">Picture</th>
                              <th scope="col"></th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php if (mysqli_num_rows($res) < 1) : ?>
                              <tr>
                                 <th scope="row" colspan="4" class="text-center">Slider Image is empty</th>
                              </tr>
                           <?php else : ?>
                              <?php while ($row1 = $res->fetch_assoc()) : ?>
                                 <tr>
                                    <th scope="row"><?= $i++ ?></th>
                                    <td><img src="<?= URLROOT ?>/assets/images/carousel/<?= $row1['slider_picture'] ?>" alt=""></td>
                                    <td>

                                       <div class="dropdown open">
                                          <a class="btn btn-sm shadow-none border btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                             Action
                                          </a>
                                          <div class="dropdown-menu text-bg-light shadow-sm border">
                                             <form method="POST">
                                                <input type="hidden" name="slider_id" value="<?= $row1['id'] ?>">
                                                <button type="submit" name="btn_delete_slider" title="Delete" class="dropdown-item text-bg-danger"><i class="las la-trash"></i> Delete</button>
                                             </form>
                                             <!-- <button class="dropdown-item text-bg-success mt-1" title="Edit" href="#"><i class="las la-edit"></i> Edit</button> -->
                                          </div>
                                       </div>

                                    </td>
                                 </tr>
                              <?php endwhile; ?>
                           <?php endif; ?>

                     </table>
                  </div>

               </div>

            </div>
         </div>
      </main>

      <?php require_once APPROOT . "/views/admin/inc/footer.php"; ?>
   </div>

   <!-- <script>
      let general_data;

      function get_general() {
         let site_title = document.getElementById("site_title");
         let site_about = document.getElementById("site_about");
         let site_title_inp = document.getElementById("site_title_inp");
         let site_about_inp = document.getElementById("site_about_inp");

         let xhr = new XMLHttpRequest();
         xhr.open("POST", "./ajax/settings.php", true);
         xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

         xhr.onload = function() {
            // general_data = this.responseText;
            // console.log(general_data);
            general_data = JSON.parse(this.responseText);

            site_title.innerText = general_data.site_title;
            site_about.innerText = general_data.site_about;
            site_title.innerText = general_data.site_title;
            site_about.innerText = general_data.site_about;
         }

         xhr.send('get_general');
      }

      window.onload = function() {
         get_general();
      }
   </script> -->



</body>

</html>