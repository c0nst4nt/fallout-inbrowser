<?php

use Fallout\GameBundle\Components\Item\ArmorItem;
use Fallout\GameBundle\Components\Player\PlayerAbstract;

class EnemyPlayer extends PlayerAbstract
{
    public function getRewardExperience()
    {

    }

    public function getHealth()
    {
        // TODO: Implement getHealth() method.
    }

    /**
     * @return string
     */
    public function getName()
    {
        // TODO: Implement getName() method.
    }

    public function getWeapon()
    {
        // TODO: Implement getWeapon() method.
    }

    /**
     * @return ArmorItem
     */
    public function getArmor()
    {
        // TODO: Implement getArmor() method.
    }

    /**
     * @param int $level
     * @return $this
     */
    public function setCurrentLevel($level)
    {
    }

    /**
     * @return int
     */
    public function getCurrentLevel()
    {
    }
}