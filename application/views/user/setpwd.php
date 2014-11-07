<?php $this->load->view('public/header'); ?>

<div class="container main">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default index-topic-list">
            <div class="panel-heading">
               <ul class="breadcrumb" >
                  <li><a href="">首页</a><span class="divider">&nbsp;&nbsp;</span></li>
                  <li><a href="#">&nbsp;&nbsp;设置</a></li>
               </ul>
            </div>
            <div class="panel-body">
               <ul class="nav nav-tabs">
                  <li ><a href="<?php echo site_url('user/setinfo');?>">个人资料</a></li>
                  <li><a href="<?php echo site_url('user/setavatar');?>">设置头像</a></li>
                  <li class="active"><a href="<?php echo site_url('user/setpwd');?>">修改密码</a></li>
                  <li><a href="<?php echo site_url('user/setbind');?>">绑定账号</a></li>
               </ul>
               <div class="inner">
                  
               </div><!--inner-->
            </div>
        </div>   
      </div>
    </div><!--row-->
</div><!--container-->

<?php $this->load->view('public/footer'); ?>