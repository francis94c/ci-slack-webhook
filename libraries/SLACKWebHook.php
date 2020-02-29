<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SLACKWebHook
{
  /**
   * [PACKAGE description]
   * @var string
   */
  const PACKAGE = 'francis94c/ci-slack-webhook';

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
      $this->url = $params['url'] ?? getenv('SLACK_WEBHOOK_URL');
    }

    splint_autoload_register(self::PACKAGE);
  }

  /**
   * [send description]
   * @date  2020-02-29
   * @param SLACKMessage $message [description]
   */
  public function send(SLACKMessage $message):bool
  {
    $ch = curl_init($this->url);
    $body = json_encode($message->toArray());
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
      'Content-Length: ' . strlen($body),
      'Content-Type: application/json'
    ]);
    curl_setopt($ch, CURLOPT_USERAGENT, 'CI-SLACK-WEBHOOK-LIB');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
    curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    return $code == 200;
  }
}
