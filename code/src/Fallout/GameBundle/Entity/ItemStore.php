<?php
namespace Fallout\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ItemStore
 *
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
}

