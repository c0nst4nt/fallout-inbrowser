<?php
namespace Fallout\GameBundle\Components\Scenario;

use Doctrine\ORM\EntityManager;
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
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
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
        $availableIndexes = array_keys($scenarios);
        $index = $this->defineRandomFromList($availableIndexes);
        $scenario = $scenarios[$index];

        return $scenario;
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