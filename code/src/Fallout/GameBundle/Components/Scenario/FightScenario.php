<?php
namespace Fallout\GameBundle\Components\Scenario;

use Doctrine\ORM\EntityManager;
use Fallout\GameBundle\Components\Player\Main\AbilitiesManager;
use Fallout\GameBundle\Entity\FightScenario as FightScenarioEntity;

class FightScenario implements ScenarioInterface
{
    const BASE_ESCAPE_CHANCE = 20;

    /**
     * @var AbilitiesManager
     */
    private $abilitiesManager;

    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * @var FightScenarioEntity
     */
    private $fightScenario;

    /**
     * @param AbilitiesManager $abilitiesManager
     * @param EntityManager $entityManager
     */
    public function __construct(
        AbilitiesManager $abilitiesManager,
        EntityManager $entityManager
    ) {
        $this->abilitiesManager = $abilitiesManager;
        $this->entityManager = $entityManager;
    }

    /**
     * @param FightScenarioEntity $fightScenario
     * @return $this
     */
    public function setScenario(FightScenarioEntity $fightScenario)
    {
        $this->fightScenario = $fightScenario;

        return $this;
    }

    /**
     * @return FightScenarioEntity|null
     */
    public function getScenario()
    {
        return $this->fightScenario ?: null;
    }

    public function getDescription()
    {
    }

    public function getEnemies()
    {

    }

    /**
     * @return bool
     */
    public function tryEscape()
    {
        $randomValue = mt_rand(1, 100);
        $currentChange = ($this->abilitiesManager->getLuck() * 10) + self::BASE_ESCAPE_CHANCE;
        return $randomValue < $currentChange ? true : false;
    }

    public function getReward()
    {

    }
}