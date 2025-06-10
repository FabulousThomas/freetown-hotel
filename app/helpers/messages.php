<?php

function alerts($type, $message)
{
   $class = ($type == "success") ? "alert-success" : "alert-danger";
   // echo <<<alert
   //    <div class="alert $class fade show float-end custom-alert" role="alert">
   //       <div class="d-flex align-items-center justify-content-between me-">
   //          <div class="me-3">$message</div>
   //          <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
   //       </div>
   //    </div>
   // alert;

   echo <<<alert
      <div class="position-fixed bottom-0 start-0 p-3" style="z-index: 2000">
         <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
               <strong class="me-auto">Message alert</strong>
               <small>Just Now</small>
               <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
               $message
            </div>
         </div>
      </div>
   alert;
}
