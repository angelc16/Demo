<?php

namespace Demo\Controller;

use Demo\Application\UpdateTransactionAction;
use Demo\Infrastructure\Core\ControllerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Demo\Infrastructure\Models\ResponseObject;
header('Content-Type: application/json');

final class UpdateTransactionController implements ControllerInterface
{
    private UpdateTransactionAction $updateTransactionAction;

    public function __construct(UpdateTransactionAction $updateTransactionAction)
    {
        $this->updateTransactionAction = $updateTransactionAction;
    }

    public function __invoke(Request $request): Response
    {
        try {
            if ($request->getMethod() !== 'PUT' ) {
                exit();
            }
            $parameters = json_decode($request->getContent(), true);
            $this->updateTransactionAction->__invoke(
                $parameters['reason'],
                $parameters['quantity'],
                $parameters['transactionId'],
            );
        } catch (\Exception $e) {
            $responseObject = new ResponseObject(false, null, 'Ha habido algún error' . $e->getMessage());
            return new Response(json_encode($responseObject), 500);
        }
        $responseObject = new ResponseObject(true, null, 'Transacción actualizada correctamente!');
        return new Response(json_encode($responseObject), 201);
    }
}