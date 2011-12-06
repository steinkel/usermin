<div class="umroles view">
<h2><?php  echo __('Umrole');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($umrole['Umrole']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($umrole['Umrole']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rank'); ?></dt>
		<dd>
			<?php echo h($umrole['Umrole']['rank']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Umrole'), array('action' => 'edit', $umrole['Umrole']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Umrole'), array('action' => 'delete', $umrole['Umrole']['id']), null, __('Are you sure you want to delete # %s?', $umrole['Umrole']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Umroles'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Umrole'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Umpermissions'), array('controller' => 'umpermissions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Umpermission'), array('controller' => 'umpermissions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Umusers'), array('controller' => 'umusers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Umuser'), array('controller' => 'umusers', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Umpermissions');?></h3>
	<?php if (!empty($umrole['Umpermission'])):?>
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
		foreach ($umrole['Umpermission'] as $umpermission): ?>
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
<div class="related">
	<h3><?php echo __('Related Umusers');?></h3>
	<?php if (!empty($umrole['Umuser'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Username'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Password'); ?></th>
		<th><?php echo __('Umrole Id'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($umrole['Umuser'] as $umuser): ?>
		<tr>
			<td><?php echo $umuser['id'];?></td>
			<td><?php echo $umuser['username'];?></td>
			<td><?php echo $umuser['email'];?></td>
			<td><?php echo $umuser['password'];?></td>
			<td><?php echo $umuser['umrole_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'umusers', 'action' => 'view', $umuser['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'umusers', 'action' => 'edit', $umuser['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'umusers', 'action' => 'delete', $umuser['id']), null, __('Are you sure you want to delete # %s?', $umuser['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Umuser'), array('controller' => 'umusers', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
