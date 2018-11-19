<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Helper_Mailer
{

  public function __construct()
  {
    if(!defined("HELPER_MAIL_INITIALIZED"))
      $this->init();
  }

  public function new()
  {
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = $GLOBALS['conf_mail']->host;
    $mail->SMTPAuth = $GLOBALS['conf_mail']->smtp_auth;
    $mail->Username = $GLOBALS['conf_mail']->username;
    $mail->Password = $GLOBALS['conf_mail']->password;
    $mail->SMTPSecure = $GLOBALS['conf_mail']->smtp_secure;
    $mail->Port = $GLOBALS['conf_mail']->smtp_port;
    return $mail;
  }

  private function init()
  {
    $GLOBALS['conf_mail'] = require './config/mail.php';
    require_once './packages/phpmailer/Exception.php';
    require_once './packages/phpmailer/PHPMailer.php';
    require_once './packages/phpmailer/SMTP.php';
    define('HELPER_MAIL_INITIALIZED', false);
  }

}
