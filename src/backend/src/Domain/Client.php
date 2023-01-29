<?php
namespace Demo\Domain;

class Client implements \JsonSerializable
{
	private $Id;
	private $Name;
	private $DocumentNumber;
	private $Email;
	private $Balance;
	private $transactions;

	public function __construct()
	{
	}

	public function setId($Id)
	{
		$this->Id = $Id;
	}

	public function getId()
	{
		return $this->Id;
	}

	// public function setPlayerId($PlayerId)
	// {
	// 	$this->PlayerId = $PlayerId;
	// }

	// public function getPlayerId()
	// {
	// 	return $this->PlayerId;
	// }

	public function setName($Name)
	{
		$this->Name = $Name;
	}

	public function getName()
	{
		return $this->Name;
	}

	public function setDocumentNumber($DocumentNumber)
	{
		$this->DocumentNumber = $DocumentNumber;
	}

	public function getDocumentNumber()
	{
		return $this->DocumentNumber;
	}

	public function setEmail($Email)
	{
		$this->Email = $Email;
	}

	public function getEmail()
	{
		return $this->Email;
	}

	public function setBalance($Balance)
	{
		$this->Balance = $Balance;
	}

	public function getBalance()
	{
		return $this->Balance;
	}

	public function setTransactions($transactions)
	{
		$this->transactions = $transactions;
	}

	public function getTransactions()
	{
		return $this->transactions;
	}

    public function jsonSerialize() {
        return get_object_vars($this);
    }
}
?>