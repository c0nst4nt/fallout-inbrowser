<?php
namespace Fallout\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Player
 *
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
     * @var \Fallout\GameBundle\Entity\Item
     *
     * @ORM\ManyToOne(targetEntity="Fallout\GameBundle\Entity\Item")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="weapon_item_id", referencedColumnName="id")
     * })
     */
    private $weaponItem;

    /**
     * @var \Fallout\GameBundle\Entity\Item
     *
     * @ORM\ManyToOne(targetEntity="Fallout\GameBundle\Entity\Item")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="armor_item_id", referencedColumnName="id")
     * })
     */
    private $armorItem;
}

