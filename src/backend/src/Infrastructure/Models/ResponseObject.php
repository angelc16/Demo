<?php
namespace Demo\Infrastructure\Models;

class ResponseObject implements \JsonSerializable
{
    private bool $success;
    private ?string $message = null;
    private $data = null;

    public function __construct(
        bool $p_success = false, $p_data = null, ?string $p_message = null
    ) {
        $this->success = $p_success;
        $this->data = $p_data;
        $this->message = $p_message;
    }
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}
?>