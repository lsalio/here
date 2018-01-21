<?php
/**
 * ResponseOperation.php
 *
 * @package   Here
 * @author    ShadowMan <shadowman@shellboot.com>
 * @copyright Copyright (C) 2016-2018 ShadowMan
 * @license   MIT License
 * @link      https://github.com/JShadowMan/here
 */
namespace Here\Lib\Stream\OStream\Client\Component;
use Here\Config\Constant\SysConstant;


/**
 * Trait ResponseOperation
 * @package Here\Lib\Stream\OStream\Client\Component
 */
trait ResponseOperation {
    /**
     * @var bool
     */
    private static $_commit_flag;

    /**
     * init response environments
     */
    final public static function init(): void {
        self::$_commit_flag = false;

        // start output buffer
        ob_start(function (string $buffer, int $phase): string {
            // when buffer is turned off
            if (
                $phase & PHP_OUTPUT_HANDLER_FINAL
                || $phase & PHP_OUTPUT_HANDLER_FLUSH
                || $phase & PHP_OUTPUT_HANDLER_WRITE
            ) {
                if (self::$_commit_flag) {
                    return $buffer;
                }

                throw new OutputBufferError("please commit response by `Response::commit()`");
            }

            self::$_commit_flag = false;
            return SysConstant::EMPTY_STRING;
        });
    }

    /**
     * clean output buffer and return
     */
    final public static function clean_response(): string {
        $contents = ob_get_contents();
        ob_clean();

        return $contents;
    }

    /**
     * commit response to client and exit
     */
    final public static function commit(): void {
        self::$_commit_flag = time();

        // buffer output
        ob_end_flush();
        exit();
    }
}