<div class="events form">
<?php echo $form->create('Event');?>
	<fieldset>
 		<legend><?php __('Edit Event');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('event_title');
		echo $form->input('event_date');
		echo $form->input('event_end_date');
		echo $form->input('user_id');
		echo $form->input('event_place');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Event.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Event.id'))); ?></li>
		<li><?php echo $html->link(__('List Events', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Users', true), array('controller'=> 'users', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New User', true), array('controller'=> 'users', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Places', true), array('controller'=> 'places', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Place', true), array('controller'=> 'places', 'action'=>'add')); ?> </li>
	</ul>
</div>
