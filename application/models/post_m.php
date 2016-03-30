<?php

class Post_m extends CI_Model{
	function __construct(){
		parent::__construct();
	}
    
    //
    public function get_post_list($uid,$num){

    }

    //得到所有帖子
    public function get_posts(){
        $this->db->select('a.pid,a.cid,a.uid,a.title,a.content,a.addtime,a.updatetime,a.commentsnum,a.praisesnum,a.site_url,c.username');
        $this->db->from('posts a');
        $this->db->join('users c','c.uid=a.uid');
        /*
        if($ord=='new'){
            $this->db->order_by('uid','desc');
        }*/
        //$this->db->limit($limit,$page); 
        $query=$this->db->get();
        if($query->num_rows()>0){
            return $query->result_array();
        }
    }
    
    //根据贴子ID得到帖子
    public function get_post_by_pid($pid){
    	$this->db->select('posts.*,users.username,users.avatar');
        //$this->db->from('posts');
    	$this->db->join('users','users.uid=posts.uid');
    	$query=$this->db->where('pid',$pid)->get('posts');
    	return $query->row_array();
    }

    //根据用户ID得到帖子所有信息
    public function get_posts_by_uid($uid,$num){
        $this->db->select('posts.*,b.username as rname');
        $this->db->from('posts');
        $this->db->where('posts.uid',$uid);
        $this->db->join('users b','b.uid=posts.uid','left');
        //暂时不加入categories
        $this->db->limit($num);
        //$this->db->order_by('updatetime','desc');
        $query=$this->db->get();
        return $query->result_array();
    	
    }

    //添加模型
    public function add($data){
    	$this->db->insert('posts',$data);
    	return($this->db->affected_rows()>0) ? TRUE:FALSE;
    }
}

?>