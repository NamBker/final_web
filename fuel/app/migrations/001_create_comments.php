<?php

namespace Fuel\Migrations;

class Create_comments
{
	public function up()
	{
		\DBUtil::create_table('comments', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'name' => array('constraint' => 255, 'type' => 'varchar'),
			'email' => array('constraint' => 255, 'type' => 'varchar'),
			'message' => array('type' => 'text'),
			'numberlike' => array('constraint' => 11, 'type' => 'int','null' => true),
			'img' => array('constraint' => 255, 'type' => 'varchar','null' => true),
			'user_id' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'post_id' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 50, 'type' => 'varchar'),
			'updated_at' => array('constraint' => 50, 'type' => 'varchar'),
		), array('id'));
	}
	public function down()
	{
		\DBUtil::drop_table('comments');
	}
}