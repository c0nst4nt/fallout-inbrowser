<?php
namespace Fallout\GameBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Fallout\GameBundle\Entity\Item\ArmorItem;

class LoadArmors implements FixtureInterface
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $jacketJeansArmor = new ArmorItem();
        $jacketJeansArmor->setName('Leather jacket and Jeans');
        $jacketJeansArmor->setMinLevel(2);
        $jacketJeansArmor->setValue(2);
        $manager->persist($jacketJeansArmor);

        $leatherWithBlotches = new ArmorItem();
        $leatherWithBlotches->setName('Leather armor with blotches');
        $leatherWithBlotches->setMinLevel(3);
        $leatherWithBlotches->setValue(5);
        $manager->persist($leatherWithBlotches);

        $jacketJeansArmor = new ArmorItem();
        $jacketJeansArmor->setName('Metal armor');
        $jacketJeansArmor->setMinLevel(4);
        $jacketJeansArmor->setValue(7);
        $manager->persist($jacketJeansArmor);

        $brotherhoodArmor = new ArmorItem();
        $brotherhoodArmor->setName('Brotherhood of Steel Super Armor');
        $brotherhoodArmor->setMinLevel(5);
        $brotherhoodArmor->setValue(10);
        $manager->persist($brotherhoodArmor);

        $manager->flush();
    }
}