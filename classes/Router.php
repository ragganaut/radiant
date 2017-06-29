<?php
namespace Radiant;

use \Radiant\Exceptions\NotFoundException as NotFoundException;

class Router
{
    private $routes = [];

    public function __construct()
    {
        include $_SERVER['DOCUMENT_ROOT'].'routes.php';
    }

    public function add(string $route, callable $method)
    {
        $this->routes[] = [
            'route' => $route,
            'method' => $method
        ];
    }

    public function parse()
    {
        foreach ($this->routes as $route) {
            if (preg_match($route['route'], $_SERVER['REQUEST_URI'], $matches)) {
                $matches = array_slice($matches, 1);
                return [$route['method'], $matches];
            }
        }

        throw new NotFoundException('Не найдено подходящего маршрута.');
    }
}
