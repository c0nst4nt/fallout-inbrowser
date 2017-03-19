<?php
namespace Fallout\GameBundle\Components\Player\Main\Special;

use Doctrine\ORM\EntityManager;

class AbilityFactory
{
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
     * @return SpecialParameterInterface[]
     */
    public function createAbilities()
    {
        $availableAbilities = [
            LevelSpecialParameter::class,
            StrengthSpecialParameter::class,
            AgilitySpecialParameter::class,
            PerceptionSpecialParameter::class,
            LuckSpecialParameter::class,
        ];

        $abilities = [];
        foreach ($availableAbilities as $ability) {
            $abilities[$ability] = new $ability($this->entityManager);
        }

        return $abilities;
    }

    /**
     * @param string $ability
     * @return SpecialParameterInterface|null
     */
    public function getAbility($ability)
    {
        $abilities = $this->createAbilities();
        if (array_key_exists($ability, $abilities)) {
            return $abilities[$ability];
        }

        return null;
    }
}