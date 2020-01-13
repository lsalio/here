<?php
/**
 * here application
 *
 * @package   here
 * @author    Jayson Wang <jayson@laboys.org>
 * @copyright Copyright (C) 2016-2019 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/lsalio/here
 */
namespace Here\Provider\Cookies;

use Here\Provider\AbstractServiceProvider;


/**
 * Class ServiceProvider
 * @package Here\Provider\Cookies
 */
class ServiceProvider extends AbstractServiceProvider {

    /**
     * The name of the service
     *
     * @var string
     */
    protected $service_name = 'cookies';

    /**
     * @inheritDoc
     */
    public function register() {
        $this->di->setShared($this->service_name, function() {
            return new Cookies(false, null);
        });
    }

}