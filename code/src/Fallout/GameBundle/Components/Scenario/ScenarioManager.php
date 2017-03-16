<?php
namespace Fallout\GameBundle\Components\Scenario;

class ScenarioManager
{
    public function generateScenario()
    {
        return mt_rand();
    }
}