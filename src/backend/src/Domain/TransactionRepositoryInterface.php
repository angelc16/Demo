<?php

namespace Demo\Domain;

interface TransactionRepositoryInterface
{
    public function save(Transaction $transaction): void;
    public function update(TransactionTrack $transaction): void;
}
?>