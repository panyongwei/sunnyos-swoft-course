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
 * 产品

 * @Entity()
 * @Table(name="sunny_good")
 * @uses      Good
 */
class Good extends Model
{
    /**
     * @var int $id 
     * @Id()
     * @Column(name="id", type="integer")
     */
    private $id;

    /**
     * @var int $stock 库存
     * @Column(name="stock", type="integer")
     * @Required()
     */
    private $stock;

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
     * 库存
     * @param int $value
     * @return $this
     */
    public function setStock(int $value): self
    {
        $this->stock = $value;

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
     * 库存
     * @return int
     */
    public function getStock()
    {
        return $this->stock;
    }

}
