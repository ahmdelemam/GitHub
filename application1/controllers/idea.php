<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Idea extends CI_Controller {

	public function index()
	{
		$this->load->view('layout/header');
                $this->load->view('index');
                $this->load->view('layout/footer');
	}
}
