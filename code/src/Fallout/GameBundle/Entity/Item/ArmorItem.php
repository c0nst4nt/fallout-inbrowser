<?php
namespace Fallout\GameBundle\Entity\Item;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class ArmorItem extends ItemAbstract
{
    const TYPE_VALUE = 1;
}