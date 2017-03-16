<?php
namespace Fallout\GameBundle\Components\Player;

use Fallout\GameBundle\Components\Item\ArmorItem;
use Fallout\GameBundle\Components\Item\WeaponItem;

abstract class PlayerAbstract implements PlayerInterface
{
    /**
     * @return WeaponItem
     */
    public function getWeapon()
    {
    }

    public function setWeapon()
    {
    }

    /**
     * @return ArmorItem
     */
    public function getArmor()
    {
    }

    public function setArmor()
    {
    }
}