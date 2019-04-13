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

use App\Core\Http\Response;
use Swoft\Bean\Annotation\Mapping\Inject;

abstract class BaseController
{
    /**
     * @Inject()
     * @var Response
     */
    protected $response;
}
