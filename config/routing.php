<?php
/*
CONFIGURATION
-> ROUTER
*/

return (object) array(

  'defaultcontroller' => array("Home", "index"), // When no file is specified, load this route
  'filenotfound' => array("Miscellaneous", "filenotfound") // When the specified file isn't found, load this route


);
