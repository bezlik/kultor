<div class="users form">
<?php echo $form->create('User',array('action'=>'register'));?>
	<fieldset>
 		<legend><?php __('Register');?></legend>
	<?php
		echo $form->input('email_address');
		echo $form->input('password');		
		echo $form->hidden('active',array('value'=>'1'));	
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
