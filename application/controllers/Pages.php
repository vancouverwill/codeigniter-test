<?php

class Pages extends CI_Controller {

	public function view($page = 'home')
	{
				
		if ( ! file_exists('application/views/pages/'.$page.'.php'))	{
			// Whoops, we don't have a page for that!
			//echo 'something bad';
			if ( $this->config->item('debug') ){ 
				$this->firephp->fb( $page, "page"  );
				//$this->firephp->log( $challenge, "models/challenges_model - add_details() challenge A"  );
			}

			show_404();
		}
		
		$data['title'] = ucfirst($page); // Capitalize the first letter
		
		$this->load->view('templates/header', $data);
		$this->load->view('pages/'.$page, $data);
		$this->load->view('templates/footer', $data);

	}
}