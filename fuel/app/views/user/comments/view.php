<h2>Viewing #<?php echo $comment->id; ?></h2>

<p>
	<strong>Name:</strong>
	<?php echo $comment->name; ?></p>
<p>
	<strong>Email:</strong>
	<?php echo $comment->email; ?></p>
<p>
	<strong>Message:</strong>
	<?php echo $comment->message; ?></p>
<p>
	<strong>Post id:</strong>
	<?php echo $comment->post_id; ?></p>
	<?php $comment->numberlike = 0; ?>

<?php echo Html::anchor('user/comments/edit/'.$comment->id, 'Edit'); ?>
<?php echo Html::anchor('user/comments', 'Back'); ?>	