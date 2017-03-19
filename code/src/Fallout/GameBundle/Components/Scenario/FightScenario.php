<?php
namespace Fallout\GameBundle\Components\Scenario;

use Doctrine\ORM\EntityManager;
use Fallout\GameBundle\Components\Player\Enemy\EnemyFactory;
use Fallout\GameBundle\Components\Player\Enemy\EnemyPlayer;
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
     * @var EnemyFactory
     */
    private $enemyFactory;

    /**
     * @param AbilitiesManager $abilitiesManager
     * @param EntityManager $entityManager
     * @param EnemyFactory $enemyFactory
     */
    public function __construct(
        AbilitiesManager $abilitiesManager,
        EntityManager $entityManager,
        EnemyFactory $enemyFactory
    ) {
        $this->abilitiesManager = $abilitiesManager;
        $this->entityManager = $entityManager;
        $this->enemyFactory = $enemyFactory;
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

    /**
     * @return string
     */
    public function getDescription()
    {
        if ($this->fightScenario) {
            return $this->fightScenario->getDescription();
        }

        return null;
    }

    /**
     * @param FightScenarioEntity $scenario
     * @return EnemyPlayer[]
     * @throws \Exception
     */
    public function createEnemies(FightScenarioEntity $scenario)
    {
        $enemies = [];
        $enemiesAmount = $scenario->getEnemiesCount();
        $enemyMoves = $scenario->getMoves();

        $scenarioMinHealth = $scenario->getMinHealth();
        $scenarioMaxHealth = $scenario->getMaxHealth();
        $scenarioMinAttack = $scenario->getMinAttack();
        $scenarioMaxAttack = $scenario->getMaxAttack();

        for ($i = 0; $i < $enemiesAmount; $i++) {
            switch (true) {
                case $enemiesAmount > 2:
                    if ($i === 0) {
                        $enemyHealth = $scenarioMinHealth;
                        $enemyAttack = $scenarioMinAttack;
                    } else {
                        $healthQuantificator = ($scenarioMaxHealth - $scenarioMinHealth) / $enemiesAmount;
                        $attackQuantificator = ($scenarioMaxAttack - $scenarioMinAttack) / $enemiesAmount;

                        $enemyHealth = $healthQuantificator * ($i+1);
                        $enemyAttack = $attackQuantificator * ($i+1);
                    }
                    break;
                case $enemiesAmount == 2:
                    if ($i === 0) {
                        $enemyHealth = $scenarioMinHealth;
                        $enemyAttack = $scenarioMinAttack;
                    } else {
                        $enemyHealth = $scenarioMaxHealth;
                        $enemyAttack = $scenarioMaxAttack;
                    }
                    break;
                case $enemiesAmount == 1:
                    $enemyHealth = $scenarioMaxHealth;
                    $enemyAttack = $scenarioMaxAttack;
                    break;
                default:
                    throw new \Exception('Enemy players count set wrong in fight scenario - '.$enemiesAmount);
            }

            $enemies[] = $this->enemyFactory->createEnemyPlayer($enemyHealth, $enemyAttack, $enemyMoves);
        }

        return $enemies;
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