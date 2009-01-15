<div class="users form">
<?php echo $form->create('User',array('action'=>'register'));?>
	<fieldset>
 		<legend><?php __('Add User');?></legend>
	<?php
		echo $form->input('login');
		echo $form->input('password');
		echo $form->input('email');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
