<?php
/**
 * +----------------------------------------------------------------------
 * | 账号管理
 * +----------------------------------------------------------------------
 * | Copyright (c) 2016 http://www.sunnyos.com All rights reserved.
 * +----------------------------------------------------------------------
 * | Date：2019-02-27 23:00:02
 * | Author: Sunny (admin@sunnyos.com) QQ：327388905
 * +----------------------------------------------------------------------
 */

namespace App\Controllers;

use App\Models\Logic\UserLogic;
use App\Models\Service\UserService;
use App\Utils\Message;
use Swoft\Bean\Annotation\Inject;
use Swoft\Http\Message\Server\Request;
use Swoft\Http\Server\Bean\Annotation\Controller;
use Swoft\Http\Server\Bean\Annotation\RequestMapping;

/**
 * @Controller(prefix="/v1/account")
 */
class AccountController
{
    /**
     * @Inject()
     * @var UserLogic
     */
    private $userLogic;

    /**
     * @Inject()
     * @var UserService
     */
    private $userService;

    /**
     * 创建用户
     * @RequestMapping(route="create")
     * @param Request $request
     * @return array
     * @throws \App\Exception\ValidateException
     * @throws \App\Exception\ServiceException
     */
    public function create(Request $request)
    {
        $post = $request->post();
        $this->userLogic->create($post);
        $this->userService->create($post);
        return Message::success();
    }

    /**
     * 用户登陆
     * @RequestMapping(route="login")
     * @param Request $request
     * @return array
     * @throws \App\Exception\ServiceException
     * @throws \App\Exception\ValidateException
     */
    public function login(Request $request){
        $post = $request->post();
        $this->userLogic->login($post);
        $token = $this->userService->login($post['mobile'],$post['passwd']);
        return Message::success('success',Message::CODE_SUCCESS,['token'=>$token]);
    }
}
