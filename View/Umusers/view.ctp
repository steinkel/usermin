<div class="umusers view">
<h2><?php  echo __('Umuser');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($umuser['Umuser']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($umuser['Umuser']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($umuser['Umuser']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Umrole'); ?></dt>
		<dd>
			<?php echo $this->Html->link($umuser['Umrole']['name'], array('controller' => 'umroles', 'action' => 'view', $umuser['Umrole']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Umuser'), array('action' => 'edit', $umuser['Umuser']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Umuser'), array('action' => 'delete', $umuser['Umuser']['id']), null, __('Are you sure you want to delete # %s?', $umuser['Umuser']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Umusers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Umuser'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Umroles'), array('controller' => 'umroles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Umrole'), array('controller' => 'umroles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Umpermissions'), array('controller' => 'umpermissions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Umpermission'), array('controller' => 'umpermissions', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Umpermissions');?></h3>
	<?php if (!empty($umuser['Umpermission'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Umrole Id'); ?></th>
		<th><?php echo __('Umuser Id'); ?></th>
		<th><?php echo __('Plugin'); ?></th>
		<th><?php echo __('Controller'); ?></th>
		<th><?php echo __('Action'); ?></th>
		<th><?php echo __('Params'); ?></th>
		<th><?php echo __('Allowed'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($umuser['Umpermission'] as $umpermission): ?>
		<tr>
			<td><?php echo $umpermission['id'];?></td>
			<td><?php echo $umpermission['umrole_id'];?></td>
			<td><?php echo $umpermission['umuser_id'];?></td>
			<td><?php echo $umpermission['plugin'];?></td>
			<td><?php echo $umpermission['controller'];?></td>
			<td><?php echo $umpermission['action'];?></td>
			<td><?php echo $umpermission['params'];?></td>
			<td><?php echo $umpermission['allowed'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'umpermissions', 'action' => 'view', $umpermission['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'umpermissions', 'action' => 'edit', $umpermission['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'umpermissions', 'action' => 'delete', $umpermission['id']), null, __('Are you sure you want to delete # %s?', $umpermission['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Umpermission'), array('controller' => 'umpermissions', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
