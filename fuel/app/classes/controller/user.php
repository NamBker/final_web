<?php

class Controller_User extends Controller_Base
{
	public $template = 'user/template';
	public function before()
	{
		parent::before();
		if (Request::active()->controller !== 'Controller_User' or ! in_array(Request::active()->action, array('login', 'logout')))
		{
			if (Auth::check())
			{
				$user_group_id = Config::get('auth.driver', 'Simpleauth') == 'Ormauth' ? 6 : 1;
				if ( ! Auth::member($user_group_id))
				{
					Session::set_flash('error', e('You don\'t have access to the user panel'));
					Response::redirect('/');
				}
			}
			else
			{
				Response::redirect('user/login');
			}
		}
	}

	public function action_login()
	{
		// Already logged in
		Auth::check() and Response::redirect('user');
		$val = Validation::forge();
		if (Input::method() == 'POST')
		{
			$val->add('email', 'Email or Username')
			    ->add_rule('required');
			$val->add('password', 'Password')
			    ->add_rule('required');
			if ($val->run())
			{
				if ( ! Auth::check())
				{
					if (Auth::login(Input::post('email'), Input::post('password')))
					{
						// assign the user id that lasted updated this record
						foreach (\Auth::verified() as $driver)
						{
							if (($id = $driver->get_user_id()) !== false)
							{
								// credentials ok, go right in
								$current_user = Model\Auth_User::find($id[1]);
								if($current_user->group == 100){
									Session::set_flash('success',e('Welcome, '.$current_user->username));
									Response::redirect('admin');
								}
								Session::set_flash('success',e('Welcome, '.$current_user->username));
								Response::redirect('user');
							}
						}
					}
					else
					{
						$block = Session::get('block');
						if(empty($block)){
							Session::set('block',1);

						}else
							if(Session::get('block')== 1){
								Session::set('block',2);
							}else
								if(Session::get('block') == 2){							
									Session::set('block',3);
								
							}else
								if(Session::get('block') == 3){
									$this->template->set_global('login_error',"Loi Roi nhe -_-");
									Response::redirect('block');
								}

						$this->template->set_global('login_error', 'Login failed!');
					}
				}
				else
				{
					$this->template->set_global('login_error', 'Already logged in!');
				}
			}
		}
		$this->template->title = 'Login';
		$this->template->content = View::forge('user/login', array('val' => $val), false);
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
		$this->template->content = View::forge('user/dashboard', $data);
	}

	public function action_edit()
	{
		$this->template->title = "Edit Account";
		$this->template->content = View::forge('user/edit',$this->current_user);		
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
