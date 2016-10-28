<?php 
class Controller_Register extends Controller_Template{
	
	public function action_index(){
		$this->template->title = "Register";
		$this->template->content = View::forge('register/index');
	}
	
	public function action_create(){
		$name = Input::post('username');
		$pass = Input::post('password');
		$email = Input::post('email');

		$config = array(
		    'path' => DOCROOT.Input::post('file'),
		    'max_size'    => 1024000,
		    'new_name' => $name.time(),
		    'max_length' => 1980000,
		    'ext_whitelist' => array('img', 'jpg', 'jpeg', 'gif', 'png'),
		);

		Upload::process($config);

		if (Upload::is_valid())
		{
		    $arr = Upload::get_files();
		    Upload::save(DOCROOT.'assets/img',array_keys($arr));
		}

		$img  = (Arr::get($config,'new_name',"Khong co gi")).".png";
		
		if(Input::method() == 'POST'){

			Auth::create_user($name,$pass,$email,$img,1);
			?>
			<script>alert('Đăng ký tài khoản thành công');</script>
			<?php
			Response::redirect('user');
		}
		else{
            Response::redirect('register');
		}
	}
}
