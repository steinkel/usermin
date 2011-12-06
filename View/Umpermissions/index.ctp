<div class="umpermissions index">
	<h2><?php echo __('Umpermissions');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('umrole_id');?></th>
			<th><?php echo $this->Paginator->sort('umuser_id');?></th>
			<th><?php echo $this->Paginator->sort('plugin');?></th>
			<th><?php echo $this->Paginator->sort('controller');?></th>
			<th><?php echo $this->Paginator->sort('action');?></th>
			<th><?php echo $this->Paginator->sort('params');?></th>
			<th><?php echo $this->Paginator->sort('allowed');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($umpermissions as $umpermission): ?>
	<tr>
		<td><?php echo h($umpermission['Umpermission']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($umpermission['Umrole']['name'], array('controller' => 'umroles', 'action' => 'view', $umpermission['Umrole']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($umpermission['Umuser']['id'], array('controller' => 'umusers', 'action' => 'view', $umpermission['Umuser']['id'])); ?>
		</td>
		<td><?php echo h($umpermission['Umpermission']['plugin']); ?>&nbsp;</td>
		<td><?php echo h($umpermission['Umpermission']['controller']); ?>&nbsp;</td>
		<td><?php echo h($umpermission['Umpermission']['action']); ?>&nbsp;</td>
		<td><?php echo h($umpermission['Umpermission']['params']); ?>&nbsp;</td>
		<td><?php echo h($umpermission['Umpermission']['allowed']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $umpermission['Umpermission']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $umpermission['Umpermission']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $umpermission['Umpermission']['id']), null, __('Are you sure you want to delete # %s?', $umpermission['Umpermission']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Umpermission'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Umroles'), array('controller' => 'umroles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Umrole'), array('controller' => 'umroles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Umusers'), array('controller' => 'umusers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Umuser'), array('controller' => 'umusers', 'action' => 'add')); ?> </li>
	</ul>
</div>
