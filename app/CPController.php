<?php

class CPController {

   public $params;
   public $current;
   private $smarty;

   public function __construct()
   {
     $this->smarty = new Smarty();
     $this->smarty->setTemplateDir('./mvc/views/');
     $this->smarty->setCompileDir('./app/smarty/views_c/');
     $this->smarty->setCacheDir('./app/smarty/cache/');
   }

   protected function view($view)
   {
     $this->smarty->display($view .'.php');
   }

   protected function assign($key, $value)
   {
     $this->smarty->assign($key, $value);
   }

   protected function getSmarty()
   {
     return $this->smarty;
   }

   protected function model($model)
   {
     require './mvc/models/' .$model .'.php';
     $this->$model = new $model;
   }

}
