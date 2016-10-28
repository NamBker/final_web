<?php

class Controller_Admin extends Controller_Base
{
	public $template = 'admin/template';
	public function before()
	{
		parent::before();
		if (Request::active()->controller !== 'Controller_Admin' or ! in_array(Request::active()->action, array('login', 'logout')))
		{
			if (Auth::check())
			{
				$admin_group_id = Config::get('auth.driver', 'Simpleauth') == 'Ormauth' ? 6 : 100;
				if ( ! Auth::member($admin_group_id))
				{
					Session::set_flash('error', e('You don\'t have access to the admin panel'));
					Response::redirect('/');
				}
			}
			else
			{
				Response::redirect('user/login');
			}
		}
	}	
	public function action_logout()
	{
		Auth::logout();
		Response::redirect('/');
	}

	public function action_index()
	{
		$data['posts'] = Model_Post::find('all');
		$this->template->title = "Posts";
		$this->template->content = View::forge('admin/dashboard', $data);
	}


	public function action_edit()
	{
		$this->template->title = "Edit Account";
		$this->template->content = View::forge('admin/edit',$this->current_user);		
	}
	public function action_checkedit()
	{
		$name = Input::post('username');
		$id = Input::post('id');
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

		if (Input::method() == 'POST'){
	        Auth::update_user( 
	        	array(
				        'email'        => Input::post('email'),
				        'password'     => Input::post('password'),
		                'old_password' => Input::post('currentpass'),
		                'img'		   => $img   // bo xung them vao cho nay
				        ),$this->current_user->username
	        	);

			$result = DB::update('comments')
			    ->value("img", $img)
			    ->where('user_id', '=', $id)
			    ->execute();


	        Auth::logout();
	        Response::redirect('/');            
		}
	}
}
