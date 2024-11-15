<?php

use app\models\LoginModel;

/** @var $params LoginModel
 */

?>

<div class="card card-plain">
    <div class="card-header pb-0 text-start">
        <h4 class="font-weight-bolder">Sign In</h4>
        <p class="mb-0">Enter your email and password to sign In</p>
    </div>
    <div class="card-body">
        <form role="form" method="post" action="/processLogin">
            <div class="mb-3">
                <input type="email" name="email" class="form-control form-control-lg" placeholder="Email" aria-label="Email" value="<?php echo $params->email ?>">
                <?php
                if ($params != null && $params->errors != null) {
                    foreach ($params->errors as $attribute => $error) {
                        if ($attribute == 'email') {
                            echo "<span class='text-danger'>$error[0]</span>";
                        }
                    }
                }
                ?>
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" value="<?php echo $params->password ?>">
                <?php
                if ($params != null && $params->errors != null) {
                    foreach ($params->errors as $attribute => $error) {
                        if ($attribute == 'password') {
                            echo "<span class='text-danger'>$error[0]</span>";
                        }
                    }
                }
                ?>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Sign In</button>
            </div>
        </form>
    </div>
    <div class="card-footer text-center pt-0 px-lg-2 px-1">
        <p class="mb-4 text-sm mx-auto">
            Don't have an account?
            <a href="/registration" class="text-primary text-gradient font-weight-bold">Sign Up</a>
        </p>
    </div>
</div>