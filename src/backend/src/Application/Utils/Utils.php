<?php
namespace Demo\Application\Utils;

use Demo\Infrastructure\Models\ResponseObject;

final class Utils
{
    public static function exitWithError(int $statusCode, string $message) {
        http_response_code($statusCode);
        $response = new ResponseObject(false, null, $message);
        exit(json_encode($response));
    }
}


?>