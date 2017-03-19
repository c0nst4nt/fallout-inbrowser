<?php
namespace Fallout\GameBundle\Components\Scenario;

use Doctrine\ORM\EntityManager;
use Fallout\GameBundle\Components\Player\Enemy\EnemyFactory;
use Fallout\GameBundle\Components\Player\Enemy\EnemyPlayer;
use Fallout\GameBundle\Entity\CurrentScenario;
use Fallout\GameBundle\Entity\DiscoverScenario;
use Fallout\GameBundle\Entity\FightScenario;

class ScenarioManager
{
    const FIGHT_SCENARIO = 0;
    const DISCOVER_SCENARIO = 1;

    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * @var EnemyFactory
     */
    private $enemyFactory;

    /**
     * @param EntityManager $entityManager
     * @param EnemyFactory $enemyFactory
     */
    public function __construct(EntityManager $entityManager, EnemyFactory $enemyFactory)
    {
        $this->entityManager = $entityManager;
        $this->enemyFactory = $enemyFactory;
    }

    /**
     * @return ScenarioInterface
     */
    public function generateScenario()
    {
        $entityType = null;
        switch (mt_rand(self::FIGHT_SCENARIO, self::DISCOVER_SCENARIO)) {
            case self::FIGHT_SCENARIO:
                $entityType = FightScenario::class;
                break;
            case self::DISCOVER_SCENARIO:
                $entityType = DiscoverScenario::class;
                break;
        }

        $scenarios = $this->entityManager->getRepository($entityType)->findAll();
        $index = $this->defineRandomFromList(array_keys($scenarios));
        $scenario = $scenarios[$index];

        if ($scenario instanceof FightScenario) {
            $enemies = $this->createEnemies($scenario);
            $this->saveCurrentScenario($scenario, $enemies);
        }

        return $scenario;
    }

    /**
     * @param FightScenario $scenario
     * @return EnemyPlayer[]
     * @throws \Exception
     */
    public function createEnemies($scenario)
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
     * @return CurrentScenario
     */
    public function getCurrentScenario()
    {
        $currentScenario = $this->entityManager->getRepository(CurrentScenario::class)->findAll();
        $currentScenario = array_shift($currentScenario);

        return $currentScenario;
    }

    /**
     * @param FightScenario $scenario
     * @param EnemyPlayer[] $enemies
     */
    private function saveCurrentScenario($scenario, $enemies)
    {
        $currentScenario = $this->entityManager->getRepository(CurrentScenario::class)->findAll();
        $currentScenario = array_shift($currentScenario);
        if (is_null($currentScenario)) {
            $currentScenario = new CurrentScenario();
        }

        $currentScenario->setScenarioId($scenario->getId());
        $currentScenario->setEnemiesLeft($scenario->getEnemiesCount());

        $enemiesHealth = 0;
        foreach ($enemies as $enemy) {
            $enemiesHealth += $enemy->getHealth();
        }
        $currentScenario->setEnemyHealth($enemiesHealth);
        $currentScenario->setFightStarted(false);

        $this->entityManager->persist($currentScenario);
        $this->entityManager->flush();
    }

    /**
     * @param array $indexList
     * @return int
     */
    private function defineRandomFromList($indexList)
    {
        return mt_rand(reset($indexList), end($indexList));
    }
}