<?php
use app\models\UserModel;

/** @var $params UserModel
 */

?>

<div class="card">
    <div class="card-body">
        <h1><?php echo $params->first_name ?? "NOT FOUND" ?> <br> <?php echo $params->last_name  ?? "NOT FOUND" ?> <br><?php echo $params->email  ?? "NOT FOUND" ?></h1>
    </div>
</div>
