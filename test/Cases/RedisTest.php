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

namespace SwoftTest\Cases;

use SwoftTest\HttpTestCase;

/**
 * @internal
 * @coversNothing
 */
class RedisTest extends HttpTestCase
{
    public function testRedisKeys()
    {
        $res = $this->get('/redis/keys');

        $this->assertSame(0, $res['code']);
    }
}
