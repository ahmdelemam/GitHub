<?php

class admin extends CI_Controller{
    public function index(){
        redirect('admin/news');
    }
    public function news(){
        $this->load->model('news_model');
        $data['allnews'] = $this->news_model->getAll();
        $this->load->view('admin/header');
        $this->load->view('admin/news', $data);
        $this->load->view('admin/footer');
    }
    public function addNews(){
		/*if(!$this->session->userdata('logged_in')){
			redirect('news/login');
		}*/
        if($this->input->post('add')){

                $this->load->model('news_model');
                if($this->input->post('add')){
                        $config['upload_path'] = 'uploads';
                        $config['allowed_types'] = 'gif|jpg|png|jpeg';
                        $config['max_size']	= '5000';
                        $config['encrypt_name']  = 'TRUE';
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('image')){
                                echo "error in uploading...";
                        }else{
                            $data = array('uploaded_data' =>$this->upload->data());
                            if($this->news_model->add( $this->input->post('title'), $this->input->post('content'), $this->input->post('date'), $data['uploaded_data']['file_name'])){
                                    redirect('admin/news');
                            }else{
                                    echo "error in inserting ....";
                            }
                        }
                }
        }else{
                echo "error!!!";
        }

    } 
    public function editNews($id){
       if($_POST){
			$data = array(
				'title' => $_POST['title'],
				'content' => $_POST['content']
			);
			$this->load->model('news_model'); 
			$this->news_model->edit($id, $data); 
			redirect('admin/news'); 
		}
		 $this->load->model('news_model'); 
		 $data['allnews'] = $this->news_model->getOne($id);
		 $this->load->view('admin/header');
		 $this->load->view('admin/edit_news', $data);
		 $this->load->view('admin/footer');
    }
    public function deleteNews($id){
        $this->load->model('news_model');
		$this->news_model->delete($id);
		redirect('admin/news');
    }
	
	public function album(){
		$this->load->view('admin/header');
		
		$this->load->view('admin/footer');
	}
	
	function example1()
	{
		$this->load->library('image_CRUD');
		$image_crud = new image_CRUD();
		
		$image_crud->set_primary_key_field('id');
		$image_crud->set_url_field('url');
		$image_crud->set_table('example_1')
			->set_image_path('assets/uploads');
			
		$output = $image_crud->render();
		$this->load->view('admin/header');
		$this->load->view('admin/example1.php',$output);
		$this->load->view('admin/footer');
	}
	function media()
	{
/*		CREATE TABLE IF NOT EXISTS  `media` (
 `id` INT( 11 ) NOT NULL AUTO_INCREMENT ,
 `title` VARCHAR( 250 ) NOT NULL ,
 `category` VARCHAR( 50 ) NOT NULL ,
 `type` VARCHAR( 50 ) NOT NULL ,
 `audio` VARCHAR( 250 ) NOT NULL ,
 `video1` VARCHAR( 250 ) NOT NULL ,
 `video2` VARCHAR( 250 ) NOT NULL ,
 `video3` VARCHAR( 250 ) NOT NULL ,
PRIMARY KEY (  `id` )
) ENGINE = INNODB DEFAULT CHARSET = utf8 AUTO_INCREMENT =1;
*/
		$this->load->library('grocery_CRUD');	
		$crud = new grocery_CRUD();
		$crud->set_theme('datatables');
		$crud->set_table('media');
		$crud->display_as('title','الاسم')
             ->display_as('category','القسم')
             ->display_as('type','النوع')
			 ->display_as('audio','ملف الصوت')
             ->display_as('video1','ملف الفيديو1')
             ->display_as('video2','ملف الفيديو2')
             ->display_as('video3','ملف الفيديو3');
 
		$crud->required_fields('title','category','type');
	 
		$crud->set_subject('ميديا');
		$crud->field_type('category','dropdown' ,array( 
														"1" => "حفلات",
														"2" => "حلمنتيشى رومانسى",
														"3" => "حلمنتيشى اجتماعى",
														"4" => "حلمنتيشى سياسى",
														"5" => "مش حلمنتيشى سياسى",
														"6" => "مش حلمنتيشى رومانسى",
														"7" => "رباعيات",
														"8" => "كليبات"
														));
        $crud->field_type('type','dropdown' ,array( 
													"1" => "صوت",
													"2" => "فيديو"
													));                       
		$crud->set_field_upload('audio','assets/uploads/files');
		$crud->set_field_upload('video1','assets/uploads/files');
		$crud->set_field_upload('video2','assets/uploads/files');
		$crud->set_field_upload('video3','assets/uploads/files');
		
		//check if audio
		/*if($audio){
			$crud->set_field_upload('file_url','assets/uploads/files');
		}else{
			$crud->set_field_upload('file_url','assets/uploads/files');
			$crud->set_field_upload('file_url','assets/uploads/files');
			$crud->set_field_upload('file_url','assets/uploads/files');
		}*/
		$output = $crud->render();

		$this->load->view('admin/header');
		$this->load->view('example.php',$output);
		$this->load->view('admin/footer');
	}
}
?>
