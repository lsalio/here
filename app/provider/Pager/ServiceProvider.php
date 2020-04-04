<?php
/**
 * This file is part of here
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/wjiec/here
 */
namespace Here\Provider\Pager;

use Bops\Provider\AbstractServiceProvider;


/**
 * Class ServiceProvider
 *
 * @package Here\Provider\Pager
 */
class ServiceProvider extends AbstractServiceProvider {

    /**
     * Name of the service
     *
     * @return string
     */
    public function name(): string {
        return 'pager';
    }

    /**
     * @inheritDoc
     */
    public function register() {
        $this->di->set($this->name(), function(int $current, int $size, int $total) {
            return new Pager($current, $size, $total);
        });
    }

}
