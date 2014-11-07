<?php  $this->load->view('public/header'); ?>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    个人主页
                </div>
                <div class="panel-body">
                    <?=$username?>
                    <p>第<?=$uid?>个用户</p>
                </div>
            </div>
            <div class="panel panel-default">
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
            <div class="panel panel-default">
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

<?php  $this->load->view('public/footer'); ?>
