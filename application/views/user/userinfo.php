<?php  $this->load->view('public/header'); ?>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default col-xs-6">
                <div class="panel-heading">
                    个人主页
                </div>
                <div class="panel-body">
                    <?=$username?>
                    <p>第<?=$uid?>个用户</p>
                    <span id="addfollow" class="btn btn-success">关注</span>
                </div>
            </div>
            <div class="panel panel-default col-xs-6">
                <div class="panel-heading">
                    我关注的
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
$(function(){

    var uid = <?=$uid?>;
    var url = "<?php echo site_url("follow/addFollow");?>";
    $(document).on("click","#addfollow",function(){
        var self = $(this);
        $.ajax({
            url: url,
            type: "post",
            dataType: "json",
            data:{"followed_id":uid},
            success: function(data){
                console.log(data);
                if(data.code == 200){
                    self.text("已关注");
                    self.attr("id","unfollow");
                }
            }
        })
    });

});
</script>
<?php  $this->load->view('public/footer'); ?>
