<?php

class Controller_Tags extends Controller_Template
{

	public function action_index()
	{
		$data['posts'] = Model_Post::find('all');
		$this->template->title = 'List Tags';
		$this->template->content = View::forge('/tags/index', $data);
	}

	public function action_add()
	{
		$data["subnav"] = array('add'=> 'active' );
		$this->template->title = 'Tags &raquo; Add';
		$this->template->content = View::forge('/tags/add', $data);
	}

	public function action_search(){
		if(Input::method('GET')){
			$tags = Input::get('tags');
			$data['posts'] = Model_Post::find('all', array('where' => array('slug' => $tags) ));
			
			if(!empty($data)){
				$this->template->title = "Tags search";
				$this->template->content = View::forge('tags/search',$data,false);	
			}
			else{
				$body['posts'] = Model_Post::find('all', array('where' => array('body' => "%".$tags."%") ));
				$this->template->title = "Tags search";
				$this->template->content = View::forge('tags/search',$body,false);		
			}
		}
	}
}
