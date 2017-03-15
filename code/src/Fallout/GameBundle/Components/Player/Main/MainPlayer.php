<?php
namespace Fallout\GameBundle\Components\Player\Main;

use Doctrine\ORM\EntityManager;
use Fallout\GameBundle\Components\Player\Main\Special\SpecialParameterInterface;
use Fallout\GameBundle\Components\Player\PlayerAbstract;
use Fallout\GameBundle\Entity\MainPlayer as MainPlayerEntity;
use Fallout\GameBundle\Entity\Player;

class MainPlayer extends PlayerAbstract
{
    const PLAYER_NAME = 'main';
    const BASE_HEALTH = 30;
    const BASE_MOVES = 2;
    const BASE_LEVEL = 1;
    const MAX_LEVEL = 5;

    /**
     * @var Player
     */
    private $playerInstance;

    /**
     * @var AbilitiesManager
     */
    private $abilitiesManager;

    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * @param EntityManager $entityManager
     */
    public function __construct(AbilitiesManager $abilitiesManager, EntityManager $entityManager)
    {
        $this->abilitiesManager = $abilitiesManager;
        $this->entityManager = $entityManager;
    }

    public function getWeapon()
    {
    }

    public function setWeapon()
    {
    }

    /**
     * @return \Fallout\GameBundle\Components\Item\ArmorItem
     */
    public function getArmor()
    {
    }

    /**
     * @return \Fallout\GameBundle\Components\Item\ArmorItem
     */
    public function setArmor()
    {
    }

    /**
     * @return int
     */
    public function getHealth()
    {
        return $this->playerInstance->getHealth();
    }

    /**
     * @param int $health
     */
    public function setHealth($health)
    {
        $this->playerInstance->setHealth($health);
    }

    /**
     * @return array
     */
    public function getPlayerData()
    {
        return [
            'strength_value' => $this->abilitiesManager->getStrength(),
            'agility_value' => $this->abilitiesManager->getAgility(),
            'perceive_value' => $this->abilitiesManager->getPerceive(),
            'luck_value' => $this->abilitiesManager->getLuck(),
            'life_value' => $this->getHealth(),
            'current_attack' => 0,
            'max_steps' => 0,
            'moves_value' => 0,
        ];
    }

    /**
     * @return void
     */
    public function createPlayer()
    {
        if ($this->checkPlayerExist()) {
            throw new \RuntimeException('Attempt to create player again. Must be only one main player.');
        }

        $mainPlayer = new Player();
        $mainPlayer->setName(self::PLAYER_NAME);
        $mainPlayer->setMoves(self::BASE_MOVES);
        $mainPlayer->setHealth(self::BASE_HEALTH);
        $this->entityManager->persist($mainPlayer);
        
        $mainPlayerInfo = new MainPlayerEntity();
        $mainPlayerInfo->setLevel(self::BASE_LEVEL);
        $mainPlayerInfo->setStrength(SpecialParameterInterface::BASE_VALUE);
        $mainPlayerInfo->setAgility(SpecialParameterInterface::BASE_VALUE);
        $mainPlayerInfo->setPerceive(SpecialParameterInterface::BASE_VALUE);
        $mainPlayerInfo->setLuck(SpecialParameterInterface::BASE_VALUE);
        $this->entityManager->persist($mainPlayerInfo);

        $this->entityManager->flush();

        $this->initPlayer();
    }

    /**
     * @return bool
     */
    public function checkPlayerExist()
    {
        $this->initPlayer();

        return $this->playerInstance ? true : false;
    }

    /**
     * @return void
     */
    private function initPlayer()
    {
        if (is_null($this->playerInstance)) {
            $playerInstance = $this->entityManager->getRepository(Player::class)
                ->findOneBy(['name' => self::PLAYER_NAME]);
            $this->playerInstance = $playerInstance ?: null;
        }
    }
}