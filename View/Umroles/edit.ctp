<div class="umroles form">
<?php echo $this->Form->create('Umrole');?>
	<fieldset>
		<legend><?php echo __('Edit Role'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('rank');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Umrole.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Umrole.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Roles'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Permissions'), array('controller' => 'umpermissions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Permission'), array('controller' => 'umpermissions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'umusers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'umusers', 'action' => 'add')); ?> </li>
	</ul>
</div>
