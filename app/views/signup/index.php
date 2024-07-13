<?php require_once 'app/views/templates/headerPublic.php'?>
<main role="main" class="container mx-auto" style="width: 300px;">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Sign up</h1>
            </div>
        </div>
    </div>

<div class="row mx-auto" style="width: 300px;">
    <div class="shadow col-sm-auto mx-auto border border-success rounded p-4 mb-3 mt-3" style="width: 300px;">
        <form action="/signup/verify" method="post" >
            <fieldset>
                <div class="form-group mb-2">
                    <label for="username">Username</label>
                    <input required type="text" class="form-control border-success" name="username">
                </div>
                <div class="form-group mb-2">
                    <label for="password">Password</label>
                    <input required type="password" class="form-control border-success"" name="password">
                </div>
                <div class="form-group mb-3">
                    <label for="confirm_pwd">Confirm Password</label>
                    <input required type="password" class="form-control border-success"" name="confirm_pwd">
                </div>
                <button type="submit" class="btn btn-success mb-1 mt-0" style="width: 100%;">Create Account</button>
            </fieldset>
        </form>
        <p class="text-center mb-0">Already have an account? <a href='/login'>Login</a></p>
    </div>
    <?php
    if (isset($_SESSION["acct_created"])) {
      echo '<div class="alert alert-success" role="alert">' . $_SESSION["acct_created"] . '</div>';
      unset($_SESSION["acct_created"]);
    } else if (isset($_SESSION["failed_signup"])) {
      echo '<div class="alert alert-danger" role="alert">' . $_SESSION["failed_signup"] . '</div>';
      unset($_SESSION["failed_signup"]);
    } else if (isset($_SESSION["pwds_unmatch"])) {
      echo '<div class="alert alert-danger" role="alert">' . $_SESSION["pwds_unmatch"] . '</div>';
      unset($_SESSION["pwds_unmatch"]);
    } else if (isset($_SESSION["pwd_strength"])) {
      echo '<div class="alert alert-danger" role="alert">' . $_SESSION["pwd_strength"] . '</div>';
      unset($_SESSION["pwd_strength"]);
    }
    ?>
</div>

<?php require_once 'app/views/templates/footer.php' ?>