<div class="users view">
<h2><?php  __('Пользователь');?></h2>

	<div style="float:left; margin-top:10px; padding-right:50px; height:200px;">
		<img src="/img/thumb.php/avatar?width=100&image=/files/upload/avatar/<?=$avatar?>" alt="photo" border="1"/>
	</div>
	<div style="display:block; float:none">
		
			<dl><?php $i = 0; $class = ' class="altrow"';?>
			
				<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Логин'); ?></dt>
				<dd<?php if ($i++ % 2 == 0) echo $class;?> style="padding-left:70px">
					<?php echo $user_info['User']['login']; ?>
					&nbsp;
				</dd>
			    <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Имя'); ?></dt>
				<dd<?php if ($i++ % 2 == 0) echo $class;?> style="padding-left:70px">
					<?php echo $user_info['User']['display_name']; ?>
					&nbsp;
				</dd>
				
				
				<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Email'); ?></dt>
				<dd<?php if ($i++ % 2 == 0) echo $class;?> style="padding-left:70px">
					<?php echo $user_info['User']['email']; ?>
					&nbsp;
				</dd>
				
				<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Дата'); ?></dt>
				<dd<?php if ($i++ % 2 == 0) echo $class;?> style="padding-left:70px">
					<?php echo date("d.m.y H:m",$user_info['User']['register_date']); ?>
					
					&nbsp;
				</dd>
				
			</dl>
	</div>
	


<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit User', true), array('action'=>'edit', $user_info['User']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete User', true), array('action'=>'delete', $user_info['User']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $user_info['User']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Users', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New User', true), array('action'=>'add')); ?> </li>
	</ul>
</div>
