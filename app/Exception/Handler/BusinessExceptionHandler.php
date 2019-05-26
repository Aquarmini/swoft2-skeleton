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

namespace App\Exception\Handler;

use Throwable;
use App\Kernel\Http;
use ReflectionException;
use Swoft\Http\Message\Response;
use App\Exception\BusinessException;
use Swoft\Bean\Annotation\Mapping\Inject;
use Swoft\Bean\Exception\ContainerException;
use Swoft\Error\Annotation\Mapping\ExceptionHandler;
use Swoft\Http\Server\Exception\Handler\AbstractHttpErrorHandler;
use const APP_DEBUG;

/**
 * @ExceptionHandler(\Throwable::class)
 */
class BusinessExceptionHandler extends AbstractHttpErrorHandler
{
    /**
     * @Inject
     * @var Http\Response
     */
    protected $response;

    /**
     * @param Throwable $e
     * @param Response $response
     *
     * @throws ReflectionException
     * @throws ContainerException
     * @return Response
     */
    public function handle(Throwable $exception, Response $response): Response
    {
        if ($exception instanceof BusinessException) {
            $code = $exception->getCode();
            $message = $exception->getMessage();

            return $this->response->fail($code, $message);
        }

        // Debug is false
        if (! APP_DEBUG) {
            return $this->response->fail(500, '服务器内部错误');
        }

        return $this->response->fail(500, $exception->getMessage());
    }
}
