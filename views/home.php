<div class="card" style="max-height: 100vh;">
<div class="card-body p-2 overflow-scroll">
    <?php
    foreach ($params as $parm) {
        echo "
<div class='row'>
<div class='col-md-6'>
 <div class='card mb-3 ms-3 me-3'>
        <div class='row g-0'>
            <div class='col-md-4'>
                <img src='$parm[image_name]' class='img-fluid rounded-start' alt='...'>
            </div>
            <div class='col-md-8'>
                <div class='card-body p-2'>
                    <p class='card-title p-0 m-0'>$parm[service_name]</p>
                    <p class='card-text  p-0 m-0'>$parm[salon_name] - $parm[location]</p>
                </div>
                <div class='card-footer p-2'>
                    <div class='row'>
                    <div class='col-md-6 d-flex justify-content-center align-items-center align-content-center center'>
                    <span>$parm[reservation_time]</span>
                     </div>
                    <div class='col-md-6 d-flex justify-content-center align-items-center'>
                      <button class='btn btn-sm btn-primary mb-0'>Reservation</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>
</div>
          ";
    }
    ?>
</div>

</div>