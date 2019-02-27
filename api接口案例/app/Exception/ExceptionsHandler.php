<?php
/**
 * +----------------------------------------------------------------------
 * | 异常接管
 * +----------------------------------------------------------------------
 * | Copyright (c) 2016 http://www.sunnyos.com All rights reserved.
 * +----------------------------------------------------------------------
 * | Date：2019-02-27 23:03:56
 * | Author: Sunny (admin@sunnyos.com) QQ：327388905
 * +----------------------------------------------------------------------
 */

namespace App\Exception;

use App\Utils\Message;
use Swoft\Bean\Annotation\ExceptionHandler;
use Swoft\Bean\Annotation\Handler;
use Swoft\Http\Message\Server\Response;

/**
 * @ExceptionHandler()
 */
class ExceptionsHandler
{
    /**
     * @Handler(ServiceException::class)
     * @param Response $response
     * @param \Throwable $throwable
     * @return Response
     */
    public function service(Response $response, \Throwable $throwable)
    {
        $data = Message::error($throwable->getMessage());
        return $response->json($data);
    }

    /**
     * @Handler(ValidateException::class)
     * @param Response $response
     * @param \Throwable $throwable
     * @return Response
     */
    public function validate(Response $response, \Throwable $throwable)
    {
        $data = Message::error($throwable->getMessage());
        return $response->json($data);
    }
}
