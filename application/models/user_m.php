<?php
  class User_m extends CI_Model{

  	function __construct(){
  		parent::__construct();
  	}
     
    //注册
    function reg($data){
    	return $this->db->insert('users',$data);
    } 

    //检测注册的邮箱和用户名
    function check_email($email){
    	$query=$this->db->get_where('users',array('email'=>$email));
    	return $query->row_array();
    }
    function check_username($username){
    	$query=$this->db->get_where('users',array('username'=>$username));
    	return $query->row_array();
    }

    //检测登录
    function check_login($email,$password){
    	$query=$this->check_email($email);
    	$password=md5($password);
    	if($query['password']==$password){
    		$this->db->where('uid',@$query['uid'])
    		         ->update('users',array('lastlogin'=>time()));
            return $query;
    	}

    }
    

    //用户个人设置
    function update_user($uid,$data){
    	$this->db->where('uid',$uid);
    	$this->db->update('users',$data);
    	return($this->db->affected_rows()>0)?TRUE:FALSE;
    }

    function update_pwd($data){
    	$this->db->where('uid',$data['uid']);
    	$this->db->where('password',$data['password']);
    	$this->db->update('users',array('password'=>$data['newpassword']));
    	return $this->db->affected_rows();
    }

    function update_avatar($avatar,$uid){
    	$this->db->where('uid',$uid);
    	$this->db->update('users',array('avatar'=>$avatar));
    }

    //返回所有用户
    public function get_users(){
        $this->db->select('uid,username,email,group,description,ip,lastlogin');
        $this->db->from('users');
        //$this->db->order_by('uid','desc');
        /*
        if($ord=='new'){
        	$this->db->order_by('uid','desc');
        }

        if($ord=='hot'){
        	$this->db->order_by('lastlogin','desc');
        }
        $this->db->limit($limit);
        */
        $query=$this->db->get();
        if($query->num_rows()>0){
        	return $query->result_array();
        }
    }
    
    //得到用户信息
    //用户ID
    public function get_user_by_id($uid){
    	$query=$this->db->get_where('users',array('uid'=>$uid));
    	return $query->row_array();
    }


  }
?>