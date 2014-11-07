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
                  <li><a href="<?php echo site_url('user/setinfo');?>">个人资料</a></li>
                  <li class="active"><a href="<?php echo site_url('user/setavatar');?>">设置头像</a></li>
                  <li><a href="<?php echo site_url('user/setpwd');?>">修改密码</a></li>
                  <li><a href="<?php echo site_url('user/setbind');?>">绑定账号</a></li>
               </ul>
               <div class="inner">
                  <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{:U('User/uploadAvatar')}" >
                     <fieldset>
                        <div class="form-group">
                  <label class="col-sm-3 control-label">当前头像</label>
                  <div class="col-sm-8">
                     <p>
                     <php> if ($info!=null){ </php>
                        <img class="large_avatar" width="100" height="100" src="__ROOT__/Uploads/thumb_{$info.avatar}"/>
                        <img class="middle_avatar" width="60" height="60" src="__ROOT__/Uploads/thumb_{$info.avatar}"/>
                        <img class="small_avatar" width="40" height="40" src="$__ROOT__/Uploads/thumb_{$info.avatar}"/>
                     <php> } else { </php>
                     <img class="large_avatar" src="__ROOT__/Uploads/avatar/avatar_large.jpg"/>
                        <img class="middle_avatar" src="__ROOT__/Uploads/avatar/default.jpg"/>
                        <img class="small_avatar" src="__ROOT__/Uploads/avatar/avatar_small.jpg"/>
                     <php> } </php>    
                     </p>
                     
                     <p class="alert alert-info">
                        <strong>注意:</strong> 支持 500k 以内的 PNG / GIF / JPG 图片文件作为头像，推荐使用正方形的图片以获得最佳效果。
                     </p>
                  </div>
            </div>
            
            <div class="form-group">
                  <label class="col-sm-3 control-label" for="avatar_file">选择图片</label>
                  <div class="col-sm-5">
                     <input type="file" id="avatar_file"  name="userfile" />
                  </div>
            </div>
            
            <div class="form-group">
               <div class="col-sm-offset-3 col-sm-9 text-center">
               <button type="submit" name="upload" class="btn btn-sm btn-primary">上传新头像</button>
               </div>
            </div>
                     </fieldset>
                  </form>
               </div><!--inner-->
            </div>
            <div class="panel-footer">
  
            </div>
         </div>   
      </div>
    </div><!--row-->
</div><!--container-->

<?php $this->load->view('public/footer'); ?>