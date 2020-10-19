<?php
/**
 * Copyright (c) 2020. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
 * Morbi non lorem porttitor neque feugiat blandit. Ut vitae ipsum eget quam lacinia accumsan.
 * Etiam sed turpis ac ipsum condimentum fringilla. Maecenas magna.
 * Proin dapibus sapien vel ante. Aliquam erat volutpat. Pellentesque sagittis ligula eget metus.
 * Vestibulum commodo. Ut rhoncus gravida arcu.
 */

namespace common\helpers\log;

/**
 * HLogCronInfo::info(
 * 'Статус компаний  не был изменен на ' . $status,
 * HLogCronInfo::CATEGORY_COMPANY_STATUS
 * );
 *
 * Class HLogCronInfo
 * @package common\helpers\log
 */
class HLogCronInfo extends HLogBase
{
  protected static $categoryBase = 'cron_info';
  protected static $category = 'cron_info.000';
  const CATEGORY_USER_STATUS = 'user_status';
  const CATEGORY_COMPANY_STATUS = 'company_status';
  const CATEGORY_MAIL_STATUS = 'mail_status';

}