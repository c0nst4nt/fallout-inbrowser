<?php
namespace Fallout\GameBundle\Entity\Item;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class HealthItem extends ItemAbstract
{
    const TYPE_VALUE = 2;
}