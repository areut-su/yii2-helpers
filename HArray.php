<?php
/**
 * Copyright (c) 2020. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
 * Morbi non lorem porttitor neque feugiat blandit. Ut vitae ipsum eget quam lacinia accumsan.
 * Etiam sed turpis ac ipsum condimentum fringilla. Maecenas magna.
 * Proin dapibus sapien vel ante. Aliquam erat volutpat. Pellentesque sagittis ligula eget metus.
 * Vestibulum commodo. Ut rhoncus gravida arcu.
 */

namespace common\helpers;

use yii\base\Arrayable;
use yii\base\Model;

class HArray
{
  /**
   * Меняет индексы в массиве
   * @param array $dataArray
   * @param array $keys
   * @param bool $rewrite
   * @return bool
   */

  public static function convertKey(array &$dataArray, array $keys, bool $rewrite = true): bool
  {
    $flag = true;
    foreach ($keys as $old_key => $new_key) {
      if (isset($dataArray[$old_key])) {
        $dataArray[$new_key] = $dataArray[$old_key];
        if ($rewrite) {
          unset($dataArray[$old_key]);
        }
      } else {
        $flag = false;
      }
    }
    return $flag;
  }

  /**
   *
   * ['data1'=>'value1','data2'=>'value3',] = >[
   * ['key_name'=>'data1','value_name'=>'value1']
   * ['key_name'=>'data2','value_name'=>'value2']
   * ]
   *
   * @param array $listDepartment
   * @param string $key_name
   * @param string $value_name
   * @return array
   */

  public static function convertKeyToParams(array $listDepartment, string $key_name, string $value_name): array
  {
    $out = [];
    foreach ($listDepartment as $id => $name) {
      $out[] = [$key_name => $id, $value_name => $name];
    }
    return $out;

  }


  /**
   * Заполняет массив моделей (массивов) значениями
   * @param Model[] $models
   * @param array $values
   * @return bool
   */
  public static function setValuesMultiple(&$models, array $values)
  {
    $f = true;
    foreach ($models as &$model) {
      foreach ($values as $key => $val) {
        $model[$key] = $val;
      }
    }
    return $f;
  }

  /**
   * возвращает значения заданные в массиве фильтра $keys, если задан Index то добавляет индекс
   * @param array $dataArray
   * @param array $keys
   * @param null $index
   * @return array
   */
  public static function filterValue(array $dataArray, array $keys, $indexKey = null): array
  {
    $result = [];
    $first = reset($dataArray);
    if (is_array($first) || $first instanceof Arrayable) {
      foreach ($dataArray as $items) {
        $item_out = [];
        foreach ($keys as $key) {
          if (isset($items[$key])) {
            $item_out[$key] = $items[$key];
          }
        }
        if ($indexKey === null) {
          $result[] = $item_out;
        } else {
          $result[$items[$indexKey]] = $item_out;
          // $result[$items[$indexKey]] = array_intersect_key($items, array_flip($keys)); не работает с Arrayable
        }
      }
    }
    return $result;
  }

  /**
   * Удляет пустые элементы
   * @param $data
   * @return array
   */
  public static function filterEmptyValue($data)
  {
    foreach ($data as $k => $item) {
      if (empty($item) && !is_numeric($item)) {
        unset($data[$k]);
      }
    }
    return $data;
  }


}