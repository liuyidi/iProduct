<?php $this->load->view('public/header'); ?>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                   <?php // if($content['avatar']) {?>
                   <!--<img alt="<?php// echo $content['username']?> medium avatar" class="medium_avatar" src="<?php// echo base_url($content['avatar']);?>" />
                   <?php // } else {?>
                   <img alt="<?php// echo $content['username']?> medium avatar" class="medium_avatar" src="<?php// echo base_url('uploads/avatar/default.jpg');?>" />
                   <?php //}?>-->
                   <div class="meta">
                        <span class="pull-left"><a class="zhan" href="#">赞(<span><?php echo $content['praisesnum']; ?>0</span>)</a></span>&nbsp;&nbsp;
                        <span>发布于: <?php echo date("Y-m-d,h:i:s",$content['addtime']); ?></span>
                        <span>分类: <?php echo $content['cid']; ?></span>
                        <span>作者: <a href="<?php echo site_url('user/info/'.$content['uid']);?>" class="profile_link" title="<?php echo $content['username']?>" ><?php echo $content['username']; ?></a></span>
                        <div class="comment_count  pull-right">
                            评论<span class="no-border badge"><?php echo $content['commentsnum']; ?>0</span>
                        </div>
                    </div>
                   
                </div>
                <div class="panel-body">
                    <h3><a href="<?php echo $content['site_url'];?>"><?php echo $content['title']; ?></a></h3>
                    <p><?php echo $content['content']; ?><a href="<?php echo $content['site_url'];?>"><?php echo $content['site_url'];?></a></p>

                </div>
                <div class="panel-footer">
                	评论列表：
                    <div id="clist">
                        <?php //var_dump($comment); ?>
                        <?php foreach ($comment as $key=>$v):?>
                        <article>
                            <div class="cell">
                                <a href="<?php echo site_url('user/info/'.$v['uid']);?>"><?php echo $v['username'];?></a>发表于<?php echo date('m-d,H:i',$v['replytime']); ?>
                                <p><?php echo $v['content']; ?><span class="pull-right">#<?php echo $v['id'];?>楼</span></p>
                                
                            </div>
                        </article>
                        <?php endforeach; ?>
                    </div>
                    <hr/>
                    <div class="container">
                        <div class="row">
                            <?php if($this->session->userdata('is_login')){ ?>
                            <form id="myform" action="<?php echo site_url('comment/add_comment');?>" method="post" name="add_comment">
                                <input name="pid" id="pid" type="hidden" value="<?php echo $content['pid'];?>" />
                                <input name="username" id="username" type="hidden" value="<?php echo $content['username'];?>" />
                                <input name="avatar" id="avatar" type="hidden" value="<?php //echo base_url($content['middle_avatar']); ?>" />

                            <textarea name="content" class="col-xs-11" style="height:100px;" ></textarea>
                            <p></p>
                            <input type="submit" class="btn btn-danger" value="提交评论" />
                            <? }else{ ?>
                                <p><a class="btn btn-default" href="<?php echo site_url('user/login');?>">登录发表</a></p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('public/footer'); ?>