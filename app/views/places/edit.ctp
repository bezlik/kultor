<div class="places form">
<?php echo $form->create('Place');?>
	<fieldset>
 		<legend><?php __('Edit Place');?></legend>
	<?php
		echo $form->input('id');
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
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Place.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Place.id'))); ?></li>
		<li><?php echo $html->link(__('List Places', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Users', true), array('controller'=> 'users', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New User', true), array('controller'=> 'users', 'action'=>'add')); ?> </li>
	</ul>
</div>
