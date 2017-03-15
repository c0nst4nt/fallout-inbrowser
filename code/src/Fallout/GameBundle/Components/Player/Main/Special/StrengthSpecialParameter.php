<?php
namespace Fallout\GameBundle\Components\Player\Main\Special;

class StrengthSpecialParameter extends SpecialParameterAbstract
{
    use SpecialParameterTrait;

    const PARAMETER_NAME = 'Strength';
    const ADDITIONAL_PHYSICAL_DAMAGE = 10;
    const ADDITIONAL_HEALTH = 50;

    /**
     * @return int
     */
    public function calculatePhysicalDamage($playerLevel)
    {
        return (int)$playerLevel * self::ADDITIONAL_PHYSICAL_DAMAGE;
    }

    public function calculateHealthPower($playerLevel)
    {
        return (int)$playerLevel * self::ADDITIONAL_HEALTH;
    }
}