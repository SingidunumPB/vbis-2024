<?php
use app\models\UserModel;

/** @var $params UserModel
 */

?>

<div class="card">
    <div class="card-body">
        <h1><?php echo $params->firstName ?> <br> <?php echo $params->lastName?> <br><?php echo $params->email?></h1>
    </div>
</div>
