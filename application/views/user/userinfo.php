<?php  $this->load->view('public/header'); ?>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default col-xs-4">
                <div class="panel-heading">
                    个人主页
                </div>
                <div class="panel-body">
                    <?=$username?>
                    <p>第<?=$uid?>个用户</p>
                    <?php if($is_owner == false): ?>
                        <?php if($is_followed == true): ?>
                            <span id="unfollow" class="btn btn-danger">取消关注</span>
                        <?php elseif($is_followed == false): ?>
                            <span id="addfollow" class="btn btn-success">关注</span>
                        <?php endif; ?>
                    <?php else: ?>

                    <?php endif; ?>
                </div>
            </div>
            <div class="panel panel-default col-xs-4">
                <div class="panel-heading">
                    我关注的
                </div>
                <div class="panel-body">
                    <?php foreach($followings as $v): ?>
                        <span><?php echo $v; ?></span>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="panel panel-default col-xs-4">
                <div class="panel-heading">
                    粉丝
                </div>
                <div class="panel-body">

                </div>
            </div>
            <div class="panel panel-default col-xs-12">
                <div class="panel-heading">
                    发布的产品
                </div>
                <div class="panel-body">
                    <?php foreach($user_posts as $v): ?>
                    <div class="cell topic">
                        <table>
                            <tr>
                                <td valign="middle" width="auto">
                                    <span class="bigger">
                                        <a href="<?php echo site_url('post/show/'.$v['pid']);?>">
                                            <?php echo $v['title']; ?>
                                        </a>
                                    </span>
                                    <span><?php echo $v['content']; ?></span>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="panel panel-default col-xs-12">
                <div class="panel-heading">
                    参与的评论
                </div>
                <div class="panel-body">
                    <div class="clist">
                    <?php foreach($user_comments as $v): ?>
                        <section>
                            <p>回复了<?php echo $v['username'];?>&nbsp;&nbsp;&nbsp;<?php echo date('Y-m-d,H:i:s',$v['replytime']); ?>发表的&nbsp;&nbsp;<span><a href="<?php echo site_url('post/show/'.$v['pid']);?>"><?php echo $v['title']; ?></a></span></p>
                            <span>评论内容：<?php echo $v['content']; ?></span>
                        </section>
                    <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
(function($){
    /**
     * 添加关注&取消关注
     */
    var uid = <?=$uid?>;
    var url_follow = "<?php echo site_url("follow/addFollow");?>";
    $(document).on("click","#addfollow",function(){
        var self = $(this);
        if(false){
            //检测登录状态
        }
        $.ajax({
            url: url_follow,
            type: "post",
            dataType: "json",
            data:{"followed_id":uid},
            success: function(data){
                console.log(data);
                if(data.code == 200){
                    self.text("取消关注").attr("id","unfollow").removeClass("btn-success").addClass("btn-danger");
                }
            }
        })
    });

    var url_unfollow = "<?php echo site_url("follow/unFollow");?>";
    $(document).on("click","#unfollow",function(){
        var self = $(this);
        $.ajax({
            url: url_unfollow,
            type: "post",
            dataType: "json",
            data:{"followed_id":uid},
            success: function(data){
                console.log(data);
                if(data.code == 200){
                    self.text("关注").attr("id","addfollow").removeClass("btn-danger").addClass("btn-success");
                }
            }
        })
    });

    /*
     * 得到用户关注的信息
     */
    var url_userFollowers = "<?php echo site_url("follow/getAllFollowers");?>";
    var page_id = window.location.href.slice(-1);
    var getUserFollowers = function(){
        $.ajax({
            url: url_userFollowers,
            type: "get",
            data: {"page_id":page_id},
            dataType: "json",
            success: function(data){
                if(data.code == 200){
                    console.log(data.msg);
                }
            }
        })
    }
    getUserFollowers();


})(jQuery);
</script>
<?php  $this->load->view('public/footer'); ?>
