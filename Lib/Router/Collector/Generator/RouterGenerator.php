<?php
/**
 * RouterGenerator.php
 *
 * @package   here
 * @author    ShadowMan <shadowman@shellboot.com>
 * @copyright Copyright (C) 2016-2017 ShadowMan
 * @license   MIT License
 * @link      https://github.com/JShadowMan/here
 */
namespace Here\Lib\Router\Collector\Generator;
use Here\Lib\Env\BooleanString;
use Here\Lib\Env\GlobalEnvironment;
use Here\Lib\Router\Collector\Handler\RouterHandler;
use Here\Lib\Router\Collector\RouterType;
use Here\Lib\Router\Collector\Channel\RouterChannel;
use Here\Lib\Router\Collector\Middleware\RouterMiddleware;
use Here\Lib\Router\RouterCallback;


/**
 * Class RouterGenerator
 * @package Here\Lib\Router\Collector\Generator
 */
final class RouterGenerator {
    /**
     * @param \ReflectionMethod $method
     * @param RouterCallback $callback
     * @return bool|RouterChannel|RouterMiddleware|RouterHandler
     * @throws ExplicitTypeDeclareMissing
     */
    final public static function generate(\ReflectionMethod $method, RouterCallback $callback) {
        // skip all private/protected and private-like methods
        if ($method->name[0] === '_' || !$method->isPublic()) {
            return false;
        }

        $meta_info = self::_get_meta_info($method->getDocComment());
        switch (RouterTypeAnalyzer::analysis($meta_info)->value()) {
            case RouterType::ROUTER_TYPE_CHANNEL:
                return new RouterChannel($method->name, $meta_info, $callback);
            case RouterType::ROUTER_TYPE_MIDDLEWARE:
                return new RouterMiddleware($method->name, $meta_info, $callback);
            case RouterType::ROUTER_TYPE_HANDLER:
                return new RouterHandler($method->name, $meta_info, $callback);
            case RouterType::ROUTER_TYPE_UNKNOWN:
                if (BooleanString::is_true(GlobalEnvironment::get_user_env('strict_router'))) {
                    throw new ExplicitTypeDeclareMissing("'{$method->name}' missing explicit router-type declare");
                }
        }

        return false;
    }

    /**
     * @param string $meta_string
     * @return array
     */
    final private static function _get_meta_info(string $meta_string): array {
        $meta_info = array();

        $meta_string = self::_clean_string($meta_string);
        foreach (explode("\n", $meta_string) as $line) {
            if (preg_match('/@(?<name>\w+)\s*(?<value>.*)?/', $line, $matches)) {
                if (!isset($meta_info[$matches['name']])) {
                    $meta_info[$matches['name']] = array();
                }
                $meta_info[$matches['name']][] = $matches['value'];
            }
        }

        return $meta_info;
    }

    /**
     * @param string $string
     * @return string
     */
    final private static function _clean_string(string $string): string {
        return str_replace(array("\r\n", "\n"), "\n", $string);
    }
}
