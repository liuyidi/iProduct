<?php $this->load->view('public/header'); ?>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    您有0条消息
                </div>
                <div class="panel-body">
                    <div class='box'>
                        <div class='cell'>
                            <span class="chevron">&nbsp;›&nbsp;</span> 提醒系统(<?php // echo $users['notices']?>)
                        </div>
                        <?php if($notices_list){?>
                        <?php foreach($notices_list as $v){?>
                            <div class='cell'>
<table width='100%'>
<tr>
<td align='left' valign='top' width='32'>
<a href="<?php echo site_url('user/info/'.$v['suid']);?>" class="profile_link" title="<?php echo $v['username'];?>">
<?php if($v['avatar']) {?>
<img alt="<?php echo $v['username'];?> mini avatar" class="mini_avatar" src="<?php echo base_url($v['avatar']);?>" />
<?php } else {?>
<img alt="<?php echo $v['username'];?> mini avatar" class="mini_avatar" src="<?php echo base_url('uploads/avatar/default.jpg');?>" />
<?php }?>
</a>
</td>
<td valign='top'>
<span class='gray'>
<strong><a href="<?php echo site_url('user/info/'.$v['suid']);?>" class="startbbs profile_link" title="<?php echo $v['username'];?>"><?php echo $v['username'];?></a></strong>
<?php if($v['ntype']==0){?>
回复了你的贴子
<a href="<?php echo site_url('forum/view/'.$v['fid']);?>" class="startbbs"><?php echo $v['title'];?>...</a>
<?php }?>
<?php if($v['ntype']==1){?>
在回复
<a href="<?php echo site_url('forum/view/'.$v['fid']);?>" class="startbbs"><?php echo $v['title'];?>...</a>
时提到了@你
<?php }?>
</span>
<span class='snow'>
<?php echo $this->myclass->friendly_date($v['ntime']);?>
</span>
<!--<div class='sep5'></div>
<div class='payload'><p>@<a class="startbbs" href="">doudou</a>XXXXXXX</p></div>-->
</td>
</tr>
</table>
</div>
<?php }?>
<?php } else{?>
<div class='cell'>暂无提醒</div>
<?php }?>
</div>
</div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('public/footer'); ?>