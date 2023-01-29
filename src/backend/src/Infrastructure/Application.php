<?php

namespace Demo\Infrastructure;


use Psr\Container\ContainerInterface;

use Demo\Infrastructure\Core;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


final class Application
{
    public function handle(Request $request): Response
    {
        $controller = $this->getController($request);

        return $controller->__invoke($request);
    }

    public function getContainer()
    {
        $containerBuilder = new \DI\ContainerBuilder();
        $containerBuilder->useAutowiring(true);
        $containerBuilder->addDefinitions(APP_DIRECTORY . '/config/services.php');

        return $containerBuilder->build();
    }

    private function getController(Request $request)
    {
        $controllersByCommands = [
            'register_transaction' => \Demo\Controller\RegisterTransactionController::class,
            'update_transaction' => \Demo\Controller\UpdateTransactionController::class,
            'get_clients' => \Demo\Controller\GetClientsController::class,
            'test' => \Demo\Controller\TestController::class
        ];

        $controllerClass = $controllersByCommands[$request->get('command')] ?? null;

        if ($controllerClass === null) {
            throw new ControllerNotFoundException();
        }
        return $this->getContainer()->get($controllerClass);
    }
}