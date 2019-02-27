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
 * 用户信息

 * @Entity()
 * @Table(name="sunny_user_info")
 * @uses      UserInfo
 */
class UserInfo extends Model
{
    /**
     * @var int $user 用户id
     * @Id()
     * @Column(name="user", type="integer")
     */
    private $user;

    /**
     * @var string $avatar 
     * @Column(name="avatar", type="string", length=255)
     */
    private $avatar;

    /**
     * @var int $age 
     * @Column(name="age", type="tinyint")
     */
    private $age;

    /**
     * 用户id
     * @param int $value
     * @return $this
     */
    public function setUser(int $value)
    {
        $this->user = $value;

        return $this;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setAvatar(string $value): self
    {
        $this->avatar = $value;

        return $this;
    }

    /**
     * @param int $value
     * @return $this
     */
    public function setAge(int $value): self
    {
        $this->age = $value;

        return $this;
    }

    /**
     * 用户id
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return string
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * @return int
     */
    public function getAge()
    {
        return $this->age;
    }

}
