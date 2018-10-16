<?php

class Users extends CPModel
{

  public $table;

  public function __construct()
  {
    $this->$table = new TableObject;
    $this->$table->load('users');
  }

}
