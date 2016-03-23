<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function OAuth()
	{
		if (isset($_GET['code'])){
			echo $_GET['code'];
		}else{
			echo "NO CODE";
		}
	}

	public function form($openId)
	{
		if(!isset($openId) || strlen($openId) != 28){
			$this->load->view('errors/cli/error_404');
		}else{
			$this->load->view('form', $openId);
		}
	}

	public function formHelper()
	{
		$this->load->view('helper');
	}

	public function about($index)
	{
		if($index != 'cyhn' && $index != 'ptjj' && $index != 'tzzr'){
			$this->load->view('errors/cli/error_404');
		}
		$this->load->view($index);
	}

}
