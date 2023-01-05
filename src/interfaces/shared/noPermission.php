<?php
session_start();
include('../../data/conn.php');
$title = 'No Permission';
include('../../middleware/session.php');
include('head.php');
include('sidebar.php');
?>

<div class="container mt-5">
	<h1>No permission</h1>
	<hr>
	<p>You do not have access to that page!</p>
</div>


<!-- parte de sidebar -->
</main>
<?php
include('scripts.php');
?>