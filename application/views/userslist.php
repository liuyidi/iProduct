<?php $this->load->view('public/header'); ?>
<div style="margin-top:80px;" class="container text-center">
	
	 <table>
    	<tr>
    		<td>编号</td>
    		<td>用户名</td>
    		<td>邮箱</td>
    		<td>口号</td>
    		<td>分组</td>
    		<td>IP</td>
    		<td>最后登录时间</td>
        </tr>
        <?php foreach($users as $item):?>
        <tr>
    		<td><?=$item['uid']?></td>
    		<td><?=$item['username']?></td>
    		<td><?=$item['email']?></td>
    		<td><?=$item['description']?></td>
    		<td><?=$item['group']?></td>
    		<td><?=$item['ip']?>&nbsp;&nbsp;</td>
    		<td><?=date("Y-m-d,H:i:s",$item['lastlogin']);?></td>
        </tr>
    <?php endforeach;?>
    </table>
</div>




<?php $this->load->view('public/footer'); ?>