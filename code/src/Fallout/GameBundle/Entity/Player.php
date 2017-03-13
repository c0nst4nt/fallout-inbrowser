<?php
namespace Fallout\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Fallout\GameBundle\Entity\Item\ArmorItem;
use Fallout\GameBundle\Entity\Item\WeaponItem;

/**
 * @ORM\Table(name="player", indexes={@ORM\Index(name="fk_weapon_item", columns={"weapon_item_id"}), @ORM\Index(name="fk_armor_item", columns={"armor_item_id"})})
 * @ORM\Entity
 */
class Player
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=true)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="item_store_id", type="smallint", nullable=true)
     */
    private $itemStoreId;

    /**
     * @var integer
     *
     * @ORM\Column(name="health", type="smallint", nullable=true)
     */
    private $health;

    /**
     * @var integer
     *
     * @ORM\Column(name="moves", type="smallint", nullable=true)
     */
    private $moves;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var WeaponItem
     *
     * @ORM\ManyToOne(targetEntity="Fallout\GameBundle\Entity\Item\WeaponItem")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="weapon_item_id", referencedColumnName="id")
     * })
     */
    private $weaponItem;

    /**
     * @var ArmorItem
     *
     * @ORM\ManyToOne(targetEntity="Fallout\GameBundle\Entity\Item\ArmorItem")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="armor_item_id", referencedColumnName="id")
     * })
     */
    private $armorItem;

    /**
     * @param string $name
     *
     * @return Player
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param integer $itemStoreId
     *
     * @return Player
     */
    public function setItemStoreId($itemStoreId)
    {
        $this->itemStoreId = $itemStoreId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getItemStoreId()
    {
        return $this->itemStoreId;
    }

    /**
     * @param integer $health
     *
     * @return Player
     */
    public function setHealth($health)
    {
        $this->health = $health;

        return $this;
    }

    /**
     * @return integer
     */
    public function getHealth()
    {
        return $this->health;
    }

    /**
     * @param integer $moves
     *
     * @return Player
     */
    public function setMoves($moves)
    {
        $this->moves = $moves;

        return $this;
    }

    /**
     * @return integer
     */
    public function getMoves()
    {
        return $this->moves;
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param WeaponItem $weaponItem
     *
     * @return Player
     */
    public function setWeaponItem(WeaponItem $weaponItem = null)
    {
        $this->weaponItem = $weaponItem;

        return $this;
    }

    /**
     * @return WeaponItem
     */
    public function getWeaponItem()
    {
        return $this->weaponItem;
    }

    /**
     * @param ArmorItem $armorItem
     *
     * @return Player
     */
    public function setArmorItem(ArmorItem $armorItem = null)
    {
        $this->armorItem = $armorItem;

        return $this;
    }

    /**
     * @return ArmorItem
     */
    public function getArmorItem()
    {
        return $this->armorItem;
    }
}
