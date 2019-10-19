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
namespace Here\Libraries\Field\Store\Adapter;

use Here\Libraries\Field\Store\AbstractStore;
use Here\Libraries\Field\Store\StoreInterface;


/**
 * Class Memory
 * @package Here\Libraries\Field\Store\Adapter
 */
final class Memory extends AbstractStore {

    /**
     * @var array
     */
    private $store;

    /**
     * Memory constructor.
     */
    final public function __construct() {
        $this->store = array();
    }

    /**
     * Returns the specify key whether is in the store
     *
     * @param string $key
     * @return bool
     */
    final public function exists(string $key): bool {
        return isset($this->store[$key]);
    }

    /**
     * Get the value of specify key in the store. Returns
     * default when the key not exists
     *
     * @param string $key
     * @param null $default
     * @return mixed
     */
    final public function get(string $key, $default = null) {
        return $this->store[$key] ?? $default;
    }

    /**
     * Add a string value to the store
     *
     * @param string $key
     * @param string $value
     * @return StoreInterface
     */
    final public function setString(string $key, string $value): StoreInterface {
        $this->store[$key] = $value;
        return $this;
    }

    /**
     * Add a integer value to the store
     *
     * @param string $key
     * @param int $value
     * @return StoreInterface
     */
    final public function setInteger(string $key, int $value): StoreInterface {
        $this->store[$key] = $value;
        return $this;
    }

    /**
     * Add a float value to the store
     *
     * @param string $key
     * @param int $value
     * @return StoreInterface
     */
    final public function setFloat(string $key, int $value): StoreInterface {
        $this->store[$key] = $value;
        return $this;
    }

    /**
     * Add a boolean value to the store
     *
     * @param string $key
     * @param bool $value
     * @return StoreInterface
     */
    final public function setBoolean(string $key, bool $value): StoreInterface {
        $this->store[$key] = $value;
        return $this;
    }

}