<?php

class Model_users extends CI_Model {

    public function can_log_in() {
        /*
          @param1 table name
          @param2 where condition
         */
        $this->db->where("email", $this->input->post("email"));
        $this->db->where("password", md5($this->input->post("password")));
        $query = $this->db->get('users');

        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function add_temp_user($key) {
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password')),
            'address' => $this->input->post('address'),
            'phone' => $this->input->post('phone'),
            'key' => $key
        );
        $query = $this->db->insert('temp_users', $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function is_key_valid($key) {
        $this->db->where('key', $key);
        $query = $this->db->get('temp_users');
        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function add_user($key) {
        $this->db->where('key', $key);
        $temp_user = $this->db->get('temp_users');
        if ($temp_user) {
            $row = $temp_user->row();
            $data = array(
                'name' => $row->name,
                'email' => $row->email,
                'password' => $row->password,
                'phone' => $row->phone,
                'address' => $row->address
            );
            $insert_to_users_table = $this->db->insert('users', $data);
        }
        if ($insert_to_users_table) {
            $this->db->where('key', $key);
            $this->db->delete('temp_users');
            return true; // for the session
        } else {
            return false;
        }
    }

    public function get_users_email() {
        $this->db->select('email');
        return $this->db->get('users')->result();
    }

}