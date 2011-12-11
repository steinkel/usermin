<h1>Dashboard</h1>
<h2>Users (<?php echo $umusersCount?>)</h2>
<ul>
<li><?php echo $this->Html->link('Add', array('plugin' => 'usermin', 'controller' => 'umusers', 'action' => 'add')); ?></li>
<li><?php echo $this->Html->link('List', array('plugin' => 'usermin', 'controller' => 'umusers', 'action' => 'index')); ?></li>
</ul>
<h2>Roles (<?php 
foreach ($umroles as $role){
    echo $this->Html->link($role['Umrole']['name'], array('plugin' => 'usermin', 'controller' => 'umroles', 'action' => 'view', $role['Umrole']['id']));
    echo ', ';
}
?>)</h2>
<ul>
<li><?php echo $this->Html->link('Add', array('plugin' => 'usermin', 'controller' => 'umroles', 'action' => 'add')); ?></li>
<li><?php echo $this->Html->link('List', array('plugin' => 'usermin', 'controller' => 'umroles', 'action' => 'index')); ?></li>
</ul>
<h2>Permissions (<?php echo $umpermissionsCount?>)</h2>
<ul>
<li><?php echo $this->Html->link('Add', array('plugin' => 'usermin', 'controller' => 'umpermissions', 'action' => 'add')); ?></li>
<li><?php echo $this->Html->link('List', array('plugin' => 'usermin', 'controller' => 'umpermissions', 'action' => 'index')); ?></li>
</ul>
