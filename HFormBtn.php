<?php
/**
 * Copyright (c) 2020. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
 * Morbi non lorem porttitor neque feugiat blandit. Ut vitae ipsum eget quam lacinia accumsan.
 * Etiam sed turpis ac ipsum condimentum fringilla. Maecenas magna.
 * Proin dapibus sapien vel ante. Aliquam erat volutpat. Pellentesque sagittis ligula eget metus.
 * Vestibulum commodo. Ut rhoncus gravida arcu.
 */

namespace common\helpers;


use yii\helpers\Html;

class HFormBtn
{

  /**
   * Кнопки
   *
   * @param null $content
   * @param $options
   * @return string
   */
  public static function submitRight($content = null, $options = [])
  {
    return Html::submitButton($content ?? 'Сохранить', array_merge(['class' => 'btn btn-success', 'style' => 'float:right;'], $options));
  }

  public static function returnRight($url, $content = null, $options = [])
  {
    return Html::a($content ?? 'Назад', $url, array_merge(['class' => 'btn btn-success', 'style' => 'float:right;'], $options));
  }

  public static function ResetRight($url, $content = null, $options = [])
  {
    return self::returnRight($url, $content ?? 'Сбросить', array_merge(['class' => 'btn btn-danger', 'style' => 'float:right;'], $options));
  }
}