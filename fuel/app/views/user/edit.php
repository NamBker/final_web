<div class="row">
  <div class="col-md-4">
  </div>
  <div class="col-md-3">
     <form class="form-signin" action="/user/checkedit/" method="post" enctype="multipart/form-data">
              <label for="inputEmail" class="sr-only">Username</label>
              <input type="text" id="inputText" class="form-control" placeholder="Username" name="username" value="<?php echo $current_user->username ?>">
              <br>

              <label for="inputEmail" class="sr-only">Email address</label>
              <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" value="<?php echo $current_user->email ?>">
              <br>

              <label for="inputPassword" class="sr-only">Password</label>
              <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="currentpass">
              <br>

              <label for="inputPassword" class="sr-only">Password</label>
              <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password">
              <br>
              <input type="file" id="inputFile" placeholder="File" name="file">
              <br>
              <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>

              <input type="text" name="id" value="<?php echo $current_user->id ?>">
              
      </form>
  </div>
</div>
  <?php echo Html::anchor('blog/index', 'Back'); ?> 

  