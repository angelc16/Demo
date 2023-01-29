<?php

namespace Demo\Controller;

use Demo\Application\GetClientsAction;
use Demo\Infrastructure\Core\ControllerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Demo\Infrastructure\Models\ResponseObject;
header('Content-Type: application/json');

final class GetClientsController implements ControllerInterface
{
    private GetClientsAction $getClientsAction;

    public function __construct(GetClientsAction $getClientsAction)
    {
        $this->getClientsAction = $getClientsAction;
    }

    public function __invoke(Request $request): Response
    {
        try {
            $result =$this->getClientsAction->__invoke(
                $request->get('user_id')
            );
        } catch (\Exception $e) {
            $responseObject = new ResponseObject(false, null, 'Ha habido algún error' . $e->getMessage());
            return new Response(json_encode($responseObject), 500);
        }
        if($result !== null) {
            $statusCode = 200;
            $responseObject = new ResponseObject(true, $result, null);
        } else {
            $statusCode = 204;
            $responseObject = new ResponseObject(false, null, null);
        }
        return new Response(json_encode($responseObject), $statusCode);
    }
}