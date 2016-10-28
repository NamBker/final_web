<h2>Editing Comment</h2>
<br>

<?php echo render('user/comments/_form'); ?>
<p>
	<?php echo Html::anchor('user/comments/view/'.$comment->id, 'View'); ?> |
	<?php echo Html::anchor('user/comments', 'Back'); ?></p>
