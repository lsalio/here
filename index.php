<?php
/**
 * Thank for you reading this blog application.
 * 
 * @package Here
 * @author  ShadowMan
 */
# Root Directory
define('__HERE_ROOT_DIRECTORY__', dirname(__FILE__));

# Admin Directory
define('__HERE_ADMIN_DIRECTORY__', '/admin');

# Common Directory
define('__HERE_CORE_DIRECTORY__', '/include/Core');

# Core Class Directory
define('__HERE_CLASS_DIRECTORY__', '/include/Core/Here');

# Plugins Directory
define('__HERE_PLUGINS_DIRECTORY__', '/include/Plugins');

# Theme Directory
define('__HERE_THEME_DIRECTORY__', '/include/Theme');

@set_include_path(get_include_path() . PATH_SEPARATOR.
    __HERE_ROOT_DIRECTORY__ . __HERE_ADMIN_DIRECTORY__ . PATH_SEPARATOR.
    __HERE_ROOT_DIRECTORY__ . __HERE_CORE_DIRECTORY__ . PATH_SEPARATOR.
    __HERE_ROOT_DIRECTORY__ . __HERE_CLASS_DIRECTORY__ . PATH_SEPARATOR.
    __HERE_ROOT_DIRECTORY__ . __HERE_PLUGINS_DIRECTORY__ . PATH_SEPARATOR.
    __HERE_ROOT_DIRECTORY__ . __HERE_THEME_DIRECTORY__ . PATH_SEPARATOR
);

ob_start();
session_start();

# Core API
require_once 'Here/Core.php';

# Theme Support
require_once 'Here/Theme.php';

# Router Support
require_once 'Here/Router.php';

# Request Filter
require_once 'Here/Intercepter.php';

# Init Environment
Core::init();
Intercepter::init();

// TODO React: After the long long time
Core::setRouter((new Router())
->error('404', function($params, $message = null) {
    Theme::_404($message ? $message : null);
})
->hook('authorization', function($params) {
    // verify
})
->get(['/', '/index.php'], function($params){
    if (!@include_once './config.php') {
        file_exists('admin/install/install.php') ? header('Location: install.php') : print('Missing Config File'); exit;
    }
    Widget_Manage::factory('index');
})
->get('install.php', function($params){
    if (!@include_once './config.php') {
        file_exists('admin/install/install.php') ? include 'install/install.php' : print('Missing Config File'); exit;
    } else {
        Theme::_404('1984', 'Permission Denied'); // 0x7C0 :D
    }
})
->get('license.html', function($params) {
    Theme::_license();
})
->get('/admin/', function($params) {
    if (!@include_once 'config.php') {
        file_exists('admin/install/install.php') ? header('Location: install.php') : print('Missing Config File'); exit;
    }
    is_file('admin/index.php') ? include 'admin/index.php' : print('FATAL ERROR'); exit;
}, 'authorization')
->match(['get', 'post', 'put', 'patch', 'delete'], ['/service/$service/$action', '/service/$service/$action/$value'], function($params) {
    try {
        Common::noCache();
        Request::s($params['action'], isset($params['value']) ? $params['value'] : null, Request::REST);
        Service::$params['service']($params['action']);
    } catch (Exception $e) {
        Theme::_404($e->getMessage());
    }
}, 'authorization')
->execute());
