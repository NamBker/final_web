<h2><?php echo $post->title ?></h2>
<strong>Tags:</strong>
	<a href="/tags/search/?tags=<?php echo $post->slug ?>" title=""><?php echo $post->slug; ?></a>&nbsp;&nbsp;<i class="glyphicon glyphicon-tag"></i></p>
<p>
    <strong>Posted: </strong> <p><?php echo date('nS F, Y', $post->created_at) ?> (<?php echo Date::time_ago($post->created_at)?>)</p>
  
 
</p>
<p><?php echo nl2br($post->body) ?></p>


<strong>Author: <?php echo $post->user_id ?></p></strong><p>

<hr />
<h3 id="comments">Comments</h3>
<?php foreach ($post->comments as $comment): ?>
	
	<div class="row khungcomment">
		<div class="avartar av1">
			<div><?php 
				if(!empty($comment->img)){
					?>
					<img src="/assets/img/<?php echo $comment->img ?>" alt=""  style="">		
					<?php
				}
				else{	
					?>
					<i class="glyphicon glyphicon-user " style="font-size:70px; color:#4786B6;"></i>
					<?php
				}
			 		?>
	 		</div>
			<?php echo Html::anchor("https://www.facebook.com/nambker",$comment->name) ?>
	    </div>
	
		<div class="avartar av2">
				<p><?php echo $comment->message?></p>
		</div>
		
		<div class="avartar av3">
			<div class="time_comment"><?php echo date('m/d/Y',$comment->created_at) ?></div>
			<div class="time_comment"><?php echo date(' H:i:s',$comment->created_at) ?></div>
		</div>
		
		<div class="av4">
			<a href="/like/add?slug=<?php echo $post->slug ?>&cmt=<?php echo $comment->id ?>" title=""><i class="glyphicon glyphicon-thumbs-up like"></i></a>
			<a href="" title=""><i class="glyphicon glyphicon-share-alt share"></i></a>
			<div><?php echo $comment->numberlike ?></div>
		</div>
	</div>
	<!-- END khungcomment -->
<?php endforeach; ?>
<br>
<div class="row">
	<!-- <div class="col-md-2"></div> -->
	<div class="col-md-8">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-10"><h3>Write a comment</h3>
			</div>

			</div>


			<?php echo Form::open('blog/comment/'.$post->slug) ?>	
		    <div class="input">
		    	<div class="row">
		    		<div class="col-md-3">
		    			<label for="name">Name:</label>	
		    		</div>
		    		<div class="col-md-9">
		    			<?php echo Form::input('name'); ?>
		    		</div>	
		    	</div>
	    	</div>	
		
		    <br>   
		    <div class="input">
		    	<div class="row">
		    		<div class="col-md-3">
		    			<label for="email">Email:</label>	
		    		</div>
	    			<div class="col-md-9">
	    				<?php echo Form::input('email'); ?>
	    			</div>	
	    		</div>
    		</div>		 		 
		    <br>   
		    <div class="input">
		    	<div class="row">
		    		<div class="col-md-3">
		    			<label for="message">Comment:</label>	
		    		</div>
		    		<div class="col-md-9">
		    			<?php echo Form::textarea('message'); ?>
		    		</div>	
		    	</div>
    		</div>
		  	<br>
		    <div class="input"><?php echo Form::submit('submit','  Gửi  '); ?></div>
		</div>
</div>
	<?php echo Html::anchor('/blog/', 'Back'); ?>
 
<?php echo Form::close() ?>