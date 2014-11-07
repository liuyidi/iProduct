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
                  <li  class="active"><a href="<?php echo site_url('user/setinfo');?>">个人资料</a></li>
                  <li><a href="<?php echo site_url('user/setavatar');?>">设置头像</a></li>
                  <li><a href="<?php echo site_url('user/setpwd');?>">修改密码</a></li>
                  <li><a href="<?php echo site_url('user/setbind');?>">绑定账号</a></li>
               </ul>
               <div class="inner">
                    <form accept-charset="UTF-8" action="<?php echo site_url('user/setinfo');?>" class="simple_form form-horizontal" id="edit_user_313" method="post" novalidate="novalidate">
                        <div class="control-group string required disabled">
                            <label class="string required control-label" for="user_nickname">用户名</label>
                            <div class="controls">
                                <input class="string required disabled" disabled="disabled" id="user_nickname" name="username" size="50" type="text" value="<?=$user['username']?>">
                            </div>
                        </div>
                        <div class="control-group email optional">
                            <label class="email optional control-label" for="user_email">电子邮件</label>
                            <div class="controls">
                                <input class="string email optional" id="user_email" name="email" size="50" type="email" value="<?=$user['email']?>">
                            </div>
                        </div>
                        <div class="control-group string optional">
                            <label class="string optional control-label" for="user_account_attributes_personal_website">个人网站</label>
                            <div class="controls">
                                <input class="string optional" id="user_account_attributes_personal_website" name="homepage" size="50" type="text" value="http://www.365chujian.com">
                            </div>
                        </div>
                        <div class="control-group string optional">
                            <label class="string optional control-label" for="user_account_attributes_signature">QQ</label>
                            <div class="controls">
                                <input class="string optional" id="user_account_attributes_signature" name="qq" size="50" type="text" value="928171466">
                            </div>
                        </div>
                        <div class="control-group string optional">
                            <label class="string optional control-label" for="user_account_attributes_signature">签名</label>
                            <div class="controls">
                                <input class="string optional" id="user_account_attributes_signature" name="signature" size="50" type="text" value="<?=$user['description']?>">
                            </div>
                        </div>
                        <input id="user_account_attributes_id" name="user[account_attributes][id]" type="hidden" value="326">
                        <div class="form-actions">
                            <input class="btn btn-small btn-primary" name="submit" type="submit" value="保存设置">
                        </div>
                    </form>
               </div><!--inner-->
            </div>
        </div>   
      </div>
    </div><!--row-->
</div><!--container-->

<?php $this->load->view('public/footer'); ?>