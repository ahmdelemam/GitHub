<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class admin extends CI_Controller {

    public function index() {
        if (!$this->session->userdata('logged_in')) {
            redirect('adminstrator/admin/login');
        }
        redirect('adminstrator/admin/control_panel');
    }

    public function login() {
        $this->load->view('adminstrator/login');
    }

    public function validate_credentials() {

        $this->load->model('model_users');

        if ($this->model_users->can_log_in()) {
            return true;
        } else {
            $this->form_validation->set_message('validate_credentials', 'الاسم او كلمة المرور غير صحيح');
            return false;
        }
    }

    public function control_panel() {
        if (!$this->session->userdata('logged_in')) {
            redirect('adminstrator/admin/login');
        }
        $this->load->model('model_flyer');
        $data['flyers'] = $this->model_flyer->get_all_flyers();
        $this->load->view('adminstrator/header');
        $this->load->view('adminstrator/all_flyers', $data);
    }

    public function admin_login_validation() {

        $this->load->library('form_validation');
        $this->form_validation->set_rules("email", "البريد الالكترونى", "required|valid_email|trim|callback_validate_credentials");
        $this->form_validation->set_rules("password", "كلمة المرور", "required|xss_clean|md5|trim");

        if ($this->form_validation->run() && $this->input->post('email') == 'admin@admin.com') {

            $data = array(
                'email' => $this->input->post('email'),
                'logged_in' => TRUE,
            );

            $this->session->set_userdata($data);
            if ($this->session->userdata('logged_in')) {
                redirect('adminstrator/admin/control_panel');
            }
        }
        redirect('adminstrator/admin/login');
    }

    public function seemore($id) {
        if (!$this->session->userdata('logged_in')) {
            redirect('adminstrator/admin/login');
        }
        $this->load->model('model_flyer');
        $this->data['one_flyer'] = $this->model_flyer->get_one($id);
        $this->load->view('adminstrator/header');
        $this->load->view('adminstrator/seemore', $this->data);
        $this->load->view('adminstrator/footer');
    }

    public function delete($id) {

        $this->load->model('model_flyer');
        $this->model_flyer->delete($id);
        redirect('adminstrator/admin');
    }

    public function add_flyer() {
        if (!$this->session->userdata('logged_in')) {
            redirect('adminstrator/admin/login');
        }
        $this->load->view('adminstrator/header');
        $this->load->view('adminstrator/insert_flyer');
    }

    public function add_flyer2() {
        if (!$this->session->userdata('logged_in')) {
            redirect('adminstrator/admin/login');
        }
        $this->load->view('adminstrator/header');
        $this->load->view('adminstrator/insert_flyer1');
    }

    public function add_flyer_validation() {
        if (!$this->session->userdata('logged_in')) {
            redirect('adminstrator/admin/login');
        }
        $this->load->library('form_validation');
        $this->form_validation->set_rules("flyer", " اسم الفلاير", "required|trim|required|min_length[2]|max_length[50]|xss_clean");
        if ($this->form_validation->run()) {
            $config['upload_path'] = 'uploads';
            $config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
            $config['max_size'] = '50000';
            $config['max_width'] = '1024';
            $config['max_height'] = '1024';
            $config['encrypt_name'] = 'TRUE';
            $this->load->library('upload', $config);

            for ($i = 1; $i < 2; $i++) {
                $upload = $this->upload->do_upload('image' . $i);
                if ($upload === FALSE) {
                    $this->session->set_flashdata('message', $this->upload->display_errors());
                    redirect('adminstrator/admin/add_flyer2');
                }
                $data = $this->upload->data();
                $uploadedFiles[$i] = $data;
                $this->load->model('model_flyer');
            }
            if ($foriegn_key = $this->model_flyer->insert($this->input->post('flyer'), $uploadedFiles[1]['file_name'])) {
                $this->session->set_userdata('some_name', $foriegn_key);
                redirect('adminstrator/admin/add');
            } else {
                
            }
        } else {
            $this->load->view('adminstrator/header');
            $this->load->view('adminstrator/insert_flyer1');
        }
    }

    //upload flyers images
    public function add() {
        if (!$this->session->userdata('logged_in')) {
            redirect('adminstrator/admin/login');
        }
        $this->load->library('upload');
        $this->upload_config = array(
            'upload_path' => 'uploads',
            'allowed_types' => 'png|jpg|bmp|tiff',
            'max_size' => 2048,
            'remove_space' => TRUE,
            'encrypt_name' => TRUE,
        );
        $this->upload->initialize($this->upload_config);

        if (!$this->upload->do_upload()) {
            $this->load->view('adminstrator/header');
            $this->load->view('adminstrator/add_flyer1');
        } else {
            $uploadedFiles = $this->upload->data();
            $imagename = $uploadedFiles['file_name'];
            $foriegn_key = $_POST['foriegn_key'];
            $data_array = array('image' => $imagename, 'flyer_id' => $foriegn_key);
            $this->db->insert('flyer_images', $data_array);
            return true;
        }
    }

    public function change_pagination_photos() {
        if (!$this->session->userdata('logged_in')) {
            redirect('adminstrator/admin/login');
        }
        $this->load->model('model_offers');

        $this->load->library('form_validation');
        $this->form_validation->set_rules("head_text1", " نص العرض 1", "required");
        $this->form_validation->set_rules("head_text2", "نص العرض 2", "required");

        if ($this->form_validation->run()) {
            $config['upload_path'] = 'uploads';
            $config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
            $config['max_size'] = '50000';
            $config['max_width'] = '600';
            $config['max_height'] = '1024';
            $config['encrypt_name'] = 'TRUE';
            $this->load->library('upload', $config);

            for ($i = 1; $i < 4; $i++) {
                $upload = $this->upload->do_upload('image' . $i);
                if ($upload === FALSE) {
                    $this->session->set_flashdata('message', $this->upload->display_errors());
                    redirect('adminstrator/admin/pagination_photos');
                }
                $data = $this->upload->data();
                $uploadedFiles[$i] = $data;
            } $this->model_offers->delete_all();
            if ($this->model_offers->edit_pagination($this->input->post('head_text1'), $this->input->post('head_text2'), $uploadedFiles[1]['file_name']
                            , $uploadedFiles[2]['file_name'], $uploadedFiles[3]['file_name'])) {
                $this->session->set_flashdata('message', 'لقد تم التعديل بنجاح');
                redirect('site/index');
            } else {
                $this->session->set_flashdata('message', 'لم تتم العملية بنجاح برجاء تكرار المحاولة');
                redirect('adminstrator/admin/pagination_photos');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('adminstrator/admin/pagination_photos');
        }
    }

    public function pagination_photos() {
        if (!$this->session->userdata('logged_in')) {
            redirect('adminstrator/admin/login');
        }
        $this->load->view('adminstrator/header');
        $this->load->view('adminstrator/change_pagination_photos');
    }

    public function mail_to_subscribers() {
        if (!$this->session->userdata('logged_in')) {
            redirect('adminstrator/admin/login');
        }
        $this->load->library('form_validation');
        $this->form_validation->set_rules("subject", "عنوان الرسالة", "required|xss_clean|trim");
        $this->form_validation->set_rules("msg", "الرسالة", "required|xss_clean|trim");

        if ($this->form_validation->run()) {
            if ($_FILES['image1']['size'] > 0) {
                $config['upload_path'] = 'uploads';
                $config['allowed_types'] = 'gif|jpg|png|bmp|jpeg|doc|docx|pdf|txt';
                $config['max_size'] = '50000';
                $this->load->library('upload', $config);

                for ($i = 1; $i < 2; $i++) {
                    $upload = $this->upload->do_upload('image' . $i);
                    if ($upload === FALSE) {
                        $this->session->set_flashdata('message', $this->upload->display_errors());
                        redirect('adminstrator/admin/subscribers');
                    }
                    $data = $this->upload->data();
                    $pathToUploadedFile = $data['full_path'];
                }
            }
            $this->load->model('model_users');
            $data = $this->model_users->get_users_email();
            $this->load->library('email');
            $subject = $this->input->post('subject');
            $msg = $this->input->post('msg');

            foreach ($data as $address) {
                $to = $address->email;
                $this->email->clear(TRUE);
                $this->email->to($to);
                $this->email->from('dev@cubeadv.com');
                $this->email->subject($subject);
                $this->email->message($msg);
                if ($pathToUploadedFile == "") {
                    
                } else {
                    $this->email->attach($pathToUploadedFile);
                }
                if ($to != 'admin@admin.com') {
                    $this->email->send();
                    $this->session->set_flashdata('message', "تم الارسال بنجاح");
                    redirect('adminstrator/admin/subscribers');
                }
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('adminstrator/admin/subscribers');
        }
    }

    public function subscribers() {
        if (!$this->session->userdata('logged_in')) {
            redirect('adminstrator/admin/login');
        }
        $this->load->view('adminstrator/header');
        $this->load->view('adminstrator/suscribers');
        $this->load->view('adminstrator/footer');
    }

}

