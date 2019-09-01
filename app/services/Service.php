<?php
/**
 * Created by PhpStorm.
 * User: georgericardo
 * Date: 26/06/19
 * Time: 09:31
 */

namespace ServiceVolt;
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

class ServiceVolt
{
    public static function add_function(Volt $volt)
    {
        $compiler = $volt->getCompiler();
        $compiler->addFunction('strlen',
            function($resolvedArgs, $exprArgs) use ($compiler) {

                $string= $compiler->expression($exprArgs[0]['expr']);

                $secondArgument = $compiler->expression($exprArgs[1]['expr']);

                return 'substr(' . $string . ', 0 ,' . $secondArgument . ')';
            });

        $compiler->addFunction(
            'urlyoutube',
            function ($resolvedArgs, $exprArgs) {

                return 'helpers\Utils::upper('.$resolvedArgs.')';
            }
        );

    }

}