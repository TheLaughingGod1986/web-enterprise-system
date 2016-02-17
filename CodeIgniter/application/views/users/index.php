<h2> <?php echo $title; ?> </h2>
<?php foreach ($UserACC as $user_item): ?>
	<h3> <?php echo $user_item['userName']; ?> </h3>
	<div class="main">
		<?php echo $user_item['pass'] ?>
	</div>
	<p><a href="<?php echo site_url('users/'.$user_item['userName']); ?>">Edit user info</a></p>

<?php endforeach; ?>