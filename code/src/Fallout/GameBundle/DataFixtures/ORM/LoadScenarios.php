<?php
namespace Fallout\GameBundle\Entity;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadScenarios implements FixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $fightScenarios = [
            [
                'enemies_count' => 1,
                'min_health'    => 20,
                'max_health'    => 20,
                'min_attack'    => 1,
                'max_attack'    => 3,
                'moves'         => 2,
            ],
            [
                'enemies_count' => 2,
                'min_health'    => 20,
                'max_health'    => 20,
                'min_attack'    => 1,
                'max_attack'    => 3,
                'moves'         => 2,
            ],
            [
                'enemies_count' => 2,
                'min_health'    => 20,
                'max_health'    => 30,
                'min_attack'    => 3,
                'max_attack'    => 5,
                'moves'         => 3,
            ],
            [
                'enemies_count' => 2,
                'min_health'    => 20,
                'max_health'    => 50,
                'min_attack'    => 3,
                'max_attack'    => 10,
                'moves'         => 3,
            ],
            [
                'enemies_count' => 1,
                'min_health'    => 30,
                'max_health'    => 50,
                'min_attack'    => 5,
                'max_attack'    => 15,
                'moves'         => 4,
            ],
            [
                'enemies_count' => 3,
                'min_health'    => 30,
                'max_health'    => 50,
                'min_attack'    => 5,
                'max_attack'    => 15,
                'moves'         => 4,
            ],
            [
                'enemies_count' => 5,
                'min_health'    => 40,
                'max_health'    => 50,
                'min_attack'    => 5,
                'max_attack'    => 16,
                'moves'         => 6,
            ],
        ];

        foreach ($fightScenarios as $scenarioData) {
            $scenario = new FightScenario();
            $scenario->setMoves($scenarioData['moves']);
            $scenario->setEnemiesCount($scenarioData['enemies_count']);
            $scenario->setMaxAttack($scenarioData['max_attack']);
            $scenario->setMaxHealth($scenarioData['max_health']);
            $scenario->setMinAttack($scenarioData['min_attack']);
            $scenario->setMinHealth($scenarioData['min_health']);
            $manager->persist($scenario);
        }

        $manager->flush();
    }

    /**
     * @return int
     */
    public function getOrder()
    {
        return 3;
    }
}