<?php

class Model_flyer extends CI_Model {

    public function insert($name, $image) {
        $data = array('name' => $name, 'logo' => $image);
        $this->db->insert('flyers', $data);
        return $this->db->insert_id();
    }

    //select flyer and one image from flyer_images table
    public function get_all_flyers() {

        $query = $this->db->query('SELECT  `flyer_id` , `logo`,  `flyer_name` ,  `flyer_date` ,  `flyer_image_id` ,  `flyer_image` 
FROM (

SELECT  `flyers`.`id` AS  `flyer_id` , `flyers`.`logo` AS  `logo` ,  `flyers`.`name` AS  `flyer_name` ,  `flyers`.`date` AS  `flyer_date` ,  `flyer_images`.`id` AS  `flyer_image_id` ,  `flyer_images`.`image` AS `flyer_image` 
FROM  `flyers` 
LEFT OUTER JOIN  `flyer_images` ON  `flyers`.`id` =  `flyer_images`.`flyer_id` 
ORDER BY RAND( )
) AS  `ok` 
GROUP BY  `flyer_id` 
ORDER BY  `flyer_id` DESC');
        return $query->result();
    }

    public function get_count() {
        $query = $this->db->query('SELECT  `flyer_id` ,  `flyer_name` ,  `flyer_date` ,  `flyer_image_id` ,  `flyer_image` 
FROM (

SELECT  `flyers`.`id` AS  `flyer_id` ,  `flyers`.`name` AS  `flyer_name` ,  `flyers`.`date` AS  `flyer_date` ,  `flyer_images`.`id` AS  `flyer_image_id` ,  `flyer_images`.`image` AS `flyer_image` 
FROM  `flyers` 
LEFT OUTER JOIN  `flyer_images` ON  `flyers`.`id` =  `flyer_images`.`flyer_id` 
ORDER BY RAND( )
) AS  `ok` 
GROUP BY  `flyer_id` 
ORDER BY  `flyer_id` DESC');
        return $query->num_rows();
    }

    public function fetch_pagination($limit, $start) {
        $sql = "SELECT  `flyer_id` , `logo`,  `flyer_name` ,  `flyer_date` ,  `flyer_image_id` ,  `flyer_image` 
FROM (

SELECT  `flyers`.`id` AS  `flyer_id` , `flyers`.`logo` AS  `logo` ,  `flyers`.`name` AS  `flyer_name` ,  `flyers`.`date` AS  `flyer_date` ,  `flyer_images`.`id` AS  `flyer_image_id` ,  `flyer_images`.`image` AS `flyer_image` 
FROM  `flyers` 
LEFT OUTER JOIN  `flyer_images` ON  `flyers`.`id` =  `flyer_images`.`flyer_id` 
ORDER BY RAND( )
) AS  `ok` 
GROUP BY  `flyer_id` 
ORDER BY  `flyer_id` DESC 
LIMIT ?, ?";
        $query = $this->db->query($sql, array(intval($start), intval($limit)));
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    function get_index_photos() {
        return $this->db->get('pagination_photos')->result();
    }

    public function get_one($id) {
        $this->db->select()->from('flyer_images')->where('flyers.id', $id);
        $this->db->join('flyers', 'flyer_images.flyer_id = flyers.id', 'left outer');

        return $this->db->get()->result();

        //return $this->db->get()->first_row('array');
    }

    public function get_last_one() {
        $this->db->select('flyers')->from()->order_by('date', 'desc')->limit(1);
        return $this->db->get()->result();
    }

    //delete flyer and related images
    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('flyers');
        $this->db->where('flyer_id', $id);
        $this->db->delete('flyer_images');
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('flyers', $data);
    }

}