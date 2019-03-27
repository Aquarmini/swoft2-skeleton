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

namespace App;

use Swoft\Annotation\LoaderInterface;

/**
 * Class AutoLoader.
 */
class AutoLoader implements LoaderInterface
{
    /**
     * Get namespace and dirs.
     *
     * @return array
     */
    public function getPrefixDirs(): array
    {
        return [
            __NAMESPACE__ => __DIR__,
        ];
    }
}
