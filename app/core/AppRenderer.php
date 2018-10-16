<?php

class AppRenderer
{

  private static $smarty;

  public static function getRenderer($renderable)
  {
    if($smarty == null)
    {
      $this->smarty = new Smarty();
      $this->smarty->setTemplateDir('./app/core/renderables/v/');
      $this->smarty->setCompileDir('./app/core/renderables/v_c/');
      $this->smarty->setCacheDir('./app/core/renderables/c/');
    }

    return new AppRenderer($renderable);
  }

  private $renderable;

  private function __construct($renderable)
  {
    $this->renderable = $renderable;
  }

  public function assign($key, $value)
  {
    self::$smarty->assign($key, $value);
  }

  public function render()
  {
    self::$smarty->display($this->renderable);
    self::clear_all_assign();
  }

}
