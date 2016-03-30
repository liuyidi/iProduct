<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Usertest extends MY_Controller{
    
	public function index(){
        //加载模型， 别名
        $this->load->model('User_model','user');
        $list=$this->user->getAll();

		$list=array(
               array('id' => 1,'username' => '一流的人', 'email' => '928171466@qq.com' ),
               array('id' => 2,'username' => '一流的人111', 'email' => 'lyd928171466@gmail.com' ),
               array('id' => 3,'username' => '一流的人要好好学习', 'email' => 'l928171466@163.com' )
        	);
		$data['title']='Welcome to CodeIgniter!';
		$data['list']=$list;
        //分配变量
        //$this->load->vars('title','');
        
        $this->load->vars($data);

        $this->load->view('public/header');   

		$this->load->view('user/index');

		$this->load->view('public/footer');
	}

    public function showusers(){

    	$this->load->database();
    	$sql='select * from blog_user';
    	$result=$this->db->query($sql);
    	$users=$result->result();
       
        var_dump($users);
        
    }
    public function get(){
        $bool=$this->db->get('user');
        var_dump($bool);
    }

    public function insert(){
        $data=array(
            'email'=>'liuyidi@diancreate.com',
            'password'=>md5('l07284635662yd'),
        );

        $this->db->insert('user',$data);
    }

   public function update(){
        $data=array(
            'email'=>'liuyidi@diancreate.com',
            'password'=>md5('l07284635662yd'),
        );

        $bool=$this->db->update('user',$data,array('id'=>3));
        var_dump($bool);
   }

   public function delete(){

        $bool=$this->db->update('user',array('id'=>3));
        var_dump($bool);
   }
 
   public function select(){
        $bool=$this->db->select('id,name')
              ->from('user')
              ->where('id >=',3)
              ->limit(2,3)  //跳过2条，取出3条
              ->order_by('id desc')
              ->get();

        var_dump($bool->result());
   }

   public function test(){

      //装载类文件
      $this->load->library('pagination');
      $this->load->helper('url');
      //每页显示10条数据
      $page_size=10;
      //设置基本属性
      $config['base_url']=site_url('user/test');
      $config['total_rows']=100;
      $config['per_page']=$page_size;
      $config['first_link']='首页';
      $config['prev_link'] ='上一页';
      $config['next_link']='下一页';
      $config['last_link']='最后一页';
      $config['use_page_numbers'] = TRUE;

      //设置标签基本属性
      $config['full_tag_open'] = '<ul class="pagination">'; 
      $config['full_tag_close'] = '</ul>'; 
     
      $config['first_tag_open'] = '<li>';
      $config['first_tag_close'] = '</li>';
      $config['prev_tag_open'] = '<li>';
      $config['prev_tag_close'] = '</li>';
      $config['next_tag_open'] = '<li>';
      $config['next_tag_close'] = '</li>';
      $config['last_tag_open'] = '<li>';
      $config['last_tag_close'] = '</li>';

      $config['num_tag_open'] = '<li>';
      $config['num_tag_close'] = '</li>';

      $config['cur_tag_open'] = '<li class="active"><a>';
      $config['cur_tag_close'] = '</a></li>';
          
      $this->pagination->initialize($config);
      $offset=intval($this->uri->segment(3));
      $sql="select * from blog_user limit $offset,$page_size";
      echo $sql;

      $data['links']=$this->pagination->create_links();
      
      $this->load->view('test',$data);
      
   }


   //文件上传
   public function file(){
      $this->load->helper('url');
      $this->load->view('user/file');
   }

   public function upload(){
      $config['upload_path']='./uploads/';
      $config['allowed_types']='gif|png|jpg|jpeg';
      $this->load->library('upload',$config);
      $this->upload->do_upload('pic');

      var_dump($this->upload->data());
   }
   

   //Session
   public function login(){

      $this->load->library('session');
      $user=array("name"=>"liuyidi","passwosd"=>"928171466");
      $this->session->set_userdata('user',$user);

   }

   public function show_session(){

      $this->load->library('session');
      $user=$this->session->userdata('user');
      var_dump($user);
   }

   public function md(){
      echo md5('l07284635662yd');
   }

}

?>