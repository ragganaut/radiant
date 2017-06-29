<?php
namespace Radiant;

class App
{
    private static $instance = NULL;
    private $events = [
        'templateIncluded' => NULL
    ];

    private function __construct()
    {
        $this->router = new \Radiant\Router;
    }

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new App;
        }

        return self::$instance;
    }

    public static function bind($event, $callable)
    {
        $app = self::$instance;
        $app->events[$event] = $callable;
    }

    public static function event($event, ...$arguments)
    {
        $app = self::$instance;
        if(is_callable($app->events[$event])) return call_user_func($app->events[$event], $arguments);
    }

    public static function getEvents()
    {
        $app = self::$instance;
        return $app->events;
    }

    public function dispatch()
    {
        include($_SERVER['DOCUMENT_ROOT'].'events.php');
        list($method, $arguments) = $this->router->parse();
        call_user_func_array($method, $arguments);
    }
}
