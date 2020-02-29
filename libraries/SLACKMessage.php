<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SLACKMessage
{
  /**
   * [private description]
   * @var [type]
   */
  private $blocks = [];

  /**
   * [private description]
   * @var [type]
   */
  private $channel;

  /**
   * [addBlock description]
   * @date   2020-02-29
   * @param  SLACKMessageBlock $block [description]
   * @return SLACKMessage             [description]
   */
  public function addBlock(SLACKMessageBlock $block):SLACKMessage
  {
    $this->blocks[] = $block;
    return $this;
  }

  /**
   * [channel description]
   * @date   2020-02-29
   * @param  string       $channel [description]
   * @return SLACKMessage          [description]
   */
  public function channel(string $channel):SLACKMessage
  {
    $this->channel = $channel;
    return $this;
  }

  /**
   * [toArray description]
   * @date   2020-02-29
   * @return array      [description]
   */
  public function toArray():array
  {
    $message = ['blocks' => $this->blocks];
    if ($this->channel) $message['channel'] = $this->channel;
    return $message;
  }

  /**
   * [send description]
   * @date   2020-02-29
   * @return bool       [description]
   */
  public function send():bool
  {
    return get_instance()->slack->send($this);
  }
}
