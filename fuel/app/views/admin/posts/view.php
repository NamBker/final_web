<h2>Viewing #<?php echo $post->id; ?></h2>

<p>
	<strong>Title:</strong>
	<?php echo $post->title; ?></p>
<p>
	<strong>Summary:</strong>
	<?php echo $post->summary; ?></p>
<p>
	<strong>Body:</strong>
	<?php echo nl2br($post->body); ?></p>
<p>
	<strong>User:</strong>
	<?php echo $post->user_id; ?></p>

<p>
	<strong>Tags:</strong>
	<a href="/admin/tags/search/?tags=<?php echo $post->slug ?>" title=""><?php echo $post->slug; ?></a>&nbsp;&nbsp;<i class="glyphicon glyphicon-tag"></i></p>

<h3 id="comments">Comments</h3>

<div class="row">
	<?php foreach ($post->comments as $comment): ?>
	<div class="row khungcomment">
		<div class="avartar av1">
			<div>
					<img src="/assets/img/<?php echo $comment->img ?>" alt=""  style="">
			</div>
			<div style="weight:100px">
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
			<a href="#" title=""><i class="glyphicon glyphicon-thumbs-up like"></i></a>
			<a href="" title=""><i class="glyphicon glyphicon-share-alt share"></i></a>
			<div><?php echo $comment->numberlike ?></div>
		</div>
	</div>
	<?php endforeach; ?>
</div>
<br>

<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-6">	
		<div class="row">
			<div class="col-md-2"><img src="/assets/img/<?php echo $current_user->img ?>" alt=""  style="font-size:20px; color:#4786B6; padding-top:10px; width:50px;padding-top: 5px;padding-bottom:5px">
</div>
			<div class="col-md-10"><p>You write a comment</p>
		</div>
		</div>
		<?php echo Form::open('admin/posts/view/'.$post->id) ?>	
	    <br>   
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
	    <div class="input"><?php echo Form::submit('submit','Gửi',array('class'=> 'btn btn-primary')); ?></div>
	</div>
</div>
<?php echo Html::anchor('admin/posts/edit/'.$post->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/posts', 'Back'); ?>
