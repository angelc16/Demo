<?php

namespace Demo\Application;

use Demo\Domain\Transaction;
use Demo\Application\Utils\Utils;
use Demo\Domain\TransactionRepositoryInterface;

final class RegisterTransactionAction
{
    private TransactionRepositoryInterface $transactionRepository;

    public function __construct(TransactionRepositoryInterface $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;
    }

    public function __invoke(
        $channelId, $bankId, $quantity, $currencyId, $bankCode, $clientId)
    {
        $this->validate($channelId, $bankId, $quantity, $currencyId, $bankCode, $clientId);
        $transaction = new Transaction();
        $this->uploadImage($transaction);
        date_default_timezone_set("America/Lima");
        $transaction->setCurrentDate(date('Y-m-d H:i:s'));
        $transaction->setChannelId($channelId);
        $transaction->setBankId($bankId);
        $transaction->setQuantity($quantity);
        $transaction->setCurrencyId($currencyId);
        $transaction->setBankCode(trim(htmlspecialchars($bankCode)));
        $transaction->setClientId($clientId);
        $this->transactionRepository->save($transaction);
    }

    private function validate($channelId, $bankId, $quantity, $currencyId, $bankCode, $clientId)
    {
        $MAX_QUANTITY = 1000000;

        if (empty($clientId)) {
            Utils::exitWithError(400, 'Cliente no debe estar vacío');
        }
        if (floatval($clientId) < 1) {
            Utils::exitWithError(400, 'Cliente desconocido');
        }
        if (filter_var($clientId, FILTER_VALIDATE_INT) === false) {
            Utils::exitWithError(400, 'Cliente no es válido');
        }
        if (empty($bankCode)) {
            Utils::exitWithError(400, 'Codigo no debe estar vacío');
        }
        if (strlen($bankCode) > 20) {
            Utils::exitWithError(400, 'Codigo no debe exceder los 20 carácteres');
        }
        if (empty($currencyId)) {
            Utils::exitWithError(400, 'Moneda no debe estar vacío');
        }
        if (filter_var($currencyId, FILTER_VALIDATE_INT) === false) {
            Utils::exitWithError(400, 'Moneda no es válida');
        }
        if (floatval($currencyId) < 1) {
            Utils::exitWithError(400, 'Moneda desconocida');
        }
        if (empty($quantity)) {
            Utils::exitWithError(400, 'Cantidad no debe estar vacío');
        }
        if (filter_var($quantity, FILTER_VALIDATE_FLOAT) === false) {
            Utils::exitWithError(400, 'Cantidad no es válida');
        }
        if (!(floatval($quantity) > 0 && floatval($quantity) < $MAX_QUANTITY)) {
            Utils::exitWithError(400, 'Cantidad debe ser mayor a 0 y menor a '.$MAX_QUANTITY);
        }
        if (empty($bankId)) {
            Utils::exitWithError(400, 'Banco no debe estar vacío');
        }
        if (filter_var($bankId, FILTER_VALIDATE_INT) === false) {
            Utils::exitWithError(400, 'Banco no es válida');
        }
        if (floatval($bankId) < 1) {
            Utils::exitWithError(400, 'Banco desconocida');
        }
        if (empty($channelId)) {
            Utils::exitWithError(400, 'Canal no debe estar vacío');
        }
        if (filter_var($channelId, FILTER_VALIDATE_INT) === false) {
            Utils::exitWithError(400, 'Canal no es válido');
        }
        if (floatval($channelId) < 1) {
            Utils::exitWithError(400, 'Canal desconocido');
        }
    }

    private function uploadImage($transaction)
    {
        global $fileUrl;
        $targetDir = "public/";
        $fileUrl = basename($_FILES['imageUrl']['name']);
        $targetFilePath = $targetDir . $fileUrl;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        $this->validateFile($fileType, $targetFilePath);
        $transaction->setFileUrl($fileUrl);
    }

    private function validateFile(string $fileType, string $targetFilePath) {
        $allowTypes = array('jpg','png','jpeg');
        $maxsize    = 2097152;
        if(!in_array($fileType, $allowTypes)){
            Utils::exitWithError(400, 'Tipo de archivo no válido. Sólo se aceptan los tipos JPG y PNG.');
        }
        if(($_FILES['imageUrl']['size'] >= $maxsize) || ($_FILES["imageUrl"]["size"] == 0)) {
            $errors[] = 'El archivo debe ser inferior a 2 megabytes.';
        }
        if(!move_uploaded_file($_FILES["imageUrl"]["tmp_name"], $targetFilePath)) {
            Utils::exitWithError(500, 'No se pudo cargar el voucher');
        }
    }

}