<div class="umusers form">
<?php echo $this->Form->create('Umuser');?>
	<fieldset>
		<legend><?php echo __('Edit Umuser'); ?></legend>
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
		<li><?php echo $this->Html->link(__('List Umusers'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Umroles'), array('controller' => 'umroles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Umrole'), array('controller' => 'umroles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Umpermissions'), array('controller' => 'umpermissions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Umpermission'), array('controller' => 'umpermissions', 'action' => 'add')); ?> </li>
	</ul>
</div>
