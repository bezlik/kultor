<div class="places index">
<h2><?php __('Places');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('place_name');?></th>
	<th><?php echo $paginator->sort('place_description');?></th>
	<th><?php echo $paginator->sort('revision_user_id');?></th>
	<th><?php echo $paginator->sort('revision_date');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($places as $place):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $place['Place']['id']; ?>
		</td>
		<td>
			<?php echo $place['Place']['place_name']; ?>
		</td>
		<td>
			<?php echo $place['Place']['place_description']; ?>
		</td>
		<td>
			<?php echo $place['User']['display_name']; ?>
		</td>
		<td>
			<?php echo $place['Place']['revision_date']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $place['Place']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $place['Place']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $place['Place']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $place['Place']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New Place', true), array('action'=>'add')); ?></li>
	</ul>
</div>
