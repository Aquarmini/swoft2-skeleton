<?php

declare(strict_types=1);
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Core\Http;

use Swoft\Bean\Annotation\Mapping\Bean;

/**
 * @Bean
 */
class Response
{
    public function success($data = [])
    {
        $response = context()->getResponse();
        return $response->withData([
            'code' => 0,
            'data' => $data,
        ]);
    }

    public function fail(int $code, string $message = '')
    {
        $response = context()->getResponse();

        return $response->withData([
            'code' => $code,
            'message' => $message,
        ]);
    }
}
