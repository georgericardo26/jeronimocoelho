<?php
ini_set('display_errors', '0');
error_reporting(E_ALL);
use helpers\Utils;
use Phalcon\Events\Event;
use Phalcon\Loader;
use Phalcon\Mvc\Router;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Application;
use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\Url as UrlProvider;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;
use Phalcon\flash\Direct as Flashdirect;
use Phalcon\Flash\Session as FlashSession;
use Phalcon\Mvc\View\Engine\Volt;
use Phalcon\Session\Bag as SessionBag;
use Phalcon\Session\Adapter\Files as Session;
use Phalcon\Annotations\Factory;
use Phalcon\Events\Manager as EventsManager;
use ServiceVolt\ServiceVolt;

// Define some absolute path constants to aid in locating resources
define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/app');

$eventsManager = new EventsManager();
// Register an autoloader
$loader = new Loader();

$dirs = array(
    APP_PATH . '/config/',
    APP_PATH . '/controllers/',
    APP_PATH . '/models/',
    APP_PATH. '/assets/',
    BASE_PATH. '/cache/'
);

$loader->registerDirs(
    $dirs
);

// Register some namespaces
$loader->registerFiles(
    [
        APP_PATH.'/controllers/ControllerBase.php',
        APP_PATH.'/models/Administrador.php',
        APP_PATH.'/models/Galeria.php',
        APP_PATH.'/models/Multimedia.php',
        APP_PATH.'/models/Urologia.php',
        APP_PATH.'/models/Categorias.php',
        APP_PATH.'/config/routers.php',
        APP_PATH.'/services/Service.php',
        APP_PATH.'/helpers/Utils.php',
        APP_PATH.'/controllers/AjaxController.php'
    ]
);

/*$loader->registerNamespaces([
    'ServiceVolt' => APP_PATH . '/services/service/',
    'helpers'        => APP_PATH . '/helpers/'
]);*/

// Listen all the loader events
$eventsManager->attach(
    'loader:beforeCheckPath',
    function (Event $event, Loader $loader) {
       // echo $loader->getCheckedPath()."<br>";
    }
);

$loader->setEventsManager($eventsManager);

$loader->register();

// Create a DI
$di = new FactoryDefault();

//flash
$di->set(
    'flash',
    function () {
       return new Flashdirect();
    }
);

// Start the session the first time when some component request the session service
$di->setShared(
    'session',
    function () {
        $session = new Session();

        $session->start();

        return $session;
    }
);

/**
 * Router
 */
/*$di->setShared(
    'router',
    function () {
        return new Router(false);
    }
);*/


// Register Volt as a service
$di->set(
    'voltService',
    function ($view, $di) {
        $volt = new Volt($view, $di);

        $volt->setOptions(
            [
                'compiledPath'      => APP_PATH . '/templates/',
                'compiledSeparator' => '_',
                'compileAlways' => TRUE, // use if problems with updating files exist
                'compiledExtension' => '.compiled',
            ]
        );

        ServiceVolt::add_function($volt);

        return $volt;
    }
);

//functions custom
$di->set(
    'utils',
    function () {
        return new Utils();
    }
);

// Setup the view component
$di->set(
    'view',
    function () {
        $view = new View();
        $view->setViewsDir(APP_PATH . '/views/');
        $view->registerEngines(
            [
                '.phtml' => 'voltService'
            ]
        );

        return $view;
    }
);

// Setup a base URI
$di->set(
    'url',
    function () {
        $url = new UrlProvider();
        $url->setBaseUri('/');
        return $url;
    }
);

// Setup the database service
$di->set(
    'db',
    function () {
        return new DbAdapter(
            [
                "host"     => "localhost",
                "dbname"   => "urologia",
                "username" => "root",
                "password" => "root",
                "options" => array(
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
                )
                //adminjeronimourologia
            ]
        );
    }
);

/*** annotations ***/
$options = [
    'prefix'   => 'annotations',
    'lifetime' => '3600',
    'adapter'  => 'memory',      // Load the Memory adapter
];
$annotations = Factory::load($options);

$application = new Application($di);

try {
    // Handle the request
    $response = $application->handle();
    $response->send();
} catch (\Exception $e) {
    echo 'Exception: ', $e->getMessage();
}