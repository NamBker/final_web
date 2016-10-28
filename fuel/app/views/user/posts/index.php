<h2>Listing Posts</h2>
<br>
<?php if ($posts): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Title</th>
			<th>Tags</th>
			<th>Summary</th>
			<th>Body</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($posts as $item): ?>		<tr>

			<td><?php echo $item->title; ?></td>
			<td><?php echo $item->slug; ?></td>
			<td style="width:200px;"><?php echo $item->summary; ?></td>
			<td style="width:400px;"><?php echo Str::truncate($item->body,200); ?></td>
			<td>
				<?php echo Html::anchor('user/posts/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('user/posts/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('user/posts/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Posts.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('user/posts/create', 'Add new Post', array('class' => 'btn btn-success')); ?>

</p>
