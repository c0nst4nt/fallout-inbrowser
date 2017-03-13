<?php
namespace Fallout\GameBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Fallout\GameBundle\Entity\Item\HealthItem;

class LoadHealthItems implements FixtureInterface
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $apple = new HealthItem();
        $apple->setName('Apple');
        $apple->setMinLevel(1);
        $apple->setValue(10);
        $manager->persist($apple);

        $chickenLeg = new HealthItem();
        $chickenLeg->setName('Chicken\'s leg');
        $chickenLeg->setMinLevel(1);
        $chickenLeg->setValue(20);
        $manager->persist($chickenLeg);

        $stimulator = new HealthItem();
        $stimulator->setName('Stimulator');
        $stimulator->setMinLevel(1);
        $stimulator->setValue(30);
        $manager->persist($stimulator);

        $smallHealthKit = new HealthItem();
        $smallHealthKit->setName('Small health kit');
        $smallHealthKit->setMinLevel(1);
        $smallHealthKit->setValue(40);
        $manager->persist($smallHealthKit);

        $stimPack = new HealthItem();
        $stimPack->setName('Stim pack');
        $stimPack->setMinLevel(1);
        $stimPack->setValue(50);
        $manager->persist($stimPack);

        $manager->flush();
    }
}