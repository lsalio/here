<?php
/**
 * Base64Adapter.php
 *
 * @package   Here
 * @author    ShadowMan <shadowman@shellboot.com>
 * @copyright Copyright (C) 2016-2017 ShadowMan
 * @license   MIT License
 * @link      https://github.com/JShadowMan/here
 */
namespace Here\Lib\Utils\RSA\TransformAdapter;


/**
 * Class Base64Adapter
 * @package Here\Lib\Utils\RSA\OutputAdapter
 */
final class Base64Adapter implements TransformAdapterInterface {
    /**
     * @param array $input
     * @param string $glue
     * @return string
     */
    final public function transform_forward(array $input, string $glue): string {
        return join($glue, array_map(function (string $segment): string {
            return base64_encode($segment);
        }, $input));
    }

    /**
     * @param string $input
     * @param string $glue
     * @return array
     */
    final public function transform_backward(string $input, string $glue): array {
        return array_map(function (string $segment): string {
            return base64_decode($segment);
        }, explode($glue, $input));
    }
}
