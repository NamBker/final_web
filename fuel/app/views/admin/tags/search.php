<h2>List Posts</h2>
<br>
<?php if ($posts):
foreach ($posts as $item) {
?>
  <div class="blog-post">
    <div>
			<h2><?php echo $item->title;?></h2><a href="/admin/tags/search/?tags=<?php echo $item->slug; ?>""><p><?php echo $item->slug;?></p></a>
		</div>
    <p class="blog-post-meta"><?php echo date('nS F, Y', $item->created_at) ?></p>
    <p><?php echo Str::truncate($item->body,300); ?></p>
    <a class="btn btn-default" href="/admin/posts/view/<?php echo $item->id ?>">View</a>
  </div>
<?php 
}
else: 
?>
<p>No Posts.</p>
<?php endif; ?><p>
</p>


