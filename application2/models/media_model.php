<?php

class Media_Model extends CI_Model{
    
    function __construct(){
        // Call the Model constructor
        parent::__construct();
    }
    
    public function getAll(){
        $query = $this->db->get('media');
        return $query->result();
    }
	public function getLastTen(){
		$this->db->order_by("id", "desc");
		$this->db->limit(10);
        $query = $this->db->get('media');
        return $query->result();
    }
	public function getCategory($category){
		$this->db->where('category',$category);
        $query = $this->db->get('media');
        return $query->result();
    }
    public function getOne($news_id){
        $this->db->select()->from('news')->where('id', $news_id);
        $query = $this->db->get();
        return $query->result();
    }
	public function getOneMedia($id){
        $this->db->select()->from('news')->where('id', $news_id);
        $query = $this->db->get();
        return $query->result();
    }
	public function getFrame(){
		$this->db->order_by('id', "desc");
		$this->db->limit(1);
        $query = $this->db->get('frame');
        return $query->result();
    }
}

?>
