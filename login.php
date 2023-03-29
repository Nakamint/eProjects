<?php
	require_once("inc/header.php");
	require_once("inc/navbar.php");

	if (isset($_SESSION['id'])) {
		redirect("index.php");
	}
?>
<div class="container">
	<div class="row">
		<div class="col-sm-12 col-md-12 padding-10">
			<div class="thumbnail padding-10 box-sizing" style="max-width: 500px; margin: 0 auto;">
				<h1 class="text-bs-primary custom-acount text-center text-upper">Login</h1>
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="l-form">
					<div class="form-group">
						<label class="text-bs-primary custom-acc" for="l-email">Email</label>
						<input type="text" class="form-control custom-form" id="l-email" name="l-email" placeholder="Enter Your Email.">
					</div>
					<div class="form-group">
						<label class="text-bs-primary custom-acc" for="l-password">Password</label>
						<input type="password" class="form-control" id="l-password" name="l-password" placeholder="Enter Your Password.">	
					</div>
					<input type="submit" value="Login" id="l-login" name="l-login" class="btn btn-primary btn-acc">
					<span id="l-message" class="text-bold text-20 float-right"></span>
				</form>
			</div>
		</div>


	</div>
	<?php require_once("inc/footer-nav.php"); ?>
</div>

<?php
	require_once("inc/footer.php");
?>