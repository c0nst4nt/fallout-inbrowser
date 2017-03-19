<?php
namespace Fallout\GameBundle\Components\Scenario;

use Doctrine\ORM\EntityManager;
use Fallout\GameBundle\Entity\Player;
use Fallout\GameBundle\Components\Scenario\FightScenario as FightScenarioComponent;
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
     * @var FightScenarioComponent
     */
    private $fightScenario;

    /**
     * @param EntityManager $entityManager
     * @param FightScenarioComponent $fightScenario
     */
    public function __construct(
        EntityManager $entityManager,
        FightScenarioComponent $fightScenario
    ) {
        $this->entityManager = $entityManager;
        $this->fightScenario = $fightScenario;
    }

    /**
     * @return ScenarioInterface
     */
    public function generateScenario()
    {
        $entityType = null;
        // TODO: shorten discover scenario to dummy
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
            $enemies = $this->fightScenario->createEnemies($scenario, $scenario->getEnemiesCount());
            $this->saveCurrentScenario($scenario, $enemies);
        }

        return $scenario;
    }

    /**
     * @return CurrentScenario
     */
    public function getScenarioInfo()
    {
        $currentScenario = $this->entityManager->getRepository(CurrentScenario::class)->findAll();
        $currentScenario = array_shift($currentScenario);

        return $currentScenario;
    }

    /**
     * @param bool $transformEnemies
     * @return array
     */
    public function getCurrentScenario($transformEnemies = false)
    {
        $scenarioInfo = $this->getScenarioInfo();
        $fightScenario = $this->entityManager->getRepository(FightScenario::class)
            ->findOneBy(['id' => $scenarioInfo->getScenarioId()]);

        $this->fightScenario->setScenario($fightScenario);
        if ($scenarioInfo->getEnemiesLeft()) {
            $enemiesAmount = $scenarioInfo->getEnemiesLeft();
        } else {
            $enemiesAmount = $fightScenario->getEnemiesCount();
        }
        $enemies = $this->fightScenario->createEnemies($fightScenario, $enemiesAmount);

        if ($transformEnemies) {
            $transformedEnemies = [];
            /** @var Player $enemy */
            foreach ($enemies as $enemy) {
                $transformedEnemies[] = [
                    'health' => $enemy->getHealth(),
                    'name' => $enemy->getName(),
                    'armor' => $enemy->getArmorItem()->getName(),
                    'weapon' => $enemy->getWeaponItem()->getName(),
                ];
            }
            $enemies = $transformedEnemies;
        }

        return [
            'enemies' => $enemies,
            'distance' => $scenarioInfo->getDistance()
        ];
    }

    /**
     * @param FightScenario $scenario
     * @param Player[] $enemies
     */
    public function saveCurrentScenario($scenario, $enemies)
    {
        $currentScenario = $this->entityManager->getRepository(CurrentScenario::class)->findAll();
        $currentScenario = array_shift($currentScenario);
        if (is_null($currentScenario)) {
            $currentScenario = new CurrentScenario();
        }

        $currentScenario->setScenarioId($scenario->getId());
        $currentScenario->setEnemiesLeft($scenario->getEnemiesCount());

        $enemiesHealth = 0;
        $distance = 0;

        foreach ($enemies as $enemy) {
            $distance += $enemy->getMoves();
            $enemiesHealth += $enemy->getHealth();
        }
        $currentScenario->setDistance($distance);
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