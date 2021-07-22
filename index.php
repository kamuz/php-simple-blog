<?php

require_once 'config/db.php';
require_once 'config/config.php';

// Create Query.
$query = 'SELECT * FROM posts ORDER BY created_at DESC';

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
			<a class="btn btn-primary mb-3 float-end" href="<?php echo ROOT_URL; ?>addpost.php"><i class="bi bi-pencil-square"></i> Add New Post</a>
			<p class="bd-lead">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
			<div style="clear: both;"></div>
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
