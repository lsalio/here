<?php
/**
 * Assert.php
 *
 * @package   Here\Lib
 * @author    ShadowMan <shadowman@shellboot.com>
 * @copyright Copyright (C) 2016-2017 ShadowMan
 * @license   MIT License
 * @link      https://github.com/JShadowMan/here
 */
namespace Here\Lib;
use Here\Lib\Abstracts\ExceptionBase;
use Here\Lib\Exception\AssertError;


/**
 * Class Assert
 * @package Here\Lib
 */
final class Assert {
    /**
     * @param mixed $object
     * @param ExceptionBase|null $exception
     */
    final public static function String($object, ExceptionBase $exception = null) {
        if (!is_string($object)) {
            self::_throw($exception);
        }
    }

    /**
     * @param mixed $object
     * @param ExceptionBase|null $exception
     */
    final public static function Integer($object, ExceptionBase $exception = null) {
        if (!is_integer($object)) {
            self::_throw($exception);
        }
    }

    /**
     * @param $expression
     * @param ExceptionBase|null $exception
     */
    final public static function True($expression, ExceptionBase $exception = null) {
        if ($expression !== true) {
            self::_throw($exception);
        }
    }

    /**
     * @param $expression
     * @param ExceptionBase|null $exception
     */
    final public static function False($expression, ExceptionBase $exception = null) {
        self::True(!$expression, $exception);
    }

    /**
     * @param ExceptionBase $exception
     * @throws AssertError
     */
    final private static function _throw(ExceptionBase $exception) {
        if ($exception === null) {
            $exception = new AssertError('Assert error', '');
        }
        throw $exception;
    }
}