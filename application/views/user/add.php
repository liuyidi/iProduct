<!Doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<form action="<?php echo site_url('user/insert'); ?>" method="post">
		<label>邮箱：<input type="text" name="email"></label>
		<label>密码:<input type="password" name="password"></label>
		<input type="submit" value="提交"/>
    </form> 
    <img src="<?php echo base_url();?>uploads/ja.jpg" alt=""/>
</body>
</html>