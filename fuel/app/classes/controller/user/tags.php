<?php

class Controller_User_Tags extends Controller_User
{
	public function action_index()
	{

		$data['posts'] = Model_Post::find('all');
		$this->template->title = 'List Tags';
		$this->template->content = View::forge('user/tags/index', $data);
	}

	public function action_add()
	{
		$data["subnav"] = array('add'=> 'active' );
		$this->template->title = 'Tags &raquo; Add';
		$this->template->content = View::forge('user/tags/add', $data);
	}

	public function action_search(){
		if(Input::method('GET')){
			$tags = Input::get('tags');
			$data['posts'] = Model_Post::find('all', array(
		   	 	'where' => array('slug' => $tags) 
		   		 )
			);
			$this->template->title = "Tags search";
			$this->template->content = View::forge('user/tags/search',$data,false);
		}
	}
}
