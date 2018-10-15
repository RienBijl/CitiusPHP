<?php

class TableObject
{

  protected $table;
  protected $cache = array();

  public function load($table)
  {
    $this->table = $table;
  }

  public function flush()
  {
    $this->cache = array();
  }

  public function select($target, $operator, $value, $amount = "*", $suffix = '', $cache = true)
  {

    $key = "s" .$target .$operator .$value .$amount;
    if(strlen($key) > 32) $key = "s" .md5($key);

    /*
    Check cache
    */
    if($cache && isset($this->cache[$key])) return $this->cache[$key];

    /*
    Assemble query
    */
    $query = "SELECT " .$amount ." FROM " .$this->table ." WHERE " .$target .$operator ."?" ." " .$suffix;

    /*
    Push to database
    */

    global $db;
    $response = $db->query($query, array($value), true);

    /*
    Cache response
    */
    $this->cache[$key] = $response;

    /*
    Return data
    */
    return $response;

  }

  public function delete($target, $operator, $column)
  {

    /*
    Assemble query
    */

    $query = "DELETE FROM " . $this->table . " WHERE " .$target .$operator ."?";

    /*
    Push data to database
    */

    global $db;
    $db->query($query, array($column));
  }

  public function insert($args)
  {

    /*
    Assemble query
    */

    $query = "INSERT INTO " .$this->table ." (";

    $count = 1;
    foreach($args as $arg=>$value)
    {
      $query .= $arg;
      if(!($count >= count($args))) $query .= ", ";
      $count++;
    }

    $query .= ") VALUES (";

    $count = 1;
    foreach($args as $arg=>$value)
    {
      $query .= "?";
      if(!($count >= count($args))) $query .= ", ";
      $count++;
    }

    $query .= ")";

    /*
    Assemble data
    */

    $count = 1;
    $array = array();
    foreach($args as $arg=>$value)
    {
      $array[] = $value;
    }

    /*
    Push data to database
    */

    global $db;
    $db->query($query, $array);
  }

}
