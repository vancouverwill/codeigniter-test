<?php 

class test_news_model extends CodeIgniterUnitTestCase
{

	protected $rand = '';

	public function __construct()
	{
		parent::__construct('News Model');

		$this->load->model('news_model');

		$this->rand = rand(500,15000);
	}


	//run before each test method to setup the staging area
	public function setUp()
	{
		$this->db->truncate('news');

		$insert_data = array(
			    'title' => 'demo'.$this->rand.'@demo.com',
			    'slug' => 'test_'.$this->rand,
			    'text' => 'demo_'.$this->rand
			);
		$news_id = $this->db->insert('news', $insert_data);
		//$news_id = $this->news_model->add_user($insert_data);
		//$this->user = $this->users_model->get_user($user_id);

		$insert_data2 = array(
			    'title' => 'demo'.$this->rand.'2@demo.com',
			    'slug' => 'test_'.$this->rand.'2',
			    'text' => 'demo_'.$this->rand.'2'
			);
		$news_id = $this->db->insert('news', $insert_data2);
    }

    //run after each test method to reset the staging area
    public function tearDown()
	{
		$this->db->delete($table = 'news', $where = 'id = 1', $limit = 1, $reset_data = TRUE);
    }

    public function test_add_user()
	{
		$insert_data = array(
			    'title' => 'demo'.$this->rand.'@demo.com',
			    'slug' => 'test_'.$this->rand,
			    'text' => 'demo_'.$this->rand
			);
		//$news_id = $this->news_model->add_user($insert_data);
		$news_id = $this->db->insert('news', $insert_data);

		// $this->load->library('firephp');
		// $this->firephp->log($news_id, 'what');
		//$this->dump($user_id);
		$this->assertEqual($news_id, 1, 'user id = 1');
	}

	public function test_get_user_by_id()
	{
		$news = $this->news_model->get_news('test_'.$this->rand);
		$this->assertEqual($news['id'], 1);
	}

		public function test_delete_user()
	{
		//$user = $this->news_model->delete_user(1);
		$news = $this->db->delete($table = 'news', $where = 'id = 1', $limit = 1, $reset_data = TRUE);
		$this->assertTrue($news);
	}

 //    public function tearDown()
	// {

 //    }

	// public function test_included()
	// {
	// 	$this->assertTrue(class_exists('users_model'));
	// }

	// public function test_add_user()
	// {
	// 	$insert_data = array(
	// 		    'user_email' => 'demo'.$this->rand.'@demo.com',
	// 		    'user_username' => 'test_'.$this->rand,
	// 		    'user_password' => 'demo_'.$this->rand,
	// 		    'user_join_date' => time(),
	// 			'user_group'	=> 1
	// 		);
	// 	$user_id = $this->users_model->add_user($insert_data);

	// 	//$this->dump($user_id);
	// 	$this->assertEqual($user_id, 1, 'user id = 1');
	// }
}