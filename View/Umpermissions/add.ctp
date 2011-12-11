<div class="umpermissions form">
<?php echo $this->Form->create('Umpermission');?>
	<fieldset>
		<legend><?php echo __('Add Permission'); ?></legend>
	<?php
		echo $this->Form->input('umrole_id', array('label' => 'Role'));
		echo $this->Form->input('plugin');
		echo $this->Form->input('controller');
		echo $this->Form->input('action');
		//echo $this->Form->input('params');
		echo $this->Form->input('allowed', array('checked' => true));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Permissions'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Roles'), array('controller' => 'umroles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Role'), array('controller' => 'umroles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'umusers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'umusers', 'action' => 'add')); ?> </li>
	</ul>
</div>
