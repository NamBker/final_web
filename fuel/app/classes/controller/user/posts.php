<?php
class Controller_User_Posts extends Controller_User
{

	public function action_index()
	{
		$id = $this->current_user->id;
		$name = $this->current_user->username;
		$entry = Model_User::find('all', array(
		    'where' => array(
		        array('id', $id),
		        'and' =>  array('username', $name),
		    ),
		));
		$data['posts'] = Model_Post::find('all', array(
		    'where' => array('user_id' => $id) 
		    )
		);
		$this->template->title = "Posts";
		$this->template->content = View::forge('user/posts/index', $data,false);
	}

	public function action_view($id = null)
	{
		Session::set('user_id',$this->current_user->id);  // truyen id de kiem tra cho phep edit comment

		$data['post'] = Model_Post::find($id);
		$this->template->title = "Post";

		$id_account = Arr::get($data['post'],'user_id',null); // lay id user thu post

			$entry = Model_User::find($id_account); // tim ten nguoi dung post trong bang user

			$name = Arr::get($entry,'username',null); // get ten cua nguoi dung vao $name
			
			Arr::set($data['post'],'user_id',$name); // set ten nguoi dung chinh laf user id
			



		$this->template->content = View::forge('user/posts/view', $data,false);
		$name = $this->current_user->username;
        $email = $this->current_user->email;
        $user_id = $this->current_user->id;
		$val = Model_Comment::validate('create');
		
		if (Input::method() == 'POST')
		{
			$comment = new Model_Comment();
            $comment->name = $name;
            $comment->email = $email;
            $comment->user_id = $user_id;
   			$comment->message = Input::post('message');
            $comment->post_id = $id;
			$comment->save();

			Session::set_flash('success', e('Added comment #'.$comment->id.'.'));
			Response::redirect('user/posts/view/'.$id);
		}
		else
		{
			Session::set_flash('error', $val->error());
		}
	}

	public function action_create($id = null)
	{
	    $view = View::forge('user/posts/create');
	    if (Input::method() == 'POST')
	    {
	        $post = Model_Post::forge(array(
	            'title' => Input::post('title'),
	            'slug' => Inflector::friendly_title(Input::post('title'), '-', true),
	            'summary' => Input::post('summary'),        
	            'body' => Input::post('body'),
	            'user_id' => $this->current_user->id,
	            'created_at' => date("H:i:s"),
	        ));

	        if ($post and $post->save())
	        {
	            Session::set_flash('success', 'Added post #'.$post->id.'.');
	            Response::redirect('user/posts');
	        }
	        else
	        {
	            Session::set_flash('error', 'Could not save post.');
	        }
	    }
	    // Set some data
	    $view->set_global('users', Arr::assoc_to_keyval(Model_User::find('all'), 'id', 'username'));

	    $this->template->title = "Create Post";
	    $this->template->content = $$view = View::forge('user/posts/create');
	}

	public function action_edit($id = null)
	{
	    $view = View::forge('user/posts/edit');
	    $post = Model_Post::find($id);

	    if (Input::method() == 'POST')
	    {
	        $post->title = Input::post('title');
	        $post->slug = Inflector::friendly_title(Input::post('title'), '-', true);  // Khong hieu choi nay lam
	        $post->summary = Input::post('summary');
	        $post->body = Input::post('body');
	        $post->user_id = $this->current_user->id;
	        if ($post->save())
	        {
	            Session::set_flash('success', 'Updated post #' . $id);
	            Response::redirect('user/posts');
	        }
	        else
	        {
	            Session::set_flash('error', 'Could not update post #' . $id);
	        }
	    }
	    else
	    {
	        $this->template->set_global('post', $post, false);
	    }
	    // Set some data
	    $view->set_global('users', Arr::assoc_to_keyval(Model_User::find('all'), 'id', 'username'));

	    $this->template->title = "Edit Post";
	    $this->template->content = $view;
	}

	public function action_delete($id = null)
	{
		if ($post = Model_Post::find($id))
		{
			$post->delete();
			Session::set_flash('success', e('Deleted post #'.$id));
		}
		else
		{
			Session::set_flash('error', e('Could not delete post #'.$id));
		}
		Response::redirect('user/posts');
	}
    
    public function action_comment($id = null)
		{
		    $post = Model_Post::find_by_slug($id);
		    // Lazy validation
		    if (Input::post('name') AND Input::post('email') AND Input::post('message')){
		        // Create a new comment
		        $post->comments[] = new Model_Comment(array(
		            'name' => $this->current_user->name,
		            'email' => $this->current_user->email,
		            'message' => Input::post('message'),
		            'user_id' => $this->current_user->id,

		        ));
		        // Save the post and the comment will save too
		        if ($post->save())
		        {
		            $comment = end($post->comments);
		            Session::set_flash('success', 'Added comment #'.$comment->id.'.');
		        }
		        else
		        {
		            Session::set_flash('error', 'Could not save comment.');
		        }
		        Response::redirect('user/posts/view/'.$id);
		    }
		    // Did not have all the fields
		    else
		    {
		        // Just show the view again until they get it right
		        $this->action_view($id);
		    }
		}
}
