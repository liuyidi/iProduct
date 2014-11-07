<?php $this->load->view('public/header'); ?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                	<p><?php echo $title;?></p>
                </div>
                <div class="panel-body">
<div class="forms">
	<form accept-charset="utf-8" action="<?php echo site_url('post/add');?>" method="post">
		<div style="margin:0;padding:0;display:inline">
            <input name="utf8" type="hidden" value="&#x2713;" />
            <input name="uid" type="hidden" value="1" />
            <input name="cid" type="hidden" value="1" />
        </div>
		<div class="form-group"><label>产品名称：</label><input type="text" name="title"></div>
		<div class="form-group"><label>产品链接：</label><input type="text" name="site_url"></div>
		<div class="form-group"><label>产品描述：</label><textarea style="width:150px;height:200px;" name="content"></textarea></div>
		<input class="btn submit" name="commit" type="submit" value="提交" />
		<hr>
	</form>
</div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('public/footer'); ?>