<?php
/**
 * Copyright (c) 2020. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
 * Morbi non lorem porttitor neque feugiat blandit. Ut vitae ipsum eget quam lacinia accumsan.
 * Etiam sed turpis ac ipsum condimentum fringilla. Maecenas magna.
 * Proin dapibus sapien vel ante. Aliquam erat volutpat. Pellentesque sagittis ligula eget metus.
 * Vestibulum commodo. Ut rhoncus gravida arcu.
 */

namespace common\helpers;

use Yii;

/**
 * Alert widget renders a message from session flash. All flash messages are displayed
 * in the sequence they were assigned using setFlash. You can set message as following:
 *
 * ```php
 * Yii::$app->session->setFlash('error', 'This is the message');
 * Yii::$app->session->setFlash('success', 'This is the message');
 * Yii::$app->session->setFlash('info', 'This is the message');
 * ```
 * Multiple messages could be set as follows:
 *
 * ```php
 * Yii::$app->session->setFlash('error', ['Error 1', 'Error 2']);
 * ```
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @author Alexander Makarov <sam@rmcreative.ru>
 */
class HAlertSetHelper
{
  const TYPE_ERROR = 'error';
  const TYPE_DANGER = 'danger';
  const TYPE_SUCCESS = 'success';
  const TYPE_INFO = 'info';
  const TYPE_WARNING = 'warning';

  /**
   * @param string $type
   * @param array|string $message
   */
  protected static function setAlert($type, $message)
  {
    /* if (is_array($message)) {
       $message = implode(', <br>', $message);
     }*/
    if (isset(\Yii::$app->session)) {
      \Yii::$app->session->setFlash($type, $message);
    }
  }

  /**
   * @param array|string $message
   */
  public static function setError($message)
  {
    self::setAlert(self::TYPE_ERROR, $message);
  }

  /**
   * @param array|string $message
   */
  public static function setDanger($message)
  {
    self::setAlert(self::TYPE_DANGER, $message);
  }

  /**
   * @param array|string $message
   */
  public static function setSuccess($message)
  {
    self::setAlert(self::TYPE_SUCCESS, $message);
  }

  /**
   * @param array|string $message
   */
  public static function setWarning($message)
  {
    self::setAlert(self::TYPE_WARNING, $message);
  }

  /**
   * @param array|string $messagewarning
   */
  public static function setInfo($message)
  {
    self::setAlert(self::TYPE_INFO, $message);
  }

  public static function setWarningAdd($message = '')

  {
    self::setAlert(self::TYPE_WARNING, 'Errr add data' . $message);
  }

  public static function setWarningRemove($message = '')

  {
    self::setAlert(self::TYPE_WARNING, 'Errr add data' . $message);
  }
}
