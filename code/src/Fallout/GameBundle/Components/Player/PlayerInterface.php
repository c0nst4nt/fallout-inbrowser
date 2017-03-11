<?php
namespace Fallout\GameBundle\Components\Player;

interface PlayerInterface
{
    const PLAYER_BEGIN_LEVEL = 1;
    const PLAYER_MAX_LEVEL = 5;

    /**
     * @return string
     */
    public function getPlayerName();

    /**
     * @return int
     */
    public function getCurrentLevel();

    /**
     * @param int $level
     * @return $this
     */
    public function setCurrentLevel($level);
}