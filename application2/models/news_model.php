<?php

class News_Model extends CI_Model{
    
    function __construct(){
        // Call the Model constructor
        parent::__construct();
    }
    public function add($title, $content, $date, $image){
        $data = array(
            'title'=>$title,
            'content'=>$content,
            'date'=>$date,
            'image'=>$image,
          );
         $this->db->insert('news', $data);
         return $this->db->insert_id();
    }
    public function edit($news_id, $data){
        
        $this->db->where('id',$news_id);
        $this->db->update('news',$data);
    }
    public function delete($news_id){
        $this->db->where('id',$news_id);
        $this->db->delete('news');
    }
    public function getAll(){
        $query = $this->db->get('news');
        return $query->result();
    }
	public function getLastTen(){
		$this->db->order_by("id", "desc");
		$this->db->limit(10);
        $query = $this->db->get('news');
        return $query->result();
    }
    public function getOne($news_id){
        $this->db->select()->from('news')->where('id', $news_id);
        $query = $this->db->get();
        return $query->result();
    }
}

?>
