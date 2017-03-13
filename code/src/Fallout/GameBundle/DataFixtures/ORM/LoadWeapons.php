<?php
namespace Fallout\GameBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Fallout\GameBundle\Entity\Item\WeaponItem;

class LoadWeapons implements FixtureInterface
{
    /**
     * @param ObjectManager $manager
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

        $manager->flush();
    }
}