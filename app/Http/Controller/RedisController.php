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

namespace App\Http\Controller;

use Swoft\Redis\Redis;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;

/**
 * @Controller(prefix="/redis")
 */
class RedisController extends BaseController
{
    /**
     * @RequestMapping(route="keys")
     */
    public function keys()
    {
        Redis::set('swoft:test', time());

        $result = Redis::keys('*');

        return $this->response->success($result);
    }
}
