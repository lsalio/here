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
namespace Here\Admin\Controller;

use Exception;
use Here\Admin\Library\Mvc\Controller\AbstractController;


/**
 * Class LoginController
 * @package Here\Admin\Controller
 */
class LoginController extends AbstractController {

    /**
     * redirect to dashboard when had login
     *
     * @throws Exception
     */
    public function initialize() {
        parent::initialize();

        if ($this->administrator->loginFromToken()) {
            $this->response->redirect(['for' => 'dashboard']);
            $this->response->send();
        }
    }

    /**
     * Login page
     */
    public function indexAction() {
        if ($this->request->isPost()) {
            if (!$this->security->checkToken()) {
//                $this->view->setVar('error_message', _t('error_message_invalid_token'));
//                return;
            }

            $username = $this->request->getPost('username', 'trim');
            $password = $this->request->getPost('password', 'trim');
            if (!$username || !$password) {
                $this->view->setVar('error_message', _t('error_message_empty_login_params'));
                return;
            }

            if (!$this->administrator->verifyPassword($username, $password)) {
                $this->view->setVar('error_message', _t('error_message_empty_login_params'));
                return;
            }

            $this->administrator->signLoginToken();
            $this->response->redirect(['for' => 'dashboard']);
        }
    }

}
