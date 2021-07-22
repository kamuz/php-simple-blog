<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Simple blog</title>
	<link rel="stylesheet" href="<?php echo ROOT_URL; ?>assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo ROOT_URL; ?>assets/css/bootstrap-icons.css">
	<script src="<?php echo ROOT_URL; ?>assets/js/bootstrap.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<div class="container">
		<a class="navbar-brand" href="<?php echo ROOT_URL; ?>">My Website</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarText">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li class="nav-item"><a class="nav-link <?php echo CURRENT_PAGE == 'index.php' ? 'active' : false ?>" aria-current="page" href="<?php echo ROOT_URL; ?>">Home</a></li>
				<li class="nav-item"><a class="nav-link <?php echo CURRENT_PAGE == 'contact.php' ? 'active' : false ?>" href="<?php echo ROOT_URL; ?>contact.php">Contact</a></li>
			</ul>
			<form class="d-flex">
				<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
				<button class="btn btn-success" type="submit">Search</button>
			</form>
		</div>
	</div>
</nav>