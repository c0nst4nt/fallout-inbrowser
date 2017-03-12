<?php
namespace Fallout\GameBundle\Components\Item;

interface ItemInterface
{
    public function getValue();

    public function getType();

    public function validateType();
}