<?php

class Cate_m extends CI_Model{
	function __construct(){
		parent::__construct();
	}
    
    public function get_all_cates(){

    }

    public function get_cates_by_pid($id){
    	$this->db->select('cid,pid,cname,listnum');
    	$query=$this->db->where('pid',$pid)->get('categories');
    	return $query->result_array();
    }

    
}

?>