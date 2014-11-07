<?php  $this->load->view('public/header'); ?>

<div class="container">
<div class="forms">
	<form accept-charset="utf-8" action="<?php echo site_url('user/reg');?>" method="post">
		<div class="form-group"><label>邮箱：</label><input type="email" name="email"></div>
		<div class="form-group"><label>用户名：</label><input type="text" name="username"></div>
		<div class="form-group"><label>密码：</label><input type="password" name="password"></div>
		<div class="form-group"><label>确认密码：</label><input type="password" name="repassword"></div>
		<input class="btn submit" name="commit" type="submit" value="完成注册" />
		<hr>
		<a href="<?php echo site_url('user/login');?>">登录</a><br/>
		<a href="<?php echo site_url('user/confirmation');?>">没有收到验证邮件？</a><br />
	</form>
</div>
</div>


<?php  $this->load->view('public/footer'); ?>