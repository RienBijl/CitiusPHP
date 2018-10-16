<?php

// Requirements
require 'App.php';
require 'CPController.php';
require 'CPModel.php';
require 'core/CoreLoader.php';

// Config requirements
$GLOBALS['conf_config'] = require './config/config.php';
$GLOBALS['conf_routing'] = require './config/routing.php';
$GLOBALS['conf_database'] = require './config/database.php';

// Forced packages
require './packages/smarty/libs/Smarty.class.php';

// Setup Smarty
// Create the new application instance
new App();
