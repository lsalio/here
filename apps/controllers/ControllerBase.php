<?php
/**
 * ControllerBase.php
 *
 * @package   here
 * @author    ShadowMan <shadowman@shellboot.com>
 * @copyright Copyright (C) 2016-2018 ShadowMan
 * @license   MIT License
 * @link      https://github.com/JShadowMan/here
 */
namespace Here\Controllers;


use Here\Frontend\Controllers\InstallerController;
use Phalcon\Dispatcher;
use Phalcon\Mvc\Controller;


/**
 * Class ControllerBase
 * @package Here\Controllers
 */
abstract class ControllerBase extends Controller {

    /**
     * @param Dispatcher $dispatcher
     */
    final public function beforeExecuteRoute(Dispatcher $dispatcher) {
        // avoid circulate reference
        if ($dispatcher->getHandlerClass() !== InstallerController::class) {
            // check application installed
            if (!$this->checkApplicationInstalled()) {
                // forward to installing
                $this->dispatcher->forward(array(
                    'module' => 'frontend',
                    'controller' => 'installer',
                    'action' => 'first'
                ));
            }
        }
    }

    /**
     * @return bool
     */
    final private function checkApplicationInstalled(): bool {
        $config_root = $this->di->get('config')->application->configs_root;
        return is_file($config_root . '/application_installed');
    }


}
