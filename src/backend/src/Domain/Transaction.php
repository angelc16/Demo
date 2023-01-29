<?php

namespace Demo\Domain;

final class Transaction
{
    private $currentDate;
	private $channelId;
	private $bankId;
	private $quantity;
	private $currencyId;
	private $fileUrl;
	private $bankCode;
	private $clientId;

	public function __construct()
	{
	}

	public function setCurrentDate($currentDate)
	{
		$this->currentDate = $currentDate;
	}

	public function getCurrentDate()
	{
		return $this->currentDate;
	}

	public function setChannelId($channelId)
	{
		$this->channelId = $channelId;
	}

	public function getChannelId()
	{
		return $this->channelId;
	}

	public function setBankId($bankId)
	{
		$this->bankId = $bankId;
	}

	public function getBankId()
	{
		return $this->bankId;
	}

	public function setQuantity($quantity)
	{
		$this->quantity = $quantity;
	}

	public function getQuantity()
	{
		return $this->quantity;
	}

	public function setCurrencyId($currencyId)
	{
		$this->currencyId = $currencyId;
	}

	public function getCurrencyId()
	{
		return $this->currencyId;
	}

	public function setFileUrl($fileUrl)
	{
		$this->fileUrl = $fileUrl;
	}

	public function getFileUrl()
	{
		return $this->fileUrl;
	}

	public function setBankCode($bankCode)
	{
		$this->bankCode = $bankCode;
	}

	public function getBankCode()
	{
		return $this->bankCode;
	}

	public function setClientId($clientId)
	{
		$this->clientId = $clientId;
	}

	public function getClientId()
	{
		return $this->clientId;
	}
}