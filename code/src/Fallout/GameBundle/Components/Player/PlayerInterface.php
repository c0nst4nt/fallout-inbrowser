<?php
namespace Fallout\GameBundle\Components\Player;

use Fallout\GameBundle\Components\Item\ArmorItem;
use Fallout\GameBundle\Components\Item\WeaponItem;

interface PlayerInterface
{
    /**
     * @return int
     */
    public function getHealth();

    /**
     * @return WeaponItem
     */
    public function getWeapon();

    /**
     * @return ArmorItem
     */
    public function getArmor();
}