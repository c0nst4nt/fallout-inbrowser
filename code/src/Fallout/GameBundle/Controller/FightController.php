<?php
namespace Fallout\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class FightController extends Controller
{
    public function startAction()
    {
        $entityManager = $this->get('doctrine.orm.default_entity_manager');
        $currentScenario = $this->get('fallout.scenario.manager')->getCurrentScenario();
        $currentScenario->setFightStarted(true);
        $entityManager->persist($currentScenario);
        $entityManager->flush();

        return new JsonResponse(['result' => 'fight has started']);
    }

    /**
     * @return JsonResponse
     */
    public function escapeAction()
    {
        if (false === $this->get('fallout.scenario.fight')->tryEscape()) {

            return new JsonResponse(['result' => 'failure']);
        }

        return new JsonResponse(['result' => 'success']);
    }

    public function moveAction()
    {

    }

    public function attackEnemyAction()
    {

    }

    public function useHealthKitAction()
    {

    }
}