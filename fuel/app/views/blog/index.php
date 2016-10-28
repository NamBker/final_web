

  <div class="row">

        <div class="col-sm-8 blog-main">
        		<h2>List Posts</h2>
					<br>
				<?php if ($posts):
					foreach ($posts as $item) {
					?>
			          <div class="blog-post">
			            <div>
			 				<h2><?php echo $item->title;?></h2><a href="/tags/search/?tags=<?php echo $item->slug; ?>""><p><?php echo $item->slug;?></p></a>
			 				</div>
			            <p class="blog-post-meta"><?php echo date('nS F, Y', $item->created_at) ?></p>
			            <p><?php echo Str::truncate($item->body,300); ?></p>
			            <a class="btn btn-default" href="/blog/view/<?php echo $item->slug ?>">View</a>
			          </div><!-- /.blog-post -->
			<?php }
			else: 
			?>
			<p>No Posts.</p>
			<?php endif; ?>
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
		       	
	      </ol>
          </div> 
        </div><!-- /.blog-sidebar -->
      </div><!-- /.row -->
<input type="range"  value="50" onclick="myFunction()">

<div class="ui labeled button" tabindex="0">
  <div class="ui red button"><i class="heart icon"></i> Like </div>
  <a class="ui basic red left pointing label">
    1,048
  </a>
</div>
<div class="ui labeled button" tabindex="0">
  <div class="ui basic blue button"><i class="fork icon"></i> Forks </div>
  <a class="ui basic left pointing blue label">
    1,048
  </a>
</div>
