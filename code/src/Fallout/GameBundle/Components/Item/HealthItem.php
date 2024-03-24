<?php
namespace Fallout\GameBundle\Components\Item;

class HealthItem implements ItemInterface
{
    public function getValue()
    {
        return 'Some value';
    }

    public function getType()
    {
        return 123;
    }

    public function validateType()
    {
        return true;
    }
}