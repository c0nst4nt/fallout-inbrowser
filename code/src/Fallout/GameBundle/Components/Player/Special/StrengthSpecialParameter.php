<?php
namespace Fallout\GameBundle\Components\Player\Special;

use Fallout\GameBundle\Components\Player\Player;

class StrengthSpecialParameter implements SpecialParameterInterface
{
    const PARAMETER_NAME = 'strength';
    const ADDITIONAL_PHYSICAL_DAMAGE = 10;

    /**
     * @var int
     */
    private $currentValue;

    /**
     * @var  int
     */
    private $playerLevel;

    /**
     * @param int $playerLevel
     * @param int $currentValue
     */
    public function __construct($playerLevel, $currentValue = self::BEGIN_VALUE)
    {
        $this->validateValues($playerLevel, $currentValue);
        $this->playerLevel = $playerLevel;
        $this->currentValue = $currentValue;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return self::PARAMETER_NAME;
    }

    /**
     * {@inheritdoc}
     */
    public function getCurrentValue()
    {
        $this->currentValue;
    }

    /**
     * @return int
     */
    public function calculatePhysicalDamage()
    {
        return (int)$this->playerLevel * self::ADDITIONAL_PHYSICAL_DAMAGE;
    }

    public function calculateHealthPower()
    {
        // TODO :: implement this method
    }

    /**
     * @param int $playerLevel
     * @param int $parameterValue
     * @return void
     * @throws \RuntimeException
     */
    private function validateValues($playerLevel, $parameterValue)
    {
        // TODO :: rewrite this to symfony validation
        if ($playerLevel < Player::PLAYER_BEGIN_LEVEL || $playerLevel > Player::PLAYER_MAX_LEVEL) {
            throw new \RuntimeException('Player level is wrong');
        } else if ($parameterValue < self::BEGIN_VALUE || $parameterValue > self::MAX_VALUE) {
            throw new \RuntimeException(sprintf('\'%\' special parameter is wrong', $this->getName()));
        }
    }
}