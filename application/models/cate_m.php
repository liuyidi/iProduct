<?php

class Cate_m extends CI_Model{
	function __construct(){
		parent::__construct();
	}

    /*
     * 获取所有的分类
     */
    public function get_all_cates(){

    }

	/*
	 * 根据pid(产品ID)得到该产品的所有分类
	 */
    public function get_cates_by_pid($pid){
    	$this->db->select('cid,pid,cname,listnum');
    	$query=$this->db->where('pid',$pid)->get('categories');
    	return $query->result_array();
    }

    
}

?>