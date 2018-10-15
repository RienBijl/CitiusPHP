<?php

class App
{

  protected $controller = "";
  protected $method = "";
  protected $params = [];

  public function __construct()
  {
    $this->controller = $GLOBALS['conf_routing']->defaultcontroller[0];
    $this->method = $GLOBALS['conf_routing']->defaultcontroller[1];
    $workable = $this->getWorkable();
    $notfound = false;



    if(isset($workable[0]))
    {
      if(file_exists('./mvc/controllers/' .$workable[0] .'.php'))
      {
        $this->controller = $workable[0];
        unset($workable[0]);
      } else {
        $notfound = true;
      }
    }


    require_once './mvc/controllers/' .$this->controller .'.php';
    $this->controller = new $this->controller;

    if(isset($workable[1]) && !$notfound)
    {
      if(method_exists($this->controller, $workable[1]))
      {
        	$this->method = $workable[1];
          unset($workable[1]);
      } else {
        $notfound = true;
      }
    }

    if($notfound)
    {
      require_once './mvc/controllers/' .$GLOBALS['conf_routing']->filenotfound[0] .'.php';
      $this->controller = new $this->controller;
      $this->controller = $GLOBALS['conf_routing']->filenotfound[0];
      $this->method = $GLOBALS['conf_routing']->filenotfound[1];
    }

    $this->params = $workable ? array_values($workable) : [];

    $this->controller->params = $this->params;

    call_user_func([$this->controller, $this->method]);

  }


  private function getWorkable()
  {
    if(!isset($_GET['url'])) return array();
    return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
  }

}
