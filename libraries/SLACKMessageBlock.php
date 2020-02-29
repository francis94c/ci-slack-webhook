<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SLACKMessageBlock
{
  private $blockId;
  private $type = 'section';
  private $text = [];
  private $accessory = [];

  /**
   * [type description]
   * @date   2020-02-29
   * @param  string            $type [description]
   * @return SLACKMessageBlock       [description]
   */
  public function type(string $type):SLACKMessageBlock
  {
    $this->type = $type;
    return $this;
  }

  /**
   * [markDownText description]
   * @date   2020-02-29
   * @param  string            $text [description]
   * @param  bool              $view [description]
   * @return SLACKMessageBlock       [description]
   */
  public function markDownText(string $text, bool $view=false):SLACKMessageBlock
  {
    $this->text['type'] = 'mrkdwn';
    $this->text['text'] = $view ? get_instance()->load->view($text, true) : $text;
    return $this;
  }

  /**
   * [accessoryImage description]
   * @date   2020-02-29
   * @param  string            $image   [description]
   * @param  string            $altText [description]
   * @return SLACKMessageBlock          [description]
   */
  public function accessoryImage(string $image, string $altText):SLACKMessageBlock
  {
    $this->accessory['type'] = 'image';
    $this->accessory['image_url'] = $image;
    $this->accessory['alt_text'] = $altText;
    return $this;
  }

  /**
   * [blockId description]
   * @date   2020-02-29
   * @param  string            $blockId [description]
   * @return SLACKMessageBlock          [description]
   */
  public function blockId(string $blockId):SLACKMessageBlock
  {
    $this->blockId = $blockId;
    return $this;
  }

  /**
   * [toArray description]
   * @date   2020-02-29
   * @return array      [description]
   */
  public function toArray():array
  {
    $block = ['type' => $this->type];
    if (!empty($this->text)) $block['text'] = $this->text;
    if (!empty($this->accessory)) $block['accessory'] = $this->accessory;

    return $block;
  }
}
