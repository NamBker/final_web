<?php 
class Controller_Block extends Controller_Template{
	public $template = 'block/template';
	public function action_index(){
		$this->template->title = "Block";
		$this->template->content = View::forge('block/index');
	}
	public function action_restart(){
		$block = 0;
		Session::set('block',$block);
		Response::redirect('user/login');
	}
}
?>