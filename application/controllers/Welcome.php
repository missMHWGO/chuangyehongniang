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
			$url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=".APPID."&secret=".APPSECRET."&code=".$_GET['code']."&grant_type=authorization_code";

			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			$output = curl_exec($ch);
			curl_close($ch);
			$jsonInfo = json_decode($output, true);
			$openId =  $jsonInfo["openid"];
			$this->form($openId);
		}else{
			$this->load->view('errors/cli/error_404');
		}
	}

	public function form($openId)
	{
		if(!isset($openId) || strlen($openId) != 28){
			$this->load->view('errors/cli/error_404');
		}else{
			$data['openId'] = $openId;
			$this->load->view('form', $data);
		}
	}

	public function formHelper()
	{
		$this->load->view('helper');
	}

	public function cyhn()
	{
		$this->load->view('about/cyhn');
	}

	public function ptjj()
	{
		$this->load->view('about/ptjj');
	}

	public function tzzr()
	{
		$this->load->view('about/tzzr');
	}

}
