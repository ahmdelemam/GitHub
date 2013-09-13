<?php

class Model_offers extends CI_Model {

    function add_offer($name, $price, $text1, $text2, $image) {
        $data = array(
            'offer_name' => $name,
            'offer_price' => $price,
            'offer_text1' => $text1,
            'offer_text2' => $text2,
            'image' => $image,
        );
        $added = $this->db->insert('offerdata', $data);
        if ($added) {
            $this->session->set_flashdata('message', 'لقد تم الاضافة بنجاح');
            return true;
        } else {
            $this->session->set_flashdata('message', 'لم يتم الاضافة بنجاح');
            return false;
        }
    }

    function add_weekoffer($name, $price, $details, $image) {
        $data = array(
            'name' => $name,
            'price' => $price,
            'details' => $details,
            'image' => $image,
        );
        $added = $this->db->insert('weekoffers', $data);
        if ($added) {
            $this->session->set_flashdata('message', 'لقد تم الاضافة بنجاح');
            return true;
        } else {
            $this->session->set_flashdata('message', 'لم يتم الاضافة بنجاح');
            return false;
        }
    }

    function get_offers() {
        return $this->db->get('offerdata')->result();
    }

    public function record_count() {
        return $this->db->count_all("offerdata");
    }

    function seemore($id) {
        $query = $this->db->where('id', $id);
        return $this->db->get('offerdata')->result();
    }

    function seemoreweek($id) {
        $query = $this->db->where('id', $id);
        return $this->db->get('weekoffers')->result();
    }

    function delete($id) {
        $query = $this->db->where('id', $id);
        if ($this->db->delete('offerdata')) {
            $this->session->set_flashdata('message', 'لقد تم الحذف بنجاح');
        }
    }

    function delete_weekoffer($id) {
        $query = $this->db->where('id', $id);
        if ($this->db->delete('weekoffers')) {
            $this->session->set_flashdata('message', 'لقد تم الحذف بنجاح');
        }
    }

    public function fetch_countries($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get("offerdata");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function delete_all() {
        $this->db->empty_table('pagination_photos');
    }

    public function edit_pagination($head_text1, $head_text2, $image1, $image2, $image3) {
        $data = array(
            'headtext1' => $head_text1,
            'headtext2' => $head_text2,
            'center_image' => $image1,
            'left_image' => $image2,
            'right_image' => $image3,
        );
        $added = $this->db->insert('pagination_photos', $data);
        return true;
    }

    function get_pagination_photos() {
        return $this->db->get('pagination_photos')->result();
    }

    public function get_all_weekoffer() {
        $this->db->order_by("id", "desc");
        return $this->db->get('weekoffers')->result();
    }

}