<input type="checkbox" name="" id="nav-toggle">
<div class="sidebar" id="nav-bar">
   <div class="sidebar-brand">
      <h2></span> <span>FreeTown&dash;H</span></h2>
   </div>
   <div class="sidebar-menu">
      <ul>
         <li>
            <a href='<?= URLROOT ?>/admin/index'><span class="las la-igloo"></span>
               <span>Dashboard</span></a>
         </li>
         <li>
            <a href="<?= URLROOT ?>/admin/rooms"><span class="las la-hotel"></span>
               <span>Rooms</span></a>
         </li>
         <li>
            <a href="<?= URLROOT ?>/admin/shortlet"><span class="las la-home"></span>
               <span>Short-let Rooms</span></a>
         </li>
         <?php if (isset($_SESSION['admin_access']) && $_SESSION['admin_access'] == '1') : ?>
            <li>
               <a href="<?= URLROOT ?>/admin/transactions"><span class="las la-receipt"></span>
                  <span>Transactions</span></a>
            </li>
         <?php endif; ?>
         <li>
            <a href="<?= URLROOT ?>/admin/userquery"><span class="las la-users"></span>
               <span>User Query</span></a>
         </li>
         <li>
            <a href="<?= URLROOT ?>/admin/featuresfacilities"><span class="las la-clipboard"></span>
               <span>Features & Facilities</span></a>
         </li>
         <?php if (isset($_SESSION['admin_access']) && $_SESSION['admin_access'] == '1') : ?>
            <li>
               <a href="<?= URLROOT ?>/admin/session"><span class="las la-user"></span>
                  <span>Login Sessions</span></a>
            </li>
         <?php endif; ?>
         <li>
            <a href="<?= URLROOT ?>/admin/settings"><span class="las la-cog"></span>
               <span>Settings</span></a>
         </li>
      </ul>
   </div>
</div>