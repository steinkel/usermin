<div class="umpermissions view">
<h2><?php  echo __('Permission');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($umpermission['Umpermission']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Umrole'); ?></dt>
		<dd>
			<?php echo $this->Html->link($umpermission['Umrole']['name'], array('controller' => 'umroles', 'action' => 'view', $umpermission['Umrole']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Plugin'); ?></dt>
		<dd>
			<?php echo h($umpermission['Umpermission']['plugin']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Controller'); ?></dt>
		<dd>
			<?php echo h($umpermission['Umpermission']['controller']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Action'); ?></dt>
		<dd>
			<?php echo h($umpermission['Umpermission']['action']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Params'); ?></dt>
		<dd>
			<?php echo h($umpermission['Umpermission']['params']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Allowed'); ?></dt>
		<dd>
			<?php echo h($umpermission['Umpermission']['allowed']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Permission'), array('action' => 'edit', $umpermission['Umpermission']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Permission'), array('action' => 'delete', $umpermission['Umpermission']['id']), null, __('Are you sure you want to delete # %s?', $umpermission['Umpermission']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Permissions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Permission'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Roles'), array('controller' => 'umroles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Role'), array('controller' => 'umroles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'umusers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'umusers', 'action' => 'add')); ?> </li>
	</ul>
</div>
