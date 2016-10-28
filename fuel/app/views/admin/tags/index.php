<h2>Listing Posts</h2>
<br>
<?php if ($posts): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>STT</th>
			<th>Slug</th>
		</tr>
	</thead>
	<tbody>
			<?php foreach ($posts as $item): ?>		
				<tr>
					<td><?php echo $item->id; ?></td>
					<td><a href="/admin/tags/search/?tags=<?php echo $item->slug ?>" title=""><?php echo $item->slug; ?></a></td>
				</tr>
			<?php endforeach; ?>	
	</tbody>
</table>

<?php else: ?>
<p>No Posts.</p>

<?php endif; ?>