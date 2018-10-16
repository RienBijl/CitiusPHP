<?php

class Home extends CPController
{

  public function index()
  {
    $this->model('users');

    $this->assign("rand", rand(50, 500));
    $this->assign("params", $this->params);
    $this->view("home/index");
  }

}
