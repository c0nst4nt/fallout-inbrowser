<?php
namespace Fallout\GameBundle\Components\Player\Main\Special;

use Doctrine\ORM\EntityManager;
use Fallout\GameBundle\Entity\MainPlayer;

abstract class SpecialParameterAbstract implements SpecialParameterInterface
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
     * @return string
     */
    abstract public function getName();

    /**
     * @return int
     */
    public function getCurrentValue()
    {
        $playerData = $this->entityManager->getRepository(MainPlayer::class)->findAll();
        if ($playerData) {
            $playerData = array_shift($playerData);
        }

        return call_user_func([$playerData, 'get'.$this->getName()]);
    }

    /**
     * @param int $value
     * @return bool
     */
    public function setCurrentValue($value)
    {
        $playerData = $this->entityManager->getRepository(MainPlayer::class)->findAll();
        if ($playerData) {
            $playerData = array_shift($playerData);

            $this->validateValue($value);

            /** @var MainPlayer $playerData */
            call_user_func([$playerData, 'set'.$this->getName()], $value);

            return true;
        }

        return false;
    }

    /**
     * @param int $parameterValue
     * @return void
     * @throws \RuntimeException
     */
    private function validateValue($parameterValue)
    {
        // TODO :: rewrite this to symfony validation
        if ($parameterValue < self::BASE_VALUE || $parameterValue > self::MAX_VALUE) {
            throw new \RuntimeException(sprintf('\'%\' special parameter is wrong', $this->getName()));
        }
    }
}