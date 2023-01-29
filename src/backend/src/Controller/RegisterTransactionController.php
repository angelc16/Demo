<?php

namespace Demo\Controller;

use Demo\Application\RegisterTransactionAction;
use Demo\Infrastructure\Core\ControllerInterface;
use Demo\Infrastructure\Models\ResponseObject;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
header('Content-Type: application/json');

final class RegisterTransactionController implements ControllerInterface
{
    private RegisterTransactionAction $registerTransactionAction;

    public function __construct(RegisterTransactionAction $registerTransactionAction)
    {
        $this->registerTransactionAction = $registerTransactionAction;
    }

    public function __invoke(Request $request): Response
    {
        try {
            $this->registerTransactionAction->__invoke(
                $request->get('channelId'),
                $request->get('bankId'),
                $request->get('quantity'),
                $request->get('currencyId'),
                $request->get('bankCode'),
                $request->get('clientId'),
            );
        } catch (\Exception $exception) {
            return new Response(json_encode(new ResponseObject(false, null, 'Error al agregar transacción')), 500);
        }

        return new Response(json_encode(new ResponseObject(true, null, 'Exito')),201);
    }
}