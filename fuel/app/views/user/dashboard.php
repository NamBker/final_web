
<div class="row">
  <div class="col-sm-8 blog-main">
<?php if ($posts):
foreach ($posts as $item) { 
  ?>
    <div class="blog-post">
      <h2 class="blog-post-title"><?php echo $item->title ?></h2>
      <p class="blog-post-meta"><?php echo date('nS F, Y', $item->created_at) ?></p>

      <p><?php echo Str::truncate($item->body,300); ?></p>
      <a class="btn btn-default" href="/user/posts/view/<?php echo $item->id ?>">View</a>   
    </div><!-- /.blog-post -->
<?php }
else: 
?>
<p>No Posts.</p>
<?php endif; ?><p>
</p>
</div> 
  <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
    <div class="sidebar-module sidebar-module-inset">
      <h4>Lời hay ý đẹp</h4>
      <br>
      <p>Không có hiểu biết sẽ khiến bạn trở thành một thứ công cụ cho kẻ khác lợi dụng</p>
      <p>Không có hiểu biết sẽ khiến bạn trở thành một thứ công cụ cho kẻ khác lợi dụng</p>
    </div>
    <br>
    
    <div class="sidebar-module">
      <h4>Tag</h4>
      <br>
      <ol class="list-unstyled">
      <?php foreach ($posts as $key){?>
       <li><a href="/user/tags/search/?tags=<?php echo $key->slug ?>"><?php echo $key->slug; }?></a></li>
      </ol>
    </div>
  
  </div><!-- /.blog-sidebar -->