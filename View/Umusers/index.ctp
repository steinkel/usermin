<div class="umusers index">
	<h2><?php echo __('Umusers');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('username');?></th>
			<th><?php echo $this->Paginator->sort('email');?></th>
			<th><?php echo $this->Paginator->sort('password');?></th>
			<th><?php echo $this->Paginator->sort('umrole_id');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($umusers as $umuser): ?>
	<tr>
		<td><?php echo h($umuser['Umuser']['id']); ?>&nbsp;</td>
		<td><?php echo h($umuser['Umuser']['username']); ?>&nbsp;</td>
		<td><?php echo h($umuser['Umuser']['email']); ?>&nbsp;</td>
		<td><?php echo h($umuser['Umuser']['password']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($umuser['Umrole']['name'], array('controller' => 'umroles', 'action' => 'view', $umuser['Umrole']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $umuser['Umuser']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $umuser['Umuser']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $umuser['Umuser']['id']), null, __('Are you sure you want to delete # %s?', $umuser['Umuser']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Umuser'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Umroles'), array('controller' => 'umroles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Umrole'), array('controller' => 'umroles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Umpermissions'), array('controller' => 'umpermissions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Umpermission'), array('controller' => 'umpermissions', 'action' => 'add')); ?> </li>
	</ul>
</div>
