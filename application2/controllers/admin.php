<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		
		$this->load->library('grocery_CRUD');	
	}
	public function login(){
		$this->load->view('admin/login');
	}
	public function validate_credentials(){
		
		$this->load->model('model_users');
		
		if($this->model_users->can_log_in()){
			return true;	
		} else{
			$this->form_validation->set_message('validate_credentials', 'الاسم او كلمة المرور غير صحيح');	
			return false;
		}
		
	}
	public function admin_login_validation(){
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules("email", "البريد الالكترونى", "required|valid_email|trim|callback_validate_credentials");
		$this->form_validation->set_rules("password", "كلمة المرور", "required|xss_clean|sha1|trim");
		
		if($this->form_validation->run()){
			
			$data = array(
				'email' => $this->input->post('email'),
				'logged_in' => TRUE,
			);
			
			$this->session->set_userdata($data);
			if($this->session->userdata('logged_in')){
				redirect('admin');	
			}			
		}
		redirect('admin/login');
			
	}
	function _example_output($output = null)
	{
		$this->load->view('example.php',$output);	
	}
	
	function offices()
	{
		$output = $this->grocery_crud->render();

		$this->_example_output($output);
	}
	
	function index()
	{
		if(!$this->session->userdata('logged_in')){ redirect('admin/login');}
//		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
		
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('frame');
			$crud->set_subject('صورة الصفحة البرواز');
			$crud->required_fields('image');
			$crud->columns('image');
			$crud->set_field_upload('image','assets/uploads/files');
			$output = $crud->render();
			
			$this->_example_output($output);
			
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}	
	
	function offices_management()
	{
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('offices');
			$crud->set_subject('Office');
			$crud->required_fields('city');
			$crud->columns('city','country','phone','addressLine1','postalCode');
			$output = $crud->render();
			
			$this->_example_output($output);
			
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	function users()
	{
				if(!$this->session->userdata('logged_in')){ redirect('admin/login');}
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('users');
			
			$crud->set_subject('users');
			$crud->required_fields('name','email','password');
			$crud->columns('name','email');
			$crud->field_type('password', 'password');
			$crud->set_rules('email', 'Email', 'valid_email');
				 
			$output = $crud->render();
			
			$this->_example_output($output);
			
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	function rings()
	{
				if(!$this->session->userdata('logged_in')){ redirect('admin/login');}
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('rings');
			$crud->set_subject('rings');
			$crud->columns('title','code','voice');
			$crud->set_field_upload('voice','assets/uploads/files');
			$output = $crud->render();
			
			$this->_example_output($output);
			
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	
	function media()
	{
		if(!$this->session->userdata('logged_in')){ redirect('admin/login');}
		$crud = new grocery_CRUD();
		$crud->set_theme('datatables');
		$crud->set_table('media');
		$crud->display_as('title','الاسم')
             ->display_as('category','القسم')
             ->display_as('type','النوع')
			 ->display_as('audio','ملف الصوت .MP3')
             ->display_as('video1','ملف الفيديو .MP4')
             ->display_as('video2','ملف الفيديو .ogg')
             ->display_as('video3','ملف الفيديو .webm');
 
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
		$output = $crud->render();
		$this->_example_output($output);
	}
	function news()
	{
		if(!$this->session->userdata('logged_in')){ redirect('admin/login');}
		$crud = new grocery_CRUD();
		$crud->set_theme('datatables');
		$crud->set_table('news');
		$crud->display_as('title','الاسم')
             ->display_as('content','محتوى الخبر')
             ->display_as('type','النوع')
			 ->display_as('audio','ملف الصوت')
             ->display_as('video1','ملف الفيديو1')
             ->display_as('video2','ملف الفيديو2')
             ->display_as('video3','ملف الفيديو3')
			 ->display_as('image','صورة الخبر')
             ->display_as('date','التاريخ');
			 
 
		$crud->required_fields('title','category');
	 
		$crud->set_subject('اخبار');
		
        $crud->field_type('type','dropdown' ,array( 
													"1" => "صوت",
													"2" => "فيديو",
													"3" => "صورة"
													));                       
		$crud->set_field_upload('audio','assets/uploads/files');
		$crud->set_field_upload('video1','assets/uploads/files');
		$crud->set_field_upload('video2','assets/uploads/files');
		$crud->set_field_upload('video3','assets/uploads/files');
		$crud->set_field_upload('image','assets/uploads/files');
		$output = $crud->render();
		$this->_example_output($output);
	}
	
	function customers_management()
	{
			$crud = new grocery_CRUD();

			$crud->set_table('customers');
			$crud->columns('customerName','contactLastName','phone','city','country','salesRepEmployeeNumber','creditLimit');
			$crud->display_as('salesRepEmployeeNumber','from Employeer')
				 ->display_as('customerName','Name')
				 ->display_as('contactLastName','Last Name');
			$crud->set_subject('Customer');
			$crud->set_relation('salesRepEmployeeNumber','employees','lastName');
			
			$output = $crud->render();
			
			$this->_example_output($output);
	}
	function gallery()
	{
				if(!$this->session->userdata('logged_in')){ redirect('admin/login');}

			try{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('gallery');
			$crud->set_subject('gallery');
			$crud->columns('title','thumbnail');
			$crud->set_field_upload('thumbnail','assets/uploads/files');
			$crud->add_action('Photos', '', 'images_examples/example3','ui-icon-image');
			$output = $crud->render();
			
			$this->_example_output($output);
			
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	
	
	function orders_management()
	{
			$crud = new grocery_CRUD();

			$crud->set_relation('customerNumber','customers','{contactLastName} {contactFirstName}');
			$crud->display_as('customerNumber','Customer');
			$crud->set_table('orders');
			$crud->set_subject('Order');
			$crud->unset_add();
			$crud->unset_delete();
			
			$output = $crud->render();
			
			$this->_example_output($output);
	}
	
	function products_management()
	{
			$crud = new grocery_CRUD();

			$crud->set_table('products');
			$crud->set_subject('Product');
			$crud->unset_columns('productDescription');
			$crud->callback_column('buyPrice',array($this,'valueToEuro'));
			
			$output = $crud->render();
			
			$this->_example_output($output);
	}	
	
	function valueToEuro($value, $row)
	{
		return $value.' &euro;';
	}
	
	function film_management()
	{
		$crud = new grocery_CRUD();
		
		$crud->set_table('film');
		$crud->set_relation_n_n('actors', 'film_actor', 'actor', 'film_id', 'actor_id', 'fullname','priority');
		$crud->set_relation_n_n('category', 'film_category', 'category', 'film_id', 'category_id', 'name');
		$crud->unset_columns('special_features','description','actors');
		
		$crud->fields('title', 'description', 'actors' ,  'category' ,'release_year', 'rental_duration', 'rental_rate', 'length', 'replacement_cost', 'rating', 'special_features');
		
		$output = $crud->render();
		
		$this->_example_output($output);
	}
	
	
	
}