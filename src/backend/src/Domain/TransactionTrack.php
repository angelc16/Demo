<?php

namespace Demo\Domain;

final class TransactionTrack
{
    private $quantity;
	private $reason;
	private $transactionId;
	private $currentDate;

	public function __construct()
	{
	}

	public function setQuantity($quantity)
	{
		$this->quantity = $quantity;
	}

	public function getQuantity()
	{
		return $this->quantity;
	}

	public function setReason($reason)
	{
		$this->reason = $reason;
	}

	public function getReason()
	{
		return $this->reason;
	}

	public function setTransactionId($transactionId)
	{
		$this->transactionId = $transactionId;
	}

	public function getTransactionId()
	{
		return $this->transactionId;
	}
	public function getCurrentDate($currentDate)
	{
		$this->currentDate = $currentDate;
	}

	public function setCurrentDate()
	{
		return $this->currentDate;
	}
}