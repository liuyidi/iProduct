<?php
class Comment_m extends CI_Model{
	function __construct(){
		parent::__construct();
	}
    
    //添加评论
    public function add_comment($data){
    	$this->db->insert('comments',$data);
    }

    //获取评论
    public function get_comment($page,$limit,$pid,$order='desc'){
    	$this->db->select('comments.*,u.uid,u.username,u.avatar,u.description');
    	$query=$this->db->from('comments')
    	->where('pid',$pid)
    	->join('users u',"u.uid=comments.uid")
    	->order_by('comments.replytime',$order)
    	->limit($limit,$page)
    	->get();
    	return $query->result_array();

    }
    
    //根据用户ID获取该用户所有评论
	public function get_comments_by_uid($uid,$num){
		$this->db->select('c.*,p.pid,p.title,p.addtime,u.uid,u.username');
		$this->db->from('comments c');
		$this->db->where('c.uid',$uid);
		$this->db->join('posts p','p.pid=c.pid','left'); //left?
		$this->db->join('users u','u.uid=p.uid');  //把用户。帖子。评论连接在一起
		$this->db->limit($num);
		$this->db->order_by('replytime','desc');
		$query=$this->db->get();
		return $query->result_array();
		
	}
    
    //根据帖子ID得到所有评论
	function get_comments_by_pid($pid){
        $this->db->select('c.*,p.pid,p.title,p.addtime,u.uid,u.username');
		$this->db->from('comments c');
		$this->db->where('c.pid',$pid);
		$this->db->join('posts p','p.pid=c.pid','left'); //left?
		$this->db->join('users u','u.uid=c.uid');  //把用户。帖子。评论连接在一起
		$this->db->order_by('replytime','desc');
		$query=$this->db->get();
		return $query->result_array();
	}

	//根据评论ID得到该评论
	function get_comment_by_id($id){
		$this->db->select('id,pid,content')->where('id',$id);
		$query=$this->db->get('comments');
		return $query->row_array();
	}

	//根据帖子ID删除所有评论
	function del_comments_by_pid($pid,$uid){
		$this->db->where('pid',$pid)->delete('comments');
		//更新用户中的回复数
		$rnum=mysql_affected_rows();
		$replies=$this->db->select('replies')->get_where('users',array('uid'=>$uid))->row_array();
		$this->db->where('uid',$uid)->update('users',array('replies'=>$replies['replies']-$rnum));
		return($this->db->affected_rows()>0)?TRUE:FALSE;
	}
}