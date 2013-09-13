<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Uploadify_v3 extends CI_Controller
{
 
    public $view_data = array();
    private $upload_config;
 
    function __construct()
    {
        parent::__construct();
    }
 
    public function index()
    {
        $this->load->helper(array('url', 'form'));
		
        $this->load->view('adminstrator/uploadify_v3', $this->view_data);
    }
 
    public function do_upload()
    {
        $this->load->library('upload');
 
       // $image_upload_folder =/* FCPATH /. */'uploads';
// 
//        if (!file_exists($image_upload_folder)) {
//            mkdir($image_upload_folder, DIR_WRITE_MODE, true);
//        }
 
        $this->upload_config = array(
            'upload_path'   =>  'uploads',//$image_upload_folder
            'allowed_types' => 'png|jpg|bmp|tiff',
            'max_size'      => 2048,
            'remove_space'  => TRUE,
            'encrypt_name'  => TRUE,
        );
 
        $this->upload->initialize($this->upload_config);
 
        if (!$this->upload->do_upload()) {
            
            echo json_encode($upload_error);
        } else {
            $file_info = $this->upload->data();
           //echo json_encode($file_info);
        }
 
    }
 
 	public function add()
    {
        $this->load->model('model_flyer');
					

    }
	
	function uploadifyUploader()
        {
            
           if (!empty($_FILES))
               {
                $tempFile = $_FILES['Filedata']['tmp_name'];
                $targetPath = './uploads/';
                $targetFile =  str_replace('//','/',$targetPath) . $_FILES['Filedata']['name'];
 
                 if ( ! @copy($tempFile,$targetFile))
                        {
                                if ( ! @move_uploaded_file($tempFile,$targetFile))
                                {
                                        echo "error";
                                }
                                else echo str_replace($_SERVER['DOCUMENT_ROOT'],'',$targetFile);
                        }
                 else echo str_replace($_SERVER['DOCUMENT_ROOT'],'',$targetFile);
            } 
        }
		
		
        function filemanipulation($extension,$filename)
        {
            // you can insert the result into the database if you want.
            if($this->is_image($extension)) 
            {
                $config['image_library']  = 'gd2';
                $config['source_image']   = './uploads/'.$filename;
                $config['new_image']      = './uploads/thumbs/';
                $config['create_thumb']   = TRUE;
                $config['maintain_ratio'] = TRUE;
                $config['thumb_marker']   = '';
                $config['width']   = 100;
                $config['height']   = 100;
 
                $this->load->library('image_lib', $config); 
 
                $this->image_lib->resize();
                echo 'image';
            }
            else echo 'file';
        }
         
        private function is_image($imagetype)
        {
            $ext = array(
                '.jpg',
                '.gif',
                '.png',
                '.bmp'
            );
            if(in_array($imagetype, $ext)) return true;
            else return false;
        }
}
 
/* End of file uploadify_v3.php */
/* Location: ./application/controllers/uploadify_v3.php */




