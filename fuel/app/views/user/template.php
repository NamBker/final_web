<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<?php echo Asset::css('bootstrap.css'); ?>
	<style>
		body { margin: 50px; }
	</style>
	<?php echo Asset::js(array(
		'http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js',
		'bootstrap.js',
	)); ?>
	    <?php echo Asset::css('blog.css'); ?>

	    <?php echo Asset::css('projects.min.css'); ?>
	    <?php echo Asset::css('taggle.css'); ?>


	    
	<script>
		$(function(){ $('.topbar').dropdown(); });
	</script>
</head>
<body>

	<?php if ($current_user): ?>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/user">Home</a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<?php
						$files = new GlobIterator(APPPATH.'classes/controller/user/*.php');
						foreach($files as $file)
						{
							$section_segment = $file->getBasename('.php');
							$section_title = Inflector::humanize($section_segment);
							?>
							<li class="<?php echo Uri::segment(2) == $section_segment ? 'active' : '' ?>">
								<?php echo Html::anchor('/user/'.$section_segment, $section_title) ?>
							</li>
							<?php
						}
					?>
				</ul>
				<form class="navbar-form navbar-right" action="#">
	            		<input type="text" class="form-control" placeholder="Search...">
	         	 </form>
				<ul class="nav navbar-nav pull-right">
					<li class="dropdown"><img src="/assets/img/<?php echo $current_user->img ?>" alt=""  style="font-size:20px; color:#4786B6; padding-top:10px; width:50px;padding-top: 5px;padding-bottom:5px"></li>
					<li class="dropdown">
						<a data-toggle="dropdown" class="dropdown-toggle" href="/"><?php echo $current_user->username ?><b class="caret"></b></a>						
						<ul class="dropdown-menu">
							<li><?php echo Html::anchor('user/logout', 'Logout') ?></li>
							<li><?php echo Html::anchor('user/edit', 'Edit') ?></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<?php endif; ?>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1><?php echo $title; ?></h1>
				<hr>
<?php if (Session::get_flash('success')): ?>
				<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<p>
					<?php echo implode('</p><p>', (array) Session::get_flash('success')); ?>
					</p>
				</div>
<?php endif; ?>
<?php if (Session::get_flash('error')): ?>
				<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<p>
					<?php echo implode('</p><p>', (array) Session::get_flash('error')); ?>
					</p>
				</div>
<?php endif; ?>
			</div>
			<div class="col-md-12">
<?php echo $content; ?>
			</div>
		</div>
		<hr/>
		<footer>
			<p class="pull-right">DEV desgin <a href="https://www.facebook.com/nambker" target="_blank">NamBker</a></p>
		</footer>
	</div>

		    <?php echo Asset::js('jquery-1.10.1.js'); ?>
		    <?php echo Asset::js('jquery-ui.js'); ?>
		    <?php echo Asset::js('rainbow-custom.min.js'); ?>
		    <?php echo Asset::js('taggle.min.js'); ?>
		    <?php echo Asset::js('scripts.js'); ?>

</body>
</html>
