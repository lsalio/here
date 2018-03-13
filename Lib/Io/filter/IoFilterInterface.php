<?php
/**
 * IoFilterInterface.php
 *
 * @package   Here
 * @author    ShadowMan <shadowman@shellboot.com>
 * @copyright Copyright (C) 2016-2017 ShadowMan
 * @license   MIT License
 * @link      https://github.com/JShadowMan/here
 */
namespace Here\Lib\Io\Filter;


/**
 * Interface IoFilterInterface
 * @package Here\Lib\IO
 */
interface IoFilterInterface {
    /**
     * @param string $object
     * @param mixed|null $default
     * @return mixed|null
     */
    public function apply($object, $default = false);
}
