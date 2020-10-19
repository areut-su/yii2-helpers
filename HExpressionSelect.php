<?php
/**
 * Copyright (c) 2020. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
 * Morbi non lorem porttitor neque feugiat blandit. Ut vitae ipsum eget quam lacinia accumsan.
 * Etiam sed turpis ac ipsum condimentum fringilla. Maecenas magna.
 * Proin dapibus sapien vel ante. Aliquam erat volutpat. Pellentesque sagittis ligula eget metus.
 * Vestibulum commodo. Ut rhoncus gravida arcu.
 */

namespace common\helpers;


use yii\db\Expression;

class HExpressionSelect
{
  public static function getUserName()
  {
    return ['name' => new Expression('concat(name," ",surname," (",user_auth_data.login,")")'), 'id' => 'user_auth_data.user_id'];
  }
}