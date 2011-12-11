<div class="umroles view">
<h2><?php  echo __('Role');?></h2>
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
		<li><?php echo $this->Html->link(__('Edit Role'), array('action' => 'edit', $umrole['Umrole']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Role'), array('action' => 'delete', $umrole['Umrole']['id']), null, __('Are you sure you want to delete # %s?', $umrole['Umrole']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Roles'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Role'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Permissions'), array('controller' => 'umpermissions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Permission'), array('controller' => 'umpermissions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'umusers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'umusers', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Permissions');?></h3>
	<?php if (!empty($umrole['Umpermission'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
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
			<li><?php echo $this->Html->link(__('New Permission'), array('controller' => 'umpermissions', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Users');?></h3>
	<?php if (!empty($umrole['Umuser'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Username'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($umrole['Umuser'] as $umuser): ?>
		<tr>
			<td><?php echo $umuser['username'];?></td>
			<td><?php echo $umuser['email'];?></td>
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
			<li><?php echo $this->Html->link(__('New User'), array('controller' => 'umusers', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
