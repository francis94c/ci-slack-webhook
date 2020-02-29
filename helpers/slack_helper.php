<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('slack_message')) {
  /**
   * [slack_message description]
   * @date   2020-02-29
   * @return SLACKMessage [description]
   */
  function slack_message():SLACKMessage
  {
    return new SLACKMessage();
  }
}


if (!function_exists('slack_message_block')) {
  /**
   * [slack_message_block description]
   * @date   2020-02-29
   * @return SLACKMessageBlock [description]
   */
  function slack_message_block():SLACKMessageBlock
  {
    return new SLACKMessageBlock();
  }
}
