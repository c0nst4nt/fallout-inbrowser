<?php
namespace Fallout\GameBundle\Entity\Item;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class WeaponItem extends ItemAbstract
{
    const TYPE_VALUE = 0;
}