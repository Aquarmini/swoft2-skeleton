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

namespace App\Controllers;

use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;

/**
 * @Controller(prefix="/")
 */
class IndexController extends BaseController
{
    /**
     * @RequestMapping(route="index")
     */
    public function index()
    {
        return 'Hello Swoft 2.0.';
    }
}
