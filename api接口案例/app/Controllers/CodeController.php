<?php
/**
 * +----------------------------------------------------------------------
 * | 验证码
 * +----------------------------------------------------------------------
 * | Copyright (c) 2016 http://www.sunnyos.com All rights reserved.
 * +----------------------------------------------------------------------
 * | Date：2019-02-27 23:00:38
 * | Author: Sunny (admin@sunnyos.com) QQ：327388905
 * +----------------------------------------------------------------------
 */

namespace App\Controllers;

use App\Models\Service\CodeService;
use App\Utils\Message;
use Swoft\Bean\Annotation\Inject;
use Swoft\Http\Message\Server\Request;
use Swoft\Http\Server\Bean\Annotation\Controller;
use Swoft\Http\Server\Bean\Annotation\RequestMapping;

/**
 * @Controller(prefix="/v1/code")
 */
class CodeController
{

    /**
     * @Inject()
     * @var CodeService
     */
    private $codeService;

    /**
     * 获取验证码
     * @RequestMapping(route="getCode")
     * @param Request $request
     * @return array
     * @throws \App\Exception\ServiceException
     */
    public function getCode(Request $request){
        $mobile = $request->post('mobile','');
        $time = $this->codeService->getCode($mobile);
        return Message::success('success',Message::CODE_SUCCESS,['time'=>$time]);
    }
}
