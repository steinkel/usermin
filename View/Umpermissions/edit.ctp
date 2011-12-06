<div class="umpermissions form">
<?php echo $this->Form->create('Umpermission');?>
	<fieldset>
		<legend><?php echo __('Edit Umpermission'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('umrole_id');
		echo $this->Form->input('plugin');
		echo $this->Form->input('controller');
		echo $this->Form->input('action');
		echo $this->Form->input('params');
		echo $this->Form->input('allowed');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Umpermission.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Umpermission.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Umpermissions'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Umroles'), array('controller' => 'umroles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Umrole'), array('controller' => 'umroles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Umusers'), array('controller' => 'umusers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Umuser'), array('controller' => 'umusers', 'action' => 'add')); ?> </li>
	</ul>
</div>
