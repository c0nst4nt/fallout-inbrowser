<?php
namespace Fallout\GameBundle\Controller;

use Fallout\GameBundle\Entity\FightScenario;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DiscoverController extends Controller
{
    public function searchAction()
    {
        $scenario = $this->get('fallout.scenario.manager')->generateScenario();

        return new JsonResponse(
            [
                'description' => $scenario->getDescription(),
                'type'  => $scenario instanceof FightScenario ? 'fight' : 'discover'
            ]
        );
    }

    public function sleepAction()
    {

    }
}