<?php

use app\models\UserModel;

/** @var $params UserModel
 */

?>

<div class="card">
    <form action="/processUpdateProduct" method="post">
        <input type="hidden" name="id" value="<?php echo $params->id ?>">
        <div class="card-header pb-0">
            <div class="d-flex align-items-center">
                <p class="mb-0">Edit Profile</p>
                <button class="btn btn-primary btn-sm ms-auto" type="submit">Save</button>
            </div>
        </div>
        <div class="card-body">
            <p class="text-uppercase text-sm">User Information</p>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Name</label>
                        <input class="form-control" type="text" name="name" value="<?php echo $params->name ?>"
                               onfocus="focused(this)" onfocusout="defocused(this)">
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Description</label>
                        <input class="form-control" type="text" name="description" value="<?php echo $params->description ?>"
                               onfocus="focused(this)" onfocusout="defocused(this)">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>