<?php
namespace Fallout\GameBundle\Components\Scenario;

class ScenarioManager
{
    public function createScenario()
    {
        return mt_rand();
    }
}