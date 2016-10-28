
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title><?php echo $title ?></title>
    <?php echo Asset::css('bootstrap.css'); ?>
    <?php echo Asset::css('blog.css'); ?>



    <!-- <link rel="stylesheet" type="text/css" href="seman/tic/dist/semantic.min.css"> -->
<!-- <script src="semantic/dist/semantic.min.js"></script> -->
  </head>
  <body>


    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item" href="/">Home</a>
          <a class="blog-nav-item" href="/user/login">Login</a>

          <form class="navbar-form navbar-right" action="/tags/search/" method="GET">
                  <input type="text" class="form-control" placeholder="Search..." name="tags">
           </form>
        </nav>
      </div>
    </div>
    <div class="container noidung">
               <?php echo Str::truncate($content,2000); ?>
      

    </div>
  </body>
</html>
