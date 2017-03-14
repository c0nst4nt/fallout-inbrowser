<?php
namespace Fallout\GameBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Fallout\GameBundle\Entity\Item\ArmorItem;
use Fallout\GameBundle\Entity\Item\HealthItem;
use Fallout\GameBundle\Entity\Item\WeaponItem;

class LoadItems implements FixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $stickWeapon = new WeaponItem();
        $stickWeapon->setName('Stick');
        $stickWeapon->setMinLevel(1);
        $stickWeapon->setValue(2);
        $manager->persist($stickWeapon);

        $knifeWeapon = new WeaponItem();
        $knifeWeapon->setName('Knife');
        $knifeWeapon->setMinLevel(1);
        $knifeWeapon->setValue(4);
        $manager->persist($knifeWeapon);

        $bbGunWeapon = new WeaponItem();
        $bbGunWeapon->setName('BB Gun');
        $bbGunWeapon->setMinLevel(2);
        $bbGunWeapon->setValue(6);
        $manager->persist($bbGunWeapon);

        $handgunWeapon = new WeaponItem();
        $handgunWeapon->setName('Handgun');
        $handgunWeapon->setMinLevel(2);
        $handgunWeapon->setValue(15);
        $manager->persist($handgunWeapon);

        $uziWeapon = new WeaponItem();
        $uziWeapon->setName('Uzi');
        $uziWeapon->setMinLevel(3);
        $uziWeapon->setValue(25);
        $manager->persist($uziWeapon);

        $rifleWeapon = new WeaponItem();
        $rifleWeapon->setName('Rifle');
        $rifleWeapon->setMinLevel(4);
        $rifleWeapon->setValue(40);
        $manager->persist($rifleWeapon);

        $lazerGunWeapon = new WeaponItem();
        $lazerGunWeapon->setName('Lazer gun');
        $lazerGunWeapon->setMinLevel(5);
        $lazerGunWeapon->setValue(50);
        $manager->persist($lazerGunWeapon);

        $plasmaRifleWeapon = new WeaponItem();
        $plasmaRifleWeapon->setName('Plasma rifle');
        $plasmaRifleWeapon->setMinLevel(5);
        $plasmaRifleWeapon->setValue(80);
        $manager->persist($plasmaRifleWeapon);

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

    /**
     * @return int
     */
    public function getOrder()
    {
        return 1;
    }
}