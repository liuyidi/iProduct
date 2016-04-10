<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CB_Controller{

   function __construct(){
      parent::__construct();
      $this->load->model('user_m');
      $this->load->model('follow_m');
      $this->load->library('myclass');
   }

   public function userslist(){
      $data['title']='注册用户';
      $data['users']=$this->user_m->get_users();
      //var_dump($data);
      $this->load->view('userslist',$data);
      
   }

   //用户信息
   public function info($uid){
      
      $data=$this->user_m->get_user_by_id($uid);
      $data['title']=$data['username'].'的主页';
      //用户大头像
      $this->load->model('upload_m');
      $data['big_avatar']=$this->upload_m->get_avatar_url($uid,'big');

      //用户发布
      $this->load->model('post_m');
      $data['user_posts']=$this->post_m->get_posts_by_uid($uid,5);     

      //用户回复
      $this->load->model('comment_m');
      $data['user_comments']=$this->comment_m->get_comments_by_uid($uid,5);

      //判断session用户是否关注当前用户
      $uid2=$this->session->userdata('uid'); //登录的用户
      if($uid2 == $uid){
         $data['is_owner'] = true;
      }else{
         $data['is_owner'] = false;
         $data['is_followed']=$this->follow_m->check_follow($uid2,$uid);
      }


      //用户关注的人&用户的粉丝
      $data['followings'] = $this->follow_m->get_followings_by_uid($uid,10);
      //通过ids得到用户的详细信息


      $data['followers'] = $this->follow_m->get_followers_by_uid($uid,10);

      $this->load->view('user/userinfo',$data);
     
   }
   
   //用户设置
   //用户信息设置
   public function setinfo(){
      $data['title']='用户信息设置';
      $uid=$this->session->userdata('uid');
      $data['user']=$this->user_m->get_user_by_id($uid);

      $this->load->view('user/setinfo',$data);
   }

   //用户头像设置
   public function setavatar(){
      $data['title']='用户头像设置';
      $this->load->view('user/setavatar',$data);
   }
  
   //用户密码设置
   public function setpwd(){
      $data['title']='用户密码设置';
      $this->load->view('user/setpwd',$data);
   }

   //绑定账号
   public function setbind(){
      $data['title']='绑定账号';
      $this->load->view('user/setbind',$data);
   }

   //用户注册
   public function reg(){
      $this->load->helper('form');

      $data['title']='注册新用户';
      if($this->session->userdata('is_login')){
         $this->myclass->notice('alert("已登录,请退出再注册");window.location.href="'.site_url().'";');
         exit();
      }
      if($_POST && $this->validate_reg_form()){
         $password=$this->input->post('password',true);
         $data=array(
            'username'=>strip_tags($this->input->post('username')),
            'password'=>md5($password),
            'email'=>$this->input->post('email',true),
            'ip'=>$this->input->ip_address(),
            'regtime'=>time(),
            'status'=>1,
            'group'=>3

            );
         $check_email=$this->user_m->check_email($data['email']);
         $check_username=$this->user_m->check_username($data['username']);

         //$captcha=$this->input->post('captcha_code');

         if(!empty($check_email)){
            $this->myclass->notice('alert("邮箱已注册，请换一个邮箱！");history.back();');
         }else if(!empty($check_username)){
               $this->myclass->notice('alert("用户名已存在！");history.back();');
               }else if($this->input->post('repassword')!=$password){
                           $this->myclass->notice('alert("密码输入不一致!!");history.back();');
               }else{
                  if($this->user_m->reg($data)){
                            $uid=$this->db->insert_id();
                            $this->session->set_userdata(array('uid'=>$uid,'username'=>$data['username'],'password'=>$data['password'],'email'=>$data['email'],'is_login'=>1));
                           //去除session
                            $this->session->unset_userdata('yzm');
                  }
                  redirect();
               }
      }else{
            $this->load->view('user/reg',$data);
      }
   }

   /*public function username_check($username){

   }*/


   //表单验证
   private function validate_reg_form(){
      $this->load->library('form_validation');
      
      $this->form_validation->set_rules('email','邮箱','trim|required|min_length[3]|max_length[50]|valid_email');
      $this->form_validation->set_rules('username','昵称','trim|required|min_length[2]|max_length[20]|callback_username_check|xss_clean');
      $this->form_validation->set_rules('password','用户密码','trim|required|min_length[6]|max_length[40]|matches[repassword]');
      $this->form_validation->set_rules('repassword', '确认密码' , 'trim|required|min_length[6]|max_length[40]');
      $this->form_validation->set_message('required', "%s 不能为空！");
      $this->form_validation->set_message('min_length', "%s 最小长度不少于 %s 个字符或汉字！");
      $this->form_validation->set_message('max_length', "%s 最大长度不多于 %s 个字符或汉字！");
      $this->form_validation->set_message('matches', "两次密码不一致");
      $this->form_validation->set_message('valid_email', "邮箱格式不对");
      if($this->form_validation->run()==false){
         return false;
      }else{
         return true;
      }
   }

   //用户登录
   public function login(){
      $data['title']='用户登录';
      //$data['referer']=$this->input->get('referer',true);

      //$data['referer']=$data['referer']?$data['referer']:$this->input->server('HTTP_REFERER');

      if($this->session->userdata('is_login')){
         redirect();
      }
      if($_POST){
         $email=$this->input->post('email',true);
         $password=$this->input->post('password',true);
         $data=$this->user_m->check_login($email,$password);
         //验证码暂时忽略
         if(count($data)){
            $this->session->set_userdata(array('uid'=>$data['uid'],'username'=>$data['username'],'password'=>$data['password'],'email'=>$data['email'],'is_login'=>1));
            //header("location:".$data['referer']);
            redirect();
            exit;
         }else{
            $this->myclass->notice('alert("邮箱或密码错误！");history.back();');           
         }
      }else{
         $this->load->view('user/login',$data);
      }
   }

   //用户登出
   public function logout(){
      $this->session->sess_destroy();

      $this->load->helper('cookie');
      delete_cookie('uid');
      delete_cookie('username');
      delete_cookie('password');
      delete_cookie('email');
      delete_cookie('is_login');
      
      Header("Location:".site_url('user/login'));
      exit;
   }

   //找回密码


   //重置密码



}