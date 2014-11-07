<?php
class Post extends CB_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('user_m');
		$this->load->model('post_m');
		$this->load->model('cate_m');
		$this->load->library('myclass');
	}


	public function plist($cid,$page=1){
		//权限
		if(0){ //$this->auth->user_permit($cid)
			$this->myclass->notice('alert("您无权限不能访问此节点);window.location.href="'.site_url('/').'";');
		}else{
			
	        //分页
            


            //每页显示10条数据
            $page_size=10;
            //设置基本属性
            $config['base_url']=site_url('post/plist/'.$cid);
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
          
            //加载文件    
            $this->load->library('pagination');    
            $this->pagination->initialize($config);
            
            //偏移量
            $offset=intval($this->uri->segment(3));
            $sql="select * from cb_posts limit $offset,$page_size";
            echo $sql;

            $data['links']=$this->pagination->create_links();
            

            $this->load->view('plist',$data);
      

		}

	}

    //展示所有文章
    public function all(){
        $data['title']='所有文章';
        $data['posts']=$this->post_m->get_posts();
        $this->load->view('posts',$data);
    }

    //展示详情页
	public function show($pid=1){
        
		$content=$this->post_m->get_post_by_pid($pid);
		if(!$content){
			$this->myclass->notice('alert("帖子不存在");window.location.href="'.site_url('/').'";');
			exit();
		}else{
			$content=$this->post_m->get_post_by_pid($pid);
            //取出数据
			$content['content']=stripslashes($content['content']);
			$content['content']=str_replace('&lt;pre&gt;', '<pre>', $content['content']);
			$content['content']=str_replace('&lt;/pre&gt;', '</pre>', $content['content']);

			$data['content']=$content;
            $data['title']=$content['title'];
			//更新浏览数
			//$this->db->where('pid',$content['pid'])->update('posts',array('views'=>$content['views']+1));
            
            //获取评论
            $this->load->model('comment_m');
            $uid=$this->session->userdata('uid');
            $data['comment']=$this->comment_m->get_comments_by_pid($pid,$uid);

		    $this->load->view('show', $data);

		}
	}

	//添加信息
	public function add(){
		$this->load->helper('form');



		$data['title']='发布产品';
		$uid=$this->session->userdata('uid');
		$user=$this->user_m->get_user_by_id($uid);
		if(!$this->session->userdata('is_login')){
			redirect('user/login');
		}else{      //可加入分类权限和时间发表权限
			if($_POST&&$this->validate_add_form()){
				$data=array(
                    'title'=>$this->input->post('title',true),
                    'content'=>$this->input->post('content'),
                    'site_url'=>$this->input->post('site_url'),
                    //'cid'=>$cid,
                    'uid'=>$uid,
                    'addtime'=>time(),
                    'updatetime'=>time()

				);
				//可在此处加入审核
                //可加入标签tag
               // if($this->post_m->add($data)){
                	//最新帖子ID
                	//$new_fid=$this->db->insert_id();

                	//分类
                	//$cid=$this->input->post('cid');
                	//$category=$this->cate_m->get_category_by_cid($id);
                	//$this->db->where('cid',$cid)->update('categories',array('listnum')=>$category['listnum']+1));
                     
                    //可加入更新帖子时间
                

                //exit();
                //}
                $this->post_m->add($data);
                
			}

		}
		//$data['category'] = $this->cate_m->get_all_cates();
		//开启storage config
		//$this->load->config('qiniu');
		$this->load->view('add',$data);                
      
	}


	//表单验证
    private function validate_add_form(){
      $this->load->library('form_validation');
      
      $this->form_validation->set_rules('title','产品名称','trim|required|min_length[3]|max_length[50]');
      $this->form_validation->set_rules('content','产品内容','trim|required|min_length[2]|max_length[20]|callback_username_check|xss_clean');
      $this->form_validation->set_rules('site_url', '产品链接' , 'trim|required|min_length[3]|max_length[50]');
      $this->form_validation->set_rules('cid', '类别' , 'trim|required');

      $this->form_validation->set_message('required', "%s 不能为空！");
      $this->form_validation->set_message('min_length', "%s 最小长度不少于 %s 个字符或汉字！");
      $this->form_validation->set_message('xss_clean', "%s 非法字符！");
      $this->form_validation->set_message('max_length', "%s 最大长度不多于 %s 个字符或汉字！");
      $this->form_validation->set_message('matches', "两次密码不一致");
      if($this->form_validation->run()==false){
         return false;
      }else{
         return true;
      }
    }



}