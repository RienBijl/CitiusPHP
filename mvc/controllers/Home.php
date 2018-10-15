<?php

class Home extends CPController
{

  public function index()
  {
    $this->assign("rand", rand(50, 500));
    $this->assign("params", $this->params);
    $this->view("home/index");
  }

}
