<?php

namespace Demo\Infrastructure\Repository;

use Demo\Domain\Client;

final class ClientRepositoryMySql implements \Demo\Domain\ClientRepositoryInterface
{
    private \PDO $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function get(Client $client)
    {
        if((!empty($client->getId()))) {
            $stmt = $this->pdo->prepare("SELECT *
            FROM client WHERE Id =:user_id");
            $stmt->execute(array(':user_id' => $client->getId()));
            $row=$stmt->fetch(\PDO::FETCH_ASSOC);
            if ($row) {
                $client = new Client();
                $client->setId($row['Id']);
                $client->setName($row['Name']);
                $client->setDocumentNumber($row['DocumentNumber']);
                $client->setEmail($row['Email']);

                $stmtAmount = $this->pdo->prepare("SELECT
                COALESCE(ROUND(sum(Quantity),2),0) as Quantity, C.symbol as CurrencyName
                from transaction T
                inner join currency C ON T.currencyId = C.Id
                where  clientId=:user_id group by currencyId");
                $stmtAmount->execute(array(':user_id' => $client->getId()));
                $rowsAmount=$stmtAmount->fetchAll(\PDO::FETCH_ASSOC);
                $client->setBalance($rowsAmount);

                $stmtTransaction = $this->pdo->prepare("SELECT
                T.*, C.Name as ChannelName, M.Symbol as CurrencyName, B.Name as BankName
                FROM transaction T
                inner join channel C on T.ChannelId = C.Id
                inner join currency M on T.CurrencyId = M.Id
                inner join bank B on T.BankId = B.Id
                WHERE ClientId = :user_id
                ORDER BY CreationDate DESC");
                $stmtTransaction->execute(array(':user_id' => $client->getId()));
                $rowsTransactions=$stmtTransaction->fetchAll(\PDO::FETCH_ASSOC);
                $client->setTransactions($rowsTransactions);
            }
            return $client;
        } else {
            $stmt = $this->pdo->query("SELECT Id as PlayerID, Name FROM client order by Name");
            $listClients=$stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $listClients;
        }
    }
}