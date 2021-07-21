<?php

require_once 'config/db.php';
require_once 'config/config.php';

// Create Query.
$query = 'SELECT * FROM posts';

// Get Result.
$result = mysqli_query( $conn, $query );

// Fetch Data.
$posts = mysqli_fetch_all( $result, MYSQLI_ASSOC );

// Free Result/Memory.
mysqli_free_result( $result );

// Close Connection.
mysqli_close( $conn );

?>

<?php require_once 'partials/header.php'; ?>

<div class="container pt-md-1 pb-md-4 mt-3">
	<div class="row">
		<div class="col-xl-12">
			<h1 class="bd-title mt-0">Blog posts</h1>
			<p class="bd-lead">Quickly get a project started with any of our examples ranging from using parts of the framework to custom components and layouts.</p>
			<?php foreach ( $posts as $post ) : ?>
				<div class="card mb-3">
					<div class="card-body">
						<h5 class="card-title"><?php echo $post['title']; ?></h5>
						<p class="card-text"><small class="text-muted">Created at <?php echo $post['created_at']; ?> by <?php echo $post['author']; ?></small></p>
						<p class="card-text"><?php echo $post['body']; ?></p>
						<a href="post.php?id=<?php echo $post['id']; ?>" class="btn btn-secondary">Read more...</a>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>

<?php require_once 'partials/footer.php'; ?>
