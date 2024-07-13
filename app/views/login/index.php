<?php require_once 'app/views/templates/headerPublic.php'?>
<main role="main" class="container mx-auto" style="width: 300px;">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Login</h1>
            </div>
        </div>
    </div>

<div class="row mx-auto" style="width: 300px;">
  <div class="shadow col-sm-auto mx-auto border border-success rounded p-4 mb-3 mt-3" style="width: 300px;">
		<form action="/login/verify" method="post" >
			<fieldset>
				<div class="form-group mb-2 border-success">
					<label for="username">Username</label>
					<input required type="text" class="form-control border-success"" name="username">
				</div>
				<div class="form-group mb-3 border-success">
					<label for="password">Password</label>
					<input required type="password" class="form-control border-success"" name="password" >
				</div>
			  <button type="submit" class="btn btn-success border border-white mb-1" style="width: 100%;">Login</button>
			</fieldset>
		</form>
		<p class="text-center mb-0">Don't have an account? <a href='/signup'>Sign up</a></p>
	</div>
	<?php
	if (isset($_SESSION["failed_login"])) {
		echo '<div class="alert alert-danger" role="alert">';
		echo "Fail attempt number: " . $_SESSION["failed_login"];
		echo '</div>';
	}
	?>
</div>

<?php require_once 'app/views/templates/footer.php' ?>
