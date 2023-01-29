<?php

namespace Demo\Controller;

use Demo\Application\RegisterTransactionAction;
use Demo\Infrastructure\Core\ControllerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Demo\Infrastructure\Models\ResponseObject;

final class TestController implements ControllerInterface
{
    private RegisterTransactionAction $registerTransactionAction;

    public function __construct(RegisterTransactionAction $registerTransactionAction)
    {
        $this->registerTransactionAction = $registerTransactionAction;
    }

    public function __invoke(Request $request): Response
    {
        try {
            $parameters = json_decode($request->getContent(), true);
            // $this->registerTransactionAction->__invoke(
            //     // $request->get('imageUrl'),
            //     // $parameters['channelId'],
            // );
        } catch (\Exception $exception) {
            return new Response(json_encode(new ResponseObject(false, null, 'Error')), 400);
        }

        return new Response(json_encode(new ResponseObject(true, null, 'Exito')));
    }
}