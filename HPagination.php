<?php
/**
 * Copyright (c) 2020. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
 * Morbi non lorem porttitor neque feugiat blandit. Ut vitae ipsum eget quam lacinia accumsan.
 * Etiam sed turpis ac ipsum condimentum fringilla. Maecenas magna.
 * Proin dapibus sapien vel ante. Aliquam erat volutpat. Pellentesque sagittis ligula eget metus.
 * Vestibulum commodo. Ut rhoncus gravida arcu.
 */

namespace common\helpers;


class HPagination
{
  const DEFAULT_PAGE = 0;

  public static $converNames = [
    'totalCount' => 'total_count',
    'pageCount' => 'total_pages',
    'currentPage' => 'page',
    'perPage' => 'per_page', // pageSize in pangination
  ];
  public static $default_page_size = 20;
  public static $pagination_name = 'pagination';

  public static function convertFromDataProvider(array &$dataArray): bool
  {
    if (isset($dataArray[self::$pagination_name])) {
      return HArray::convertKey($dataArray[self::$pagination_name], self::$converNames);
    }
    return false;
  }

  public static function convertToDataProvider(array &$dataArray): bool
  {
    if (isset($dataArray[self::$pagination_name])) {
      return HArray::convertKey($dataArray[self::$pagination_name], array_flip(self::$converNames));
    }
    return false;
  }

  /**
   * @param array $params
   * @param string $forName
   * @return array
   */
  public static function getForDataProvider(array $params = [], $forName = '')
  {
    if (empty($params)) {
      $params = \Yii::$app->getRequest()->getQueryParams();
    }
    if (!empty($forName) && isset($params[$forName])) {
      $params = $params[$forName];
    } else {
      $params = [];
    }

    $return = [
      'page' => isset($params['page']) ? $params['page'] : self::DEFAULT_PAGE,
    ];

    if (isset($params['per_page'])) {
      $return['pageSize'] = $params['per_page'];
    } elseif (isset($params['per-page'])) {
      $return['pageSize'] = $params['per-page'];
    } else {
      $return['pageSize'] = self::$default_page_size;
    }

    if (isset($params['total_count'])) {
      $return['totalCount'] = $params['total_count'];
    }

    return $return;
  }

  public static function getForRequest(array $params = [], $forName = '')
  {
    if (empty($params)) {
      $params = \Yii::$app->getRequest()->getQueryParams();
    }
    if (!empty($forName)) {
      $params = $params[$forName];
    }

    $return = [];
    if (isset($params['page'])) {
      $return['page'] = ($params['page'] > 0 ? ($params['page'] - 1) : 0);
    } else {
      $return['page'] = self::DEFAULT_PAGE;
    }

    if (isset($params['per_page'])) {
      $return['per_page'] = $params['per_page'];
    } elseif (isset($params['per-page'])) {
      $return['per_page'] = $params['per-page'];
    } else {
      $return['per_page'] = self::$default_page_size;
    }
    return $return;
  }


  /**
   * @param array $params
   * @param string $forName
   * @param bool $enable_page_dec
   * @return \yii\data\Pagination
   */
  public static function getPaginationModel(array $params = [], $forName = '', $enable_page_dec = true)
  {
    $params = self::getForDataProvider($params, $forName);
    $pagination = new \yii\data\Pagination($params);
    if ($enable_page_dec) {
      $pagination->page = $pagination->page > 0 ? $pagination->page - 1 : $pagination->page;
    }
    return $pagination;
  }


}