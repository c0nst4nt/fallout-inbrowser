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

    /**
     * @var Player
     */
    private $playerInstance;

    /**
     * @var MainPlayerEntity
     */
    private $playerData;

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
    public function getLevel()
    {
        $this->playerData->getLevel();
    }

    /**
     * @param int $level
     * @return $this
     */
    public function setLevel($level)
    {
        $this->playerData->setLevel($level);
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
     * @return int
     */
    public function getStrength()
    {
        return $this->playerData->getStrength();
    }

    /**
     * @param int $strength
     */
    public function setStrength($strength)
    {
        $this->playerData->setStrength($strength);
    }

    /**
     * @return int
     */
    public function getAgility()
    {
        return $this->playerData->getAgility();
    }

    /**
     * @param int $agility
     */
    public function setAgility($agility)
    {
        $this->playerData->setAgility($agility);
    }

    /**
     * @return int
     */
    public function getPerceive()
    {
        return $this->playerData->getPerceive();
    }

    /**
     * @param int $perceive
     */
    public function setPerceive($perceive)
    {
        $this->playerData->setPerceive($perceive);
    }

    /**
     * @return int
     */
    public function getLuck()
    {
        return $this->playerData->getLuck();
    }

    /**
     * @param int $luck
     */
    public function setLuck($luck)
    {
        $this->playerData->setLuck($luck);
    }

    /**
     * @return array
     */
    public function getPlayerData()
    {
        return [
            'strength_value' => $this->getStrength(),
            'agility_value' => $this->getAgility(),
            'perceive_value' => $this->getPerceive(),
            'luck_value' => $this->getLuck(),
            'life_value' => $this->getHealth(),
            'moves_value' => 0,
            'current_attack' => 0,
            'max_steps' => 0,
            'accuracy' => 0,
            'critical_chance' => 0,
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
        $mainPlayer->setName(MainPlayer::PLAYER_NAME);
        $mainPlayer->setMoves(MainPlayer::BASE_MOVES);
        $mainPlayer->setHealth(MainPlayer::BASE_HEALTH);
        $this->entityManager->persist($mainPlayer);
        
        $mainPlayerInfo = new MainPlayerEntity();
        $mainPlayerInfo->setLevel(self::BASE_LEVEL);
        $mainPlayerInfo->setStrength(SpecialParameterInterface::BEGIN_VALUE);
        $mainPlayerInfo->setAgility(SpecialParameterInterface::BEGIN_VALUE);
        $mainPlayerInfo->setPerceive(SpecialParameterInterface::BEGIN_VALUE);
        $mainPlayerInfo->setLuck(SpecialParameterInterface::BEGIN_VALUE);
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
        if (is_null($this->playerInstance) || is_null($this->playerData)) {
            $playerInstance = $this->entityManager->getRepository(Player::class)
                ->findOneBy(['name' => MainPlayer::PLAYER_NAME]);
            $this->playerInstance = $playerInstance ?: null;
            $playerData = $this->entityManager->getRepository(MainPlayerEntity::class)
                ->findAll();
            if ($playerData) {
                $this->playerData = array_shift($playerData);
            }
        }
    }
}