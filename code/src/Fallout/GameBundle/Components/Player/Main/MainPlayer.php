<?php
namespace Fallout\GameBundle\Components\Player\Main;

use Doctrine\ORM\EntityManager;
use Fallout\GameBundle\Components\Player\PlayerAbstract;

class MainPlayer extends PlayerAbstract
{
    const PLAYER_NAME = 'main';
    const BASE_HEALTH = 30;
    const BASE_MOVES = 2;

    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @return int
     */
    public function getCurrentLevel()
    {

    }

    /**
     * @param int $level
     * @return $this
     */
    public function setCurrentLevel($level)
    {

    }

    /**
     * @return string
     */
    public function getName()
    {
    }

    /**
     * @return string
     */
    public function setName()
    {
    }

    public function getWeapon()
    {
    }

    public function setWeapon()
    {
    }

    public function getHealth()
    {
    }

    /**
     * @return \Fallout\GameBundle\Components\Item\ArmorItem
     */
    public function getArmor()
    {
    }

    public function createPlayer()
    {
        $mainPlayer = new \Fallout\GameBundle\Entity\Player();
        $mainPlayer->setName(MainPlayer::PLAYER_NAME);
        $mainPlayer->setMoves(MainPlayer::BASE_MOVES);
        $mainPlayer->setHealth(MainPlayer::BASE_HEALTH);
        $this->entityManager->persist($mainPlayer);
        
        $mainPlayerInfo = new \Fallout\GameBundle\Entity\MainPlayer();
        $mainPlayerInfo->setLevel(1);
        $mainPlayerInfo->setStrength(1);
        $mainPlayerInfo->setAgility(1);
        $mainPlayerInfo->setPerceive(1);
        $mainPlayerInfo->setLuck(1);
        $this->entityManager->persist($mainPlayerInfo);

        $this->entityManager->flush();
    }

    /**
     * @return bool
     */
    public function checkPlayerExist()
    {
        $player = $this->entityManager->getRepository(Player::class)
            ->findOneBy(['name' => MainPlayer::PLAYER_NAME]);

        return $player ? true : false;
    }
}