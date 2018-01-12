<?php
/**
 * SysRouterLifeCycleHook.php
 *
 * @package   Here
 * @author    ShadowMan <shadowman@shellboot.com>
 * @copyright Copyright (C) 2016-2018 ShadowMan
 * @license   MIT License
 * @link      https://github.com/JShadowMan/here
 */
namespace Here\Lib\Router\Hook;


/**
 * Class SysRouterLifeCycleHook
 * @package Here\Lib\Router\Hook
 */
final class SysRouterLifeCycleHook extends RouterLifeCycleHookBase {
    /**
     * @inheritdoc
     */
    public static function on_request_enter(): void {
        parent::on_request_enter(); // TODO: Change the autogenerated stub
    }

    /**
     * @inheritdoc
     */
    public static function on_response_leave(): void {
        parent::on_response_leave(); // TODO: Change the autogenerated stub
    }
}
