<?php

/** @var $params array
 */

?>

<div class="overflow-scroll pt-7" style="max-height: 100vh;">

    <?php
    foreach ($params as $parm) {
        echo "
           <div class='card mb-3 ms-3 me-3'>
<form action='/processReservation' method='post'>
        <input type='hidden' name='id_services' value='$parm[id]'>
        <div class='row g-0'>
            <div class='col-md-4'>
                <img src='../assets/uploads/$parm[image_name]' class='img-fluid rounded-start' alt='...'>
            </div>
            <div class='col-md-8'>
                <div class='card-body p-2'>
                    <p class='card-title p-0 m-0'>$parm[service_name]</p>
                    <p class='card-text  p-0 m-0'>$parm[salon_name] - $parm[location]</p>
                </div>
                <div class='card-footer p-2'>
                    <div class='row'>
                    <div class='col-md-6 d-flex justify-content-center align-items-center align-content-center center'>
                     <input type='text' placeholder='Pick Date' name='reservation_time' class='form-control mb-3 mb-md-0 datetime-picker-helper' id='datetime-picker-helper-$parm[id]'/>
                     </div>
                    <div class='col-md-6 d-flex justify-content-center align-items-center'>
                      <button class='btn btn-sm btn-primary mb-0'>Reservation - $parm[price] €</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
</form>
    </div> ";
    }
    ?>
</div>
