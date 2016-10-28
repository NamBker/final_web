<?php 
class Controller_Blog extends Controller_Base
{

	public $template = 'blog/template';
	public function action_index()
	{
		$data['posts'] = Model_Post::find('all');
		$this->template->title = "Posts";
		$this->template->content = View::forge('blog/index', $data);

	}

	public function action_view($slug)
	{
	    // $post = Model_Post::find_by_slug($id);
	    $post = Model_Post::find_by_slug($slug, array('related' => array('user', 'comments')));
	  	  $id_account = Arr::get($post,'user_id',null); // lay id user thu post
			$entry = Model_User::find($id_account); // tim ten nguoi dung post trong bang user
			$name = Arr::get($entry,'username',null); // get ten cua nguoi dung vao $name
			Arr::set($post,'user_id',$name); // set ten nguoi dung chinh laf user i
	 	 	$this->template->title = $post->title;
	   		$this->template->content = View::forge('blog/views', array(
	        'post' => $post,
	    ),false);
	 }



	

	 public function action_comment($slug)
		{
		    $post = Model_Post::find_by_slug($slug);
		    // Lazy validation
		    if (Input::post('name') AND Input::post('email') AND Input::post('message'))
		    {
		        // Create a new comment
		        $post->comments[] = new Model_Comment(array(
		            'name' => Input::post('name'),
		            'email' => Input::post('email'),
		            'message' => Input::post('message'),
		            'numberlike' => '0',
		            // 'user_id' => $this->current_user->id,
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
		        Response::redirect('blog/view/'.$slug);
		    }
		    // Did not have all the fields
		    else
		    {
		        // Just show the view again until they get it right
		        $this->action_view($slug);
		    }
		}
		public function action_login(){
			Auth::logout();
			Response::redirect('user/login');
		}
}

 ?>
