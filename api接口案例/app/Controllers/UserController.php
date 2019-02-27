<?php
/**
 * +----------------------------------------------------------------------
 * | 用户信息管理
 * +----------------------------------------------------------------------
 * | Copyright (c) 2016 http://www.sunnyos.com All rights reserved.
 * +----------------------------------------------------------------------
 * | Date：2019-02-27 23:00:56
 * | Author: Sunny (admin@sunnyos.com) QQ：327388905
 * +----------------------------------------------------------------------
 */

namespace App\Controllers;

use App\Middlewares\AuthMiddleware;
use App\Models\Service\UserService;
use App\Utils\Message;
use Swoft\Bean\Annotation\Inject;
use Swoft\Http\Message\Bean\Annotation\Middleware;
use Swoft\Http\Message\Server\Request;
use Swoft\Http\Server\Bean\Annotation\Controller;
use Swoft\Http\Server\Bean\Annotation\RequestMapping;

/**
 * @Controller(prefix="/v1/user")
 * @Middleware(class=AuthMiddleware::class)
 */
class UserController
{
    /**
     * @Inject()
     * @var UserService
     */
    private $userService;
    /**
     * 获取用户信息
     * @RequestMapping(route="info")
     * @param Request $request
     * @return
     */
    public function getUserInfo(Request $request){
        $userId = $request->user;
        $userInfo = $this->userService->getUserInfo($userId);
        return Message::success('success',Message::CODE_SUCCESS,$userInfo);
    }
}
