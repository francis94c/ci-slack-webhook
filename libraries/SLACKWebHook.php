<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SLACKWebHook
{
  /**
   * [private description]
   * @var [type]
   */
  private $url;

  /**
   * [__construct description]
   * @date  2020-02-29
   * @param [type]     $params [description]
   */
  function __construct(?array $params=null)
  {
    if ($params) {
      $this->url = $params['url'] ?? null;
    }
  }
  
  /**
   * [send description]
   * @date  2020-02-29
   * @param SLACKMessage $message [description]
   */
  public function send(SLACKMessage $message):void
  {

  }
}
