<?php

// Routes for standard actions

Router::connect('/login', array('plugin' => 'usermin', 'controller' => 'umusers', 'action' => 'login'));
Router::connect('/logout', array('plugin' => 'usermin', 'controller' => 'umusers', 'action' => 'logout'));
Router::connect('/dashboard', array('plugin' => 'usermin', 'controller' => 'umdashboard', 'action' => 'index'));


