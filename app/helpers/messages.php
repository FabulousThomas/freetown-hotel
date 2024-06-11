<?php

function alert($type, $message)
{
   $class = ($type == "success") ? "alert-success" : "alert-danger";
   echo <<<alert
      <div class="alert $class fade show float-end custom-alert" role="alert">
         <div class="d-flex align-items-center justify-content-between me-">
            <div class="me-3">$message</div>
            <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
      </div>
   alert;
}
