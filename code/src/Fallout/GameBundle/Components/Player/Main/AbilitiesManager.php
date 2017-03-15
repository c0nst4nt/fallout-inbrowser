<?php
namespace Fallout\GameBundle\Components\Player\Main;

use Fallout\GameBundle\Components\Player\Main\Special\AbilityFactory;
use Fallout\GameBundle\Components\Player\Main\Special\AgilitySpecialParameter;
use Fallout\GameBundle\Components\Player\Main\Special\LevelSpecialParameter;
use Fallout\GameBundle\Components\Player\Main\Special\LuckSpecialParameter;
use Fallout\GameBundle\Components\Player\Main\Special\PerceptionSpecialParameter;
use Fallout\GameBundle\Components\Player\Main\Special\SpecialParameterInterface;
use Fallout\GameBundle\Components\Player\Main\Special\StrengthSpecialParameter;

class AbilitiesManager
{
    /**
     * @var SpecialParameterInterface[]
     */
    private $abilities;

    private $abilityFactory;

    /**
     * @param AbilityFactory $abilityFactory
     */
    public function __construct(AbilityFactory $abilityFactory)
    {
        $this->abilityFactory = $abilityFactory;
    }

    public function createAbilities()
    {
        $this->abilities = $this->abilityFactory->createAbilities();
    }

    /**
     * @return int
     */
    public function getLevel()
    {
        return $this->abilities[LevelSpecialParameter::class]->getCurrentValue();
    }

    /**
     * @param int $level
     * @return $this
     */
    public function setLevel($level)
    {
        $this->abilities[LevelSpecialParameter::class]->setCurrentValue($level);
    }

    /**
     * @return int
     */
    public function getStrength()
    {
        return $this->abilities[StrengthSpecialParameter::class]->getCurrentValue();
    }

    /**
     * @param int $strength
     */
    public function setStrength($strength)
    {
        $this->abilities[StrengthSpecialParameter::class]->setCurrentValue($strength);
    }

    /**
     * @return int
     */
    public function getAgility()
    {
        return $this->abilities[AgilitySpecialParameter::class]->getCurrentValue();
    }

    /**
     * @param int $agility
     */
    public function setAgility($agility)
    {
        $this->abilities[AgilitySpecialParameter::class]->setCurrentValue($agility);
    }

    /**
     * @return int
     */
    public function getPerceive()
    {
        return $this->abilities[PerceptionSpecialParameter::class]->getCurrentValue();
    }

    /**
     * @param int $perceive
     */
    public function setPerceive($perceive)
    {
        $this->abilities[PerceptionSpecialParameter::class]->setCurrentValue($perceive);
    }

    /**
     * @return int
     */
    public function getLuck()
    {
        $this->abilities[LuckSpecialParameter::class]->getCurrentValue();
    }

    /**
     * @param int $luck
     */
    public function setLuck($luck)
    {
        $this->abilities[LuckSpecialParameter::class]->setCurrentValue($luck);
    }
}