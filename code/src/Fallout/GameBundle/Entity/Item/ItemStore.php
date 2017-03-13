<?php
namespace Fallout\GameBundle\Entity\Item;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="item_store")
 * @ORM\Entity
 */
class ItemStore
{
    /**
     * @var integer
     *
     * @ORM\Column(name="player_id", type="smallint", nullable=true)
     */
    private $playerId;

    /**
     * @var integer
     *
     * @ORM\Column(name="item_id", type="smallint", nullable=true)
     */
    private $itemId;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @param integer $playerId
     *
     * @return ItemStore
     */
    public function setPlayerId($playerId)
    {
        $this->playerId = $playerId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getPlayerId()
    {
        return $this->playerId;
    }

    /**
     * @param integer $itemId
     *
     * @return ItemStore
     */
    public function setItemId($itemId)
    {
        $this->itemId = $itemId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getItemId()
    {
        return $this->itemId;
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
