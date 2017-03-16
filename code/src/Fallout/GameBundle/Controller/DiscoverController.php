<?php
namespace Fallout\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DiscoverController extends Controller
{
    public function searchAction(Request $request)
    {
        $scenario = $this->get('fallout.scenario.manager')->generateScenario();

        return new JsonResponse(['description' => $scenario->getDescription()]);
    }

    public function sleepAction()
    {

    }
}