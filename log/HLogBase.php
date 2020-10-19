<?php
/**
 * Copyright (c) 2020. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
 * Morbi non lorem porttitor neque feugiat blandit. Ut vitae ipsum eget quam lacinia accumsan.
 * Etiam sed turpis ac ipsum condimentum fringilla. Maecenas magna.
 * Proin dapibus sapien vel ante. Aliquam erat volutpat. Pellentesque sagittis ligula eget metus.
 * Vestibulum commodo. Ut rhoncus gravida arcu.
 */

namespace common\helpers\log;

use yii\log\Logger;

abstract class HLogBase
{

  protected static function log($message, $level, $category = null)
  {
    if ($category != null) {
      $category = static::$categoryBase . '.' . $category;
    } else {
      $category = static::getCategory();
    }
    return \Yii::getLogger()->log($message, $level, $category);
  }

  public static function info($message, $category = null)
  {
    return static::log($message, Logger::LEVEL_INFO, $category);
  }

  public static function error($message, $category = null)
  {
    return static::log($message, Logger::LEVEL_ERROR, $category);
  }

  public static function warning($message, $category = null)
  {
    return static::log($message, Logger::LEVEL_WARNING, $category);
  }


  /**
   * @return mixed
   */
  public static function getCategory()
  {
    return static::$category;
  }

  /**
   * @param mixed $category
   */
  public static function setCategory($sub = null): void
  {
    if ($sub !== null) {
      static::$category = static::$categoryBase . '.' . $sub;
    }
  }

  /**
   * @return string
   */
  public static function getCategoryBase(): string
  {
    return self::$categoryBase;
  }

  /**
   * @param string $categoryBase
   */
  public static function setCategoryBase(string $categoryBase): void
  {
    self::$categoryBase = $categoryBase;
  }


}