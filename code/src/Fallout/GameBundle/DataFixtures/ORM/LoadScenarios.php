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
                'type'              => FightScenario::class,
                'enemies_count'     => 1,
                'min_health'        => 20,
                'max_health'        => 20,
                'min_attack'        => 1,
                'max_attack'        => 3,
                'moves'             => 2,
                'experience_reward' => 300,
                'description'       => 'Radioactive scorpion chased you. It may be painful.',
            ],
            [
                'type'              => FightScenario::class,
                'enemies_count'     => 2,
                'min_health'        => 20,
                'max_health'        => 20,
                'min_attack'        => 1,
                'max_attack'        => 3,
                'moves'             => 2,
                'experience_reward' => 500,
                'description'       => 'You have found few radioactive scorpions. Prepare to fight.',
            ],
            [
                'type'              => FightScenario::class,
                'enemies_count'     => 2,
                'min_health'        => 20,
                'max_health'        => 30,
                'min_attack'        => 3,
                'max_attack'        => 5,
                'moves'             => 3,
                'experience_reward' => 600,
                'description'       => 'Great couple - wolf and radioactive scorpion. What a fight it will be.',
            ],
            [
                'type'              => FightScenario::class,
                'enemies_count'     => 2,
                'min_health'        => 30,
                'max_health'        => 50,
                'min_attack'        => 3,
                'max_attack'        => 10,
                'moves'             => 3,
                'experience_reward' => 800,
                'description'       => 'Seems that this fisher with his dog, don\'t want to share their food.',
            ],
            [
                'type'              => FightScenario::class,
                'enemies_count'     => 1,
                'min_health'        => 40,
                'max_health'        => 50,
                'min_attack'        => 5,
                'max_attack'        => 15,
                'moves'             => 4,
                'experience_reward' => 1000,
                'description'       => 'You see a gangster. Seems that it will not end so good',
            ],
            [
                'type'              => FightScenario::class,
                'enemies_count'     => 3,
                'min_health'        => 30,
                'max_health'        => 50,
                'min_attack'        => 5,
                'max_attack'        => 15,
                'moves'             => 4,
                'experience_reward' => 1300,
                'description'       => 'Oh no! It is a Raiders band',
            ],
            [
                'type'              => FightScenario::class,
                'enemies_count'     => 5,
                'min_health'        => 40,
                'max_health'        => 50,
                'min_attack'        => 5,
                'max_attack'        => 16,
                'moves'             => 6,
                'experience_reward' => 1500,
                'description'       => 'Time to lose a hope. Raiders camp with huge guns.',
            ],
            [
                'type'        => DiscoverScenario::class,
                'items_count' => 1,
                'min_health'  => 10,
                'max_health'  => 10,
                'description' => 'Great! You have found an apple.',
            ],
            [
                'type'        => DiscoverScenario::class,
                'items_count' => 3,
                'min_health'  => 10,
                'max_health'  => 10,
                'description' => 'No way! It\'s oasis with fruits.',
            ],
            [
                'type'        => DiscoverScenario::class,
                'items_count' => 1,
                'min_health'  => 20,
                'max_health'  => 20,
                'description' => 'It looks like abandoned camp. There are the traces of fight. But here is a chiken.',
            ],
            [
                'type'        => DiscoverScenario::class,
                'items_count' => 2,
                'min_health'  => 30,
                'max_health'  => 30,
                'description' => 'You see a health kit with some stimulators inside.',
            ],
            [
                'type'        => DiscoverScenario::class,
                'items_count' => 2,
                'min_health'  => 30,
                'max_health'  => 30,
                'description' => 'Fantastic! It\'s stim pack over there!',
            ],
        ];

        foreach ($fightScenarios as $scenarioData) {
            switch (true) {
                case $scenarioData['type'] === FightScenario::class:
                    $scenario = new FightScenario;
                    $scenario->setMoves($scenarioData['moves']);
                    $scenario->setEnemiesCount($scenarioData['enemies_count']);
                    $scenario->setMaxAttack($scenarioData['max_attack']);
                    $scenario->setMinAttack($scenarioData['min_attack']);
                    $scenario->setExperienceReward($scenarioData['experience_reward']);
                    break;
                case $scenarioData['type'] === DiscoverScenario::class:
                    $scenario = new DiscoverScenario;

                    $scenario->setItemsCount($scenarioData['items_count']);
                    break;
                default:
                    return;
            }

            $scenario->setMaxHealth($scenarioData['max_health']);
            $scenario->setMinHealth($scenarioData['min_health']);
            $scenario->setDescription($scenarioData['description']);
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