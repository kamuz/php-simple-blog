<?php

require_once 'config/db.php';
require_once 'config/config.php';

if ( isset( $_POST['delete_id'] ) ) {
	// Get form data.
	$delete_id = mysqli_real_escape_string( $conn, $_POST['delete_id'] );
	$query = "DELETE FROM posts WHERE id = $delete_id";

	if (mysqli_query( $conn, $query )) {
		header('Location: ' . ROOT_URL );
	} else {
		echo 'ERROR: ' . mysql_error( $conn );
	}
}

// Get ID
$id = mysqli_real_escape_string($conn, $_GET['id']);

// Create Query
$query = "SELECT * FROM posts WHERE id = $id";

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
			<h1 class="bd-title mt-4"><?php echo $post['title']; ?></h1>
			<p class="card-text"><small class="text-muted">Created at <?php echo $post['created_at']; ?> by <?php echo $post['author']; ?></small></p>
			<p class="card-text"><?php echo $post['body']; ?></p>
			<hr>
			<a class="btn btn-success" href="<?php echo ROOT_URL ?>editpost.php?id=<?php echo $post['id'] ?>"><i class="bi bi-pencil-square"></i> Edit Post</a>
			<form class="float-end" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<input type="hidden" name="delete_id" value="<?php echo $post['id']; ?>">
				<button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"></i> Delete Post</button>
			</form>
		</div>
	</div>
</div>

<?php require_once 'partials/footer.php'; ?>