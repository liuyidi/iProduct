<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment extends CB_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library('myclass');
		$this->load->library('session');
		$this->uid=$this->session->userdata('uid');
	}

	public function add_comment(){
		if(empty($this->uid)){
			$this->myclas->notice('alert("请登录以后再发表评论");window.location.href="'.site_url('user/login').'";');
		}else{
		//数据提交
		$data=array(
            'content'=>$this->input->post('content'),
            'pid'=>$this->input->post('pid'),
            'uid'=>$this->uid,
            'replytime'=>time()
			);
		//数据返回
		$query=$this->db->select('comments')->get_where('posts',array('pid'=>$data['pid']))->row_array();
		//$this->load->helper(''); //???????????????????
		$callback=array(
            'content'=>$this->input->post('content'),
            'pid'=>$data['pid'],
            'uid'=>$data['uid'],
            'replytime'=>time(),
            'username'=>$this->input->post('username'),
            'avatar'=>$this->input->post('avatar')

		    );

        //入库
        $this->load->model('comment_m');
        $this->comment_m->add_comment($data);
        
        //更新回复数，最后回复用户，最后回复时间，更新时间，ord时间
        $this->load->model('post_m');
        $this->db->set('ruid',$this->session->userdata('uid'),FALSE)->set('comments','comments+1',FALSE)->set('lastreply',time(),FALSE)->where('pid',$this->input->post('pid'))->update('posts');

        //更新用户回复数
        $this->db->set('replies','replies+1',FALSE)->where('uid',$this->uid)->update('users');

        
		}
	}


}