<?php

namespace Demo\Infrastructure\Repository;

use Demo\Domain\Transaction;
use Demo\Domain\TransactionTrack;

final class TransactionRepositoryMySql implements \Demo\Domain\TransactionRepositoryInterface
{
    private \PDO $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function update(TransactionTrack $transaction): void
    {
        $this->pdo->beginTransaction();
        $statementUpdate = $this->pdo->prepare("UPDATE transaction SET Quantity=:quantity where Id=:transaction_id");
        $statementUpdate->execute(array(
            ':quantity' => $transaction->getQuantity(),
            ':transaction_id' => $transaction->getTransactionId()
        ));
        $statementCreate = $this->pdo->prepare("INSERT INTO transaction_tracking
        (Reason, Quantity, CreationTime, TransactionId)
        VALUES (:reason, :quantity, :creationTime, :transaction_id)");
        $statementCreate->execute(array(
            ':reason' => $transaction->getReason(),
            ':quantity' => $transaction->getQuantity(),
            ':creationTime' => $transaction->setCurrentDate(),
            ':transaction_id' => $transaction->getTransactionId(),
        ));
        $this->pdo->commit();
    }

    public function save(Transaction $transaction): void
    {
        $statement = $this->pdo->prepare("INSERT INTO transaction(
            CreationDate, ChannelId, BankId, Quantity, CurrencyId, Image, BankCode, ClientId) VALUES
            (:creationTime, :channelId, :bankId, :quantity, :currencyId, :fileUrl, :bankCode, :clientId)");
        $statement->execute(array(
            ':creationTime' => $transaction->getCurrentDate(),
            ':channelId' => $transaction->getChannelId(),
            ':bankId' => $transaction->getBankId(),
            ':quantity' => $transaction->getQuantity(),
            ':currencyId' => $transaction->getCurrencyId(),
            ':fileUrl' => $transaction->getFileUrl(),
            ':bankCode' => $transaction->getBankCode(),
            ':clientId' => $transaction->getClientId()
        ));
    }
}