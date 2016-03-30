<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Home extends CB_Controller{

	function __construct(){
		parent::__construct();

		$this->load->model('post_m');
		$this->load->model('cate_m');

	}
    
    //首页
	public function index(){
     $data['title']='产品title';
     $this->load->view('home',$data);
	}

    //搜索功能
	public function search(){
       $data['s']=$this->input->get('s',TRUE);
       $data['title']='搜索';
       $this->load->view('search',$data);
	}

	//分页功能
	public function page($page=1){

      //每页显示10条数据
      $page_size=10;

      //设置基本属性
      $config['base_url']=site_url('posts/p');
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

      //装载类文件
      $this->load->library('pagination');
      $this->load->helper('url');
      $this->pagination->initialize($config);

      $offset=intval($this->uri->segment(3));
      $sql="select * from blog_user limit $offset,$page_size";
      echo $sql;

      $data['links']=$this->pagination->create_links();
      
      $this->load->view('test',$data);

	}


}