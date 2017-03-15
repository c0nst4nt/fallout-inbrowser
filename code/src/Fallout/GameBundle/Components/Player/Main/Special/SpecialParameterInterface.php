<?php
namespace Fallout\GameBundle\Components\Player\Main\Special;

interface SpecialParameterInterface
{
    const BASE_VALUE = 1;
    const MAX_VALUE = 5;

    /**
     * @return string
     */
    public function getName();

    /**
     * @return int
     */
    public function getCurrentValue();

    /**
     * @param int $value
     */
    public function setCurrentValue($value);
}