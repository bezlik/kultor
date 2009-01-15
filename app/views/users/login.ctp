<div class="users form">
<?php echo $form->create('User',array('action'=>'login'));?>
	<fieldset>
 		<legend><?php __('Login User');?></legend>
	<?php
		echo $form->input('login');
		echo $form->input('password');
		echo $form->input('remember_me', array('label' => 'Remember Me', 'type' => 'checkbox'));
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
