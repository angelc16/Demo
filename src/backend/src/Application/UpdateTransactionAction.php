<?php

namespace Demo\Application;

use Demo\Application\Utils\Utils;
use Demo\Domain\TransactionRepositoryInterface;
use Demo\Domain\TransactionTrack;

final class UpdateTransactionAction
{
    private TransactionRepositoryInterface $transactionRepository;

    public function __construct(TransactionRepositoryInterface $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;
    }

    public function __invoke($reason, $quantity, $transactionId)
    {
        $this->validate($reason, $transactionId, $quantity);
        $transactionTrack = new TransactionTrack();
        date_default_timezone_set("America/Lima");
        $transactionTrack->setQuantity($quantity);
        $transactionTrack->setReason(trim(htmlspecialchars($reason)));
        $transactionTrack->setTransactionId($transactionId);
        $transactionTrack->setCurrentDate(date('Y-m-d H:i:s'));
        $this->transactionRepository->update($transactionTrack);
    }

    private function validate($reason, $transactionId, $quantity)
    {
        $MAX_QUANTITY = 1000000;
        if (empty($reason)) {
            Utils::exitWithError(400, 'Motivo no debe estar vacío');
        }
        if (strlen($reason) > 500) {
            Utils::exitWithError(400, 'Motivo no debe exceder los 500 carácteres');
        }
        if (filter_var($quantity, FILTER_VALIDATE_FLOAT) === false) {
            Utils::exitWithError(400, 'Cantidad no es un número válido');
        }
        if (filter_var($transactionId, FILTER_VALIDATE_INT) === false) {
            Utils::exitWithError(400, 'Transacción no es válida');
        }
        if (empty($quantity)) {
            Utils::exitWithError(400, 'Cantidad no debe estar vacío');
        }
        if (!(floatval($quantity) > 0 && floatval($quantity) < $MAX_QUANTITY)) {
            Utils::exitWithError(400, 'Cantidad debe ser mayor a 0 y menor a '.$MAX_QUANTITY);
        }
        if (empty($transactionId)) {
            Utils::exitWithError(400, 'Transacción no debe estar vacía');
        }
        if (floatval($transactionId) < 1) {
            Utils::exitWithError(400, 'Transacción desconocida');
        }
    }

}