<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Site extends CI_Controller {

    public function index() {
        redirect('site/qatar');
    }

    public function qatar() {
        $this->load->model('model_flyer');
        $this->load->library('pagination');
        $config = array();
        $config["base_url"] = base_url() . 'site/qatar/';
        $config["total_rows"] = $this->model_flyer->get_count();
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
        $config["page_query_string"] = false;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->model_flyer->fetch_pagination($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $data['pagination_photos'] = $this->model_flyer->get_index_photos();


        $this->load->view("header");
        $this->load->view("pagination", $data);
        $this->load->view('login');
        $this->load->view('register');
        $this->load->view("footer");
    }

    public function seemore($id) {
        $this->load->model('model_flyer');
        $this->data['one_flyer'] = $this->model_flyer->get_one($id);
        $this->load->view('header');
        $this->load->view('seemore', $this->data);
        $this->load->view('footer');
    }

    public function home() {
        $this->load->model("model_get");
        $data["results"] = $this->model_get->getData('home');
        $this->load->view('header');
        $this->load->view('login');
        $this->load->view('register');
        $this->load->view('footer', $data);
    }

    public function about() {
        $this->load->model("model_get");
        $data["results"] = $this->model_get->getData('home');
        $this->load->view('header');
        $this->load->view('content_about');
        $this->load->view('login');
        $this->load->view('register');
        $this->load->view('footer', $data);
    }

    public function contact() {
        $data["message"] = "";
        $this->load->model("model_get");
        $data["results"] = $this->model_get->getData('home');
        $this->load->view('header');
        $this->load->view('content_contact', $data);
        $this->load->view('login');
        $this->load->view('register');
        $this->load->view('footer', $data);
    }

    public function howitworks() {
        $this->load->model("model_get");
        $data["results"] = $this->model_get->getData('home');
        $this->load->view('header');
        $this->load->view('content_howitworks');
        $this->load->view('login');
        $this->load->view('register');
        $this->load->view('footer', $data);
    }

    public function send_email() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules("name", "الاسم", "required|xss_clean");
        $this->form_validation->set_rules("email", "البريد الالكترونى", "required|valid_email|xss_clean");
        $this->form_validation->set_rules("subject", "عنوان الرسالة", "required|xss_clean");
        $this->form_validation->set_rules("message", "الرسالة", "required|xss_clean");

        if ($this->form_validation->run() == FALSE) {

            $data['message'] = "";

            $this->load->view("header");
            $this->load->view("content_contact", $data);
            $this->load->view('login', $data);
            $this->load->view('register');
            $this->load->view("footer");
        } else {
            $data["message"] = "<div class='alert alert-success centrize' >لقد تم الارسال بنجاح</div><div class='clearfix'></div>";
            $this->load->library("email");
            $this->email->from(set_value("email"), set_value("name"));
            $this->email->to("dev@cubeadv.com");
            $this->email->subject(set_value("subject"));
            $this->email->message(set_value("message"));
            $this->email->send();
            $this->load->view("header");
            $this->load->view("content_contact", $data);
            $this->load->view('login');
            $this->load->view('register');
            $this->load->view("footer", $data);
        }
    }

    public function login() {
        $this->load->view('header');
        $this->load->view('register');
        $this->load->view('login');
        $this->load->view('footer');
    }

    public function register() {
        $this->load->view('header');
        $this->load->view('register');
        $this->load->view('login');
        $this->load->view('footer');
    }

    public function members() {
        if ($this->session->userdata('is_logged_in')) {
            $this->load->view('header');
            $this->load->view('members');
            $this->load->view('register');
            $this->load->view('login');
            $this->load->view('footer');
        } else {
            redirect('site/restricted');
        }
    }

    public function login_validation() {

        $this->load->library('form_validation');
        $this->form_validation->set_rules("email", "البريد الالكترونى", "required|valid_email|trim|callback_validate_credentials");
        $this->form_validation->set_rules("password", "كلمة المرور", "required|xss_clean|md5|trim");

        if ($this->form_validation->run()) {
            $data = array(
                'email' => $this->input->post('email'),
                'is_logged_in' => 1
            );
            $this->session->set_userdata($data);
            redirect('site/members');
        } else {
            $this->load->view('header');


            $data['message'] = "";
            $this->load->view('login');
            $this->load->view('myscript');
        }
    }

    public function register_validation() {

        $this->load->library('form_validation');
        $this->form_validation->set_rules("name", "الاسم", "required|trim");
        $this->form_validation->set_rules("email", "البريد الالكترونى", "required|valid_email|trim|is_unique[users.email]");
        $this->form_validation->set_rules("password", "كلمة المرور", "required|trim");
        $this->form_validation->set_rules("passwordc", "كلمة المرور التأكيدية", "required|trim|matches[password]");
        $this->form_validation->set_rules("address", "العنوان", "required|trim");
        $this->form_validation->set_rules("phone", "الموبايل", "required|trim");

        if ($this->form_validation->run()) {
            $this->load->model('model_users');
            $key = md5(uniqid()); //generate randum key
            $this->load->library('email', array('mailtype' => 'html'));
            $this->email->from('dev@cubeadv.com', 'Qatar Offers');
            $this->email->to($this->input->post('email'));
            $this->email->subject('Activate Your Account');
            $msg = '<h3>Thank You For Registeration on Qatar Offers </h3> <br>';
            $msg .= '<a href=' . base_url() . 'site/register_user/' . $key . '>just click HERE to Activate your Account</a>';
            $this->email->message($msg);
            if ($this->model_users->add_temp_user($key)) {
                if ($this->email->send()) {
                    $this->session->set_flashdata('message', 'لقد تم الارسال بنجاح');
                    redirect('site/qatar');
                } else {
                    $this->session->set_flashdata('message', 'برجاء التسجيل مرة اخرى');
                    redirect('site/qatar');
                }
            } else {
                
            }
        } else {
            $data['message'] = "";
            $this->load->view('header');
            $this->load->view('register');
            $this->load->view('myscript');
        }
    }

    public function register_user($key) {
        //check if the key is Valid
        $this->load->model('model_users');

        if ($this->model_users->is_key_valid($key)) {
            if ($newemail = $this->model_users->add_user($key)) {
                $this->session->set_flashdata('message', 'سوف تصلك رسائلنا بشكل دائم');
                redirect('site/qatar');
            } else {
                echo 'Faild to add user';
            }
        } else {
            echo "inValid key";
        }
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

    public function logout() {
        $this->session->sess_destroy();
        redirect('site/index');
    }

    public function restricted() {
        $this->load->view('header');
        $this->load->view('restricted');
        $this->load->view('register');
        $this->load->view('login');
        $this->load->view('footer');
    }

    public function seemoreweek($id) {
        $this->load->model('model_offers');
        $this->data['offers'] = $this->model_offers->seemoreweek($id);
        $this->load->view('header');
        $this->load->view('seemoreweek', $this->data);
        $this->load->view('footer');
    }

}