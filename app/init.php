<?php

// Requirements
require 'App.php';
require 'CPController.php';

// Config requirements
$GLOBALS['conf_routing'] = require './config/routing.php';

// Forced packages
require './packages/smarty/libs/Smarty.class.php';

// Setup Smarty
// Create the new application instance
new App();
