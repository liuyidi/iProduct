<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notifications extends CB_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->library('myclass');
		$this->load->model('notifications_m');
		$uid=$this->session->userdata('uid');

	}

	public function index(){
		$data['notices_list']=$this->notifications_m->get_notifications_list($this->session->userdata('uid'),20);
		$data['title']='提醒用户';
		$this->load->view('notifications',$data);
		//删除数据
		if($data['notices_list']){
			$this->db->where('nuid',$this->session->userdata('uid'))->delete('notifications');
			$this->db->where('uid',$this->session->userdata('uid'))->update('users',array('notices'=>0));
		}

	}

	public function del($pid){
		$uid=$this->session->userdata('uid');
		
	}
}