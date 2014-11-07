<?php

class Notifications_m extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	//@提醒someone
	public function notice_insert($pid,$suid,$nuid,$ntype){
		$notices=array(
			'pid'=>$pid,
			'suid'=>$suid,
			'nuid'=>$nuid,
			'ntype'=>$ntype,
			'ntime'=>time()
        );
        $this->db->insert('notifications',$notices);
	}

	public function get_notifications_list($nuid,$num){
		$this->db->select("a.*,b.title,c.username,c.avatar");
		$this->db->from('notifications a');
		$this->db->where('a.nuid',$nuid);
		$this->db->join('posts b','b.pid=a.pid','left');
		$this->db->join('users c','c.uid=a.suid','left');
		$this->db->order_by('a.ntime','desc');
		$this->db->limit($num);
		$query=$this->db->get();
		if($query->num_rows()>0){
			return $query->result_array();
		}

	}
}