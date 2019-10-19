<?php
/**
 * here application
 *
 * @package   here
 * @author    Jayson Wang <jayson@laboys.org>
 * @copyright Copyright (C) 2016-2019 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/nosjay/here
 */
namespace Here\Libraries\Field\Store;


/**
 * Interface StoreInterface
 * @package Here\Libraries\Field\Store
 */
interface StoreInterface {

    /**
     * Returns the specify key whether is in the store
     *
     * @param string $key
     * @return bool
     */
    public function exists(string $key): bool;

    /**
     * Get the value of specify key in the store. Returns
     * default when the key not exists
     *
     * @param string $key
     * @param null $default
     * @return mixed
     */
    public function get(string $key, $default = null);

    /**
     * Add a mixed value to the store, and type of value
     * will convert to one of string, integer, float
     * or boolean type
     *
     * @param string $key
     * @param $value
     * @return StoreInterface
     */
    public function set(string $key, $value): StoreInterface;

    /**
     * Add a string value to the store
     *
     * @param string $key
     * @param string $value
     * @return StoreInterface
     */
    public function setString(string $key, string $value): StoreInterface;

    /**
     * Add a integer value to the store
     *
     * @param string $key
     * @param int $value
     * @return StoreInterface
     */
    public function setInteger(string $key, int $value): StoreInterface;

    /**
     * Add a float value to the store
     *
     * @param string $key
     * @param int $value
     * @return StoreInterface
     */
    public function setFloat(string $key, int $value): StoreInterface;

    /**
     * Add a boolean value to the store
     *
     * @param string $key
     * @param bool $value
     * @return StoreInterface
     */
    public function setBoolean(string $key, bool $value): StoreInterface;

}