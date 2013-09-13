<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {

	public function index(){
		
		$this->load->view('intro');
	}
	public function home(){
		$this->load->model('news_model');
		$data['allnews1'] = $this->news_model->getLastTen();
		$this->load->model('media_model');
		$data['allnews2'] = $this->media_model->getLastTen();
		$this->load->model('media_model');
		$data['allnews'] = $this->media_model->getFrame();
		$this->load->view('header');
		$this->load->view('index', $data);
		$this->load->view('footer');
	}
	public function news(){
		$this->load->model('news_model');
		$data['allnews'] = $this->news_model->getAll();
		$this->load->view('header');
		$this->load->view('news', $data);
		$this->load->view('footer');
	}
	public function newsNumber($news_id){
		$this->load->model('news_model');
		$data['allnews'] = $this->news_model->getOne($news_id);
		$this->load->view('header');
		$this->load->view('news_number', $data);
		$this->load->view('footer');
	}
	public function albums(){
		$this->load->view('header');
		$this->load->view('albums');
		$this->load->view('footer');
	}
	public function rings(){
		$this->load->view('header');
		$this->load->view('rings');
		$this->load->view('footer');
	}
	public function posters(){
		$this->load->view('header');
		$this->load->view('posters');
		$this->load->view('footer');
	}
	public function halamnteshy(){
		$this->load->model('media_model');
		$data['allnews'] = $this->media_model->getCategory(2);
		
		$this->load->model('media_model');
		$data1['allnews'] = $this->media_model->getCategory(3);
		
		$this->load->model('media_model');
		$data2['allnews'] = $this->media_model->getCategory(4);
		
		$this->load->view('header');
		$this->load->view('halamnteshy');
		$this->load->view('halamnteshy1', $data);
		$this->load->view('halamnteshy2', $data1);
		$this->load->view('halamnteshy3', $data2);
		$this->load->view('footer');
	}
	public function mshhalamnteshy(){
		$this->load->model('media_model');
		$data['allnews'] = $this->media_model->getCategory(5);
		
		$this->load->model('media_model');
		$data1['allnews'] = $this->media_model->getCategory(6);
		$this->load->view('header');
		$this->load->view('mshhalamnteshy');
		$this->load->view('mshhalamnteshy1', $data);
		$this->load->view('mshhalamnteshy2', $data1);
		$this->load->view('footer');
	}
	public function roba3yat(){
		$this->load->model('media_model');
		$data['allnews'] = $this->media_model->getCategory(7);
		$this->load->view('header');
		$this->load->view('roba3yat', $data);
		$this->load->view('footer');
	}
	public function about(){
		$this->load->view('header');
		$this->load->view('about');
		$this->load->view('footer');
	}
	public function clips(){
		$this->load->model('media_model');
		$data['allnews'] = $this->media_model->getCategory(8);
		$this->load->view('header');
		$this->load->view('clips', $data);
		$this->load->view('footer');
	}
	public function parties(){
		$this->load->model('media_model');
		$data['allnews'] = $this->media_model->getCategory(1);
		$this->load->view('header');
		$this->load->view('parties', $data);
		$this->load->view('footer');
	}
	public function video($video1, $video2, $video3){
		$data['allnews'] = array($video1, $video2, $video3);
		$this->load->view('video', $data);
	}
	public function audio($audio_name){
		$data['allnews'] = $audio_name;
		$this->load->view('audio', $data);
	}
	
	public function send_email(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules("name", "الاسم", "required|xss_clean");
		$this->form_validation->set_rules("email", "البريد الالكترونى", "required|valid_email|xss_clean");
		$this->form_validation->set_rules("phone", "الموبايل", "required|trim|xss_clean");
		$this->form_validation->set_rules("title", "عنوان الرسالة", "required|xss_clean");
		$this->form_validation->set_rules("msg", "الرسالة", "required|xss_clean");
		
		if($this->form_validation->run() == FALSE){
			
			$this->load->model('news_model');
			$data['allnews1'] = $this->news_model->getLastTen();
			$this->load->model('media_model');
			$data['allnews2'] = $this->media_model->getLastTen();
			$this->load->model('media_model');
			$data['allnews'] = $this->media_model->getFrame();
			$this->load->view('header');
			$this->load->view('index', $data);
			$this->load->view('footer', $data);
		}else{
			$this->load->library('email', array('mailtype'=>'html'));
			$this->email->from(set_value("email"), set_value("name"));
			$this->email->to("info@amrkatamesh.com");
			$this->email->subject(set_value("title"));
			$msg  = '<h3>Message from Fans </h3> <br>';
			$msg .= 'mobile :-  ' . set_value("phone") . '<br>';
			$msg .= 'message :-  '.set_value("msg"). '<br>';
			$this->email->message($msg);
			if($this->email->send()){redirect("site/home");}
		}
	}
}
