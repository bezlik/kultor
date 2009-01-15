<div class="places form">
<?php echo $form->create('Place');?>
	<fieldset>
 		<legend><?php __('Add Place');?></legend>
<?php
		echo $form->input('place_name');
		echo $form->input('place_description');
		echo $form->input('user_id');
		echo $form->input('revision_date');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Places', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Users', true), array('controller'=> 'users', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New User', true), array('controller'=> 'users', 'action'=>'add')); ?> </li>
	</ul>
</div>