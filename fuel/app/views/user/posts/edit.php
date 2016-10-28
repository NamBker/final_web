<h2>Editing Post</h2>
<br>

<?php echo render('user/posts/_form'); ?>
<p>
	<?php echo Html::anchor('user/posts/view/'.$post->id, 'View'); ?> |
	<?php echo Html::anchor('user/posts', 'Back'); ?></p>
