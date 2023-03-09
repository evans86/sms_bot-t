<?php

namespace App\Helpers;

class ApiHelpers
{
    /**
     * @param $result
     * @return array
     */
    public static function success($result): array
    {
        return [
            'result' => true,
            'data' => $result
        ];
    }

    /**
     * @param string $message
     * @return string
     */
    public static function error(string $message): string
    {
        $result = [
            'result' => false,
            'message' => $message
        ];
        return json_encode($result);
    }
}
