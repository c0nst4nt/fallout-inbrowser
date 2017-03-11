<?php
namespace Fallout\GameBundle\Components\Player\Special;

interface SpecialParameterInterface
{
    const BEGIN_VALUE = 1;
    const MAX_VALUE = 5;

    /**
     * @return string
     */
    public function getName();

    /**
     * @return int
     */
    public function getCurrentValue();
}