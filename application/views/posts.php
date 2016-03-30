<?php $this->load->view('public/header'); ?>

<div class="container">
	<div class="row">
		<div class="col-md-10">
			<div class="panel panel-default index-topic-list">
				<div class="panel-heading">首页/产品
				
				</div>
				<div class="panel-body">
                    <?php foreach ($posts as $value) { ?>
	                <div class="post">
	                    <div class="post_user">
	                    	<a href="" class="latest"><img width="50" height="50" src="" title=""/></a>
	                    </div>
	                    <div class="post_content">
		                    <h3><a href="<?php echo site_url('post/show/'.$value['pid']);?>"><?php echo $value['title'];?></a></h3>
		                    <div class="meta">
		                    	<span class="pull-left"><a class="zhan" href="#">赞(<span><?php echo $value['praisesnum']; ?>0</span>)</a></span>&nbsp;&nbsp;
			                    <span>发布于: <?php echo date("Y-m-d,H:i:s",$value['addtime']); ?></span>
			                    <span>分类: <?php echo $value['cid']; ?></span>
			                    <span>作者: <a href="<?php echo site_url('user/info/'.$value['uid']);?>"><?php echo $value['username'];?></a></span>
			                    <div class="comment_count  pull-right">
			                       <span class="no-border badge"><?php echo $value['commentsnum'];?></span> 
			                       <p>评论</p>
			                    </div>
		                    </div>
		                    <div class="content">
			                    <?php echo $value['content']; ?>
		                    </div>
		                    <div class="tags">
			                    
		                    </div>
	                    </div>       
                    </div>
                    <?php  } ?>
                </div>
                <div class="panel-footer">
					<ul class="pagination pagination-centered">
                                <li class="active"><span>1</span></li>
                                <li><a href="/?page=2">2</a></li>
                                <li class="disabled"><span class="ellipsis">…</span></li>
                                <li><a href="/?page=21">21</a></li>
                    </ul>
                    <?php if(isset($pagination)):?>
	                    <?php echo $pagination;?>
                    <?php endif;?>
			    </div>
			</div>
	    </div><!--col-md-10-->
	</div>
</div>

<?php $this->load->view('public/footer'); ?>