<?php

namespace Demo\Application;

use Demo\Domain\Client;
use Demo\Application\Utils\Utils;
use Demo\Domain\ClientRepositoryInterface;
use Symfony\Component\Config\Definition\BooleanNode;

final class GetClientsAction
{
    private ClientRepositoryInterface $clientRepository;

    public function __construct(ClientRepositoryInterface $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function __invoke($clientId)
    {
        $client = new Client();
        if($this->validate($clientId)){
            $client->setId($clientId);
        };
        $result = $this->clientRepository->get($client);
        if ($result instanceof Client) {
            if($result->getEmail() === null)
            {
                return null;
            }
        }
        return $result;
    }

    private function validate($clientId): bool
    {
        return !empty($clientId);
    }

}