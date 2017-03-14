<?php
namespace Fallout\GameBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Fallout\GameBundle\Entity\Item\ArmorItem;
use Fallout\GameBundle\Entity\Item\WeaponItem;
use Fallout\GameBundle\Entity\Player;

class LoadPlayers implements FixtureInterface
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $radioactiveScorpion = new Player();
        $radioactiveScorpion->setName('Radioactive scorpion');
        $radioactiveScorpion->setHealth(20);
        $radioactiveScorpion->setMoves(2);
        $manager->persist($radioactiveScorpion);

        $wolf = new Player();
        $wolf->setName('Wolf');
        $wolf->setHealth(30);
        $wolf->setMoves(3);
        $manager->persist($wolf);

        $stroller = new Player();
        $stroller->setName('Lonely stroller');
        $stroller->setHealth(40);
        $stroller->setMoves(4);
        $weaponEntity = $manager->getRepository(WeaponItem::class)->findOneBy(['name' => 'Stick']);
        $stroller->setWeaponItem($weaponEntity);
        $armorEntity = $manager->getRepository(ArmorItem::class)->findOneBy(['name' => 'Leather jacket and Jeans']);
        $stroller->setArmorItem($armorEntity);
        $manager->persist($stroller);

        $stroller = new Player();
        $stroller->setName('Danger stroller');
        $stroller->setHealth(50);
        $stroller->setMoves(4);
        $weaponEntity = $manager->getRepository(WeaponItem::class)->findOneBy(['name' => 'Handgun']);
        $stroller->setWeaponItem($weaponEntity);
        $armorEntity = $manager->getRepository(ArmorItem::class)->findOneBy(['name' => 'Leather jacket and Jeans']);
        $stroller->setArmorItem($armorEntity);
        $manager->persist($stroller);

        $manager->flush();
    }

    /**
     * @return int
     */
    public function getOrder()
    {
        return 2;
    }
}