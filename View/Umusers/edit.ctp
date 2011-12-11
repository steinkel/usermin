<div class="umusers form">
<?php echo $this->Form->create('Umuser');?>
	<fieldset>
		<legend><?php echo __('Edit User'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('username');
		echo $this->Form->input('email');
		echo $this->Form->input('password', array('value' => '', 'label' => 'Password (leave blank if not modified)'));
		echo $this->Form->input('umrole_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Umuser.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Umuser.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Roles'), array('controller' => 'umroles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Role'), array('controller' => 'umroles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Permissions'), array('controller' => 'umpermissions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Permission'), array('controller' => 'umpermissions', 'action' => 'add')); ?> </li>
	</ul>
</div>
