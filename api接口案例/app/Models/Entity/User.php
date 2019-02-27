<?php
namespace App\Models\Entity;

use Swoft\Db\Model;
use Swoft\Db\Bean\Annotation\Column;
use Swoft\Db\Bean\Annotation\Entity;
use Swoft\Db\Bean\Annotation\Id;
use Swoft\Db\Bean\Annotation\Required;
use Swoft\Db\Bean\Annotation\Table;
use Swoft\Db\Types;

/**
 * 用户

 * @Entity()
 * @Table(name="sunny_user")
 * @uses      User
 */
class User extends Model
{
    /**
     * @var int $id 
     * @Id()
     * @Column(name="id", type="integer")
     */
    private $id;

    /**
     * @var string $mobile 手机号码
     * @Column(name="mobile", type="char", length=11)
     * @Required()
     */
    private $mobile;

    /**
     * @var string $passwd 
     * @Column(name="passwd", type="char", length=32)
     * @Required()
     */
    private $passwd;

    /**
     * @var int $createTime 注册时间
     * @Column(name="create_time", type="integer")
     * @Required()
     */
    private $createTime;

    /**
     * @param int $value
     * @return $this
     */
    public function setId(int $value)
    {
        $this->id = $value;

        return $this;
    }

    /**
     * 手机号码
     * @param string $value
     * @return $this
     */
    public function setMobile(string $value): self
    {
        $this->mobile = $value;

        return $this;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setPasswd(string $value): self
    {
        $this->passwd = $value;

        return $this;
    }

    /**
     * 注册时间
     * @param int $value
     * @return $this
     */
    public function setCreateTime(int $value): self
    {
        $this->createTime = $value;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * 手机号码
     * @return string
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * @return string
     */
    public function getPasswd()
    {
        return $this->passwd;
    }

    /**
     * 注册时间
     * @return int
     */
    public function getCreateTime()
    {
        return $this->createTime;
    }

}
