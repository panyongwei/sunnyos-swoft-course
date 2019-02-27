<?php
/**
 * +----------------------------------------------------------------------
 * |
 * +----------------------------------------------------------------------
 * | Copyright (c) 2016 http://www.sunnyos.com All rights reserved.
 * +----------------------------------------------------------------------
 * | Date：2019-02-27 23:13:02
 * | Author: Sunny (admin@sunnyos.com) QQ：327388905
 * +----------------------------------------------------------------------
 */

namespace App\Models\Service;

use App\Exception\ServiceException;
use App\Models\Dao\UserDao;
use App\Models\Data\UserData;
use App\Models\Entity\User;
use Firebase\JWT\JWT;
use Swoft\Bean\Annotation\Bean;
use Swoft\Bean\Annotation\Inject;

/**
 * @Bean()
 */
class UserService
{
    /**
     * @Inject()
     * @var UserDao
     */
    private $userDao;

    /**
     * @Inject()
     * @var CodeService
     */
    private $codeService;

    /**
     * @Inject()
     * @var UserData
     */
    private $userData;

    /**
     * 创建用户
     * @param array $data
     * @return mixed
     * @throws ServiceException
     */
    public function create(array $data)
    {
        $data['create_time'] = time();
        $this->codeService->checkCode($data['mobile'], $data['code']);
        $user = $this->getUserByMobile($data['mobile']);
        if ($user) {
            throw new ServiceException('该手机号已经注册');
        }
        return $this->userDao->create($data);
    }


    /**
     * 获取用户信息
     * @param string $mobile
     * @return mixed
     */
    public function getUserByMobile(string $mobile)
    {
        return $this->userDao->getUserByMobile($mobile);
    }

    /**
     * 用户登陆
     * @param string $mobile
     * @param string $passwd
     * @return String
     * @throws ServiceException
     */
    public function login(string $mobile, string $passwd)
    {
        /** @var User $user */
        $user = $this->getUserByMobile($mobile);
        if (!$user) {
            throw new ServiceException('该手机号码未注册');
        }
        if ($passwd != $user->getPasswd()) {
            throw new ServiceException('密码错误');
        }
        return $this->getTokenByUserId($user->getId());
    }

    /**
     * 生成Token
     * @param int $userId
     * @return String
     */
    public function getTokenByUserId(int $userId)
    {
        // 登陆成功使用jwt返回token
        $private = \config('jwt.privateKey');
        $exp = \config('jwt.exp');
        $type = \config('jwt.type');

        $tokenParam = [
            'user' => $userId,// 用户id
            'iat' => time(),// 创建时间
            'exp' => time() + $exp,//过期时间
        ];
        $token = JWT::encode($tokenParam, $private, $type);
        return $token;
    }

    /**
     * 获取用户信息
     * @param int $userId
     * @return bool|\Closure|string
     */
    public function getUserInfo(int $userId){
        return $this->userData->getUserInfo($userId);
    }
}
