<?php

require_once 'config/db.php';
require_once 'config/config.php';

// Get ID
$id = mysqli_real_escape_string($conn, $_GET['id']);

// Create Query
$query = 'SELECT * FROM posts WHERE id = ' . $id;

// Get Result
$result = mysqli_query($conn, $query);

// Fetch Data
$post = mysqli_fetch_assoc($result);

// Free Result/Memory
mysqli_free_result($result);

// Close Connection
mysqli_close($conn);

?>

<?php require_once 'partials/header.php'; ?>

<div class="container pt-md-1 pb-md-4 mt-3">
	<div class="row">
		<div class="col-xl-12">
			<a class="btn btn-light" href="<?php echo ROOT_URL; ?>"><i class="bi-skip-backward-fill"></i> Go Back</a>
			<h1 class="bd-title mt-0"><?php echo $post['title']; ?></h1>
			<p class="card-text"><small class="text-muted">Created at <?php echo $post['created_at']; ?> by <?php echo $post['author']; ?></small></p>
			<p class="card-text"><?php echo $post['body']; ?></p>
		</div>
	</div>
</div>

<?php require_once 'partials/footer.php'; ?>