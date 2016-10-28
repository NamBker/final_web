<?php

class Controller_like extends Controller_Template
{

	public function action_add()
	{
		$slug = Input::get('slug');
		$cmt = Input::get('cmt');
		// tang so luot like
		$entry = Model_Comment::find($cmt);

		$cc = Arr::get($entry,'numberlike',"Null");
		print_r($cc+1);


		$result = DB::update('comments')
			->value('numberlike',$cc+1)
			->where('id',$cmt)
			->execute();


		Response::redirect('/blog/view/'.$slug);
	

	}
	public function action_search(){
		if(Input::method('GET')){
			$like = Input::get('like');
			$data['posts'] = Model_Post::find('all', array('where' => array('slug' => $like) ));
			
			if(!empty($data)){
				$this->template->title = "like search";
				$this->template->content = View::forge('like/search',$data,false);	
			}
			else{
				$body['posts'] = Model_Post::find('all', array('where' => array('body' => "%".$like."%") ));
				$this->template->title = "like search";
				$this->template->content = View::forge('like/search',$body,false);		
			}
		}
	}
}
