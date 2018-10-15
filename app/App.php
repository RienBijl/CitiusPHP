<?php

class App
{

  public function __construct()
  {
    $workable = $this->getWorkable();

    if(!isset($workable[0]))
    {

    }
  }

  private function route($arg0, $argq)
  {
    require './mvc/controllers/';
  }

  private function getWorkable()
  {
    if(!isset($_GET['url'])) return array();
    return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
  }

}
