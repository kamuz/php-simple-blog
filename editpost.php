<?php

require_once 'config/db.php';
require_once 'config/config.php';

if ( isset( $_POST['submit'] ) ) {
	// Get form data.
	$update_id = mysqli_real_escape_string( $conn, $_POST['update_id'] );
	$title = mysqli_real_escape_string( $conn, $_POST['title'] );
	$author = mysqli_real_escape_string( $conn, $_POST['author'] );
	$body = mysqli_real_escape_string( $conn, $_POST['body'] );

	$query = "UPDATE posts SET title = '$title', author = '$author', body = '$body' WHERE id = $update_id";
	// die($query);

	if (mysqli_query( $conn, $query )) {
		header('Location: ' . ROOT_URL );
	} else {
		echo 'ERROR: ' . mysql_error( $conn );
	}
}

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
			<h1 class="bd-title mt-0">Add Post</h1>
			<p class="bd-lead">Quickly get a project started with any of our examples ranging from using parts of the framework to custom components and layouts.</p>
			<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<div class="mb-3">
					<label for="title" class="form-label">Title</label>
					<input type="text" class="form-control" id="title" name="title" value="<?php echo $post['title']; ?>">
				</div>
				<div class="mb-3">
					<label for="author" class="form-label">Author</label>
					<input type="text" class="form-control" id="author" name="author" value="<?php echo $post['author']; ?>">
				</div>
				<div class="mb-3">
					<label for="body" class="form-label">Body</label>
					<textarea class="form-control" id="body" name="body"><?php echo $post['body']; ?></textarea>
				</div>
				<input type="hidden" name="update_id" value="<?php echo $post['id']; ?>">
				<input type="submit" name="submit" class="btn btn-primary" value="Submit">
			</form>
		</div>
	</div>
</div>

<?php require_once 'partials/footer.php'; ?>
