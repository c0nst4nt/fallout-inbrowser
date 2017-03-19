<?php
namespace Fallout\GameBundle\Controller;

use Fallout\GameBundle\Components\Player\Main\Special\LevelSpecialParameter;
use Fallout\GameBundle\Components\Player\Main\Special\StrengthSpecialParameter;
use Fallout\GameBundle\Entity\FightScenario;
use Fallout\GameBundle\Entity\Player;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class FightController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function startAction()
    {
        $entityManager = $this->get('doctrine.orm.default_entity_manager');
        $scenarioInfo = $this->get('fallout.scenario.manager')->getScenarioInfo();
        $scenarioInfo->setFightStarted(true);
        $entityManager->persist($scenarioInfo);
        $entityManager->flush();

        $scenarioData = $this->get('fallout.scenario.manager')->getCurrentScenario(true);

        return new JsonResponse($scenarioData);
    }

    /**
     * @return JsonResponse
     */
    public function escapeAction()
    {
        if (false === $this->get('fallout.scenario.fight')->tryEscape()) {

            $scenarioData = $this->get('fallout.scenario.manager')->getCurrentScenario();

            return new JsonResponse(array_merge(['result' => 'failure'], $scenarioData));
        }

        return new JsonResponse(['result' => 'success']);
    }

    /**
     * @param string $type
     * @return JsonResponse
     */
    public function moveAction($type)
    {
        switch ($type) {
            case 'forward':
                $result = 'moved forward';
                break;
            case 'backward':
                $result = 'moved backward';
                break;
            default:
                $result = 'Unknown movement type '.$type;
        }

        return new JsonResponse(['result' => $result]);
    }

    /**
     * @return JsonResponse
     */
    public function attackEnemyAction()
    {
        $scenarioInfo = $this->get('fallout.scenario.manager')->getScenarioInfo();
        $scenarioData = $this->get('fallout.scenario.manager')->getCurrentScenario();

        /** @var LevelSpecialParameter $levelParameter */
        $levelParameter = $this->get('fallout.player.ability.factory')->getAbility(LevelSpecialParameter::class);
        /** @var StrengthSpecialParameter $strengthParameter */
        $strengthParameter = $this->get('fallout.player.ability.factory')->getAbility(StrengthSpecialParameter::class);
        $currentDamage = $strengthParameter->calculatePhysicalDamage($levelParameter->getCurrentValue());

        /** @var Player $enemy */
        $enemies = $scenarioData['enemies'];
        foreach ($enemies as $enemy) {
            $enemy->setHealth($enemy->getHealth() - $currentDamage);
        }

        $fightScenario = $this->get('doctrine.orm.default_entity_manager')
            ->getRepository(FightScenario::class)
            ->findOneBy(['id' => $scenarioInfo->getScenarioId()]);
        $this->get('fallout.scenario.manager')->saveCurrentScenario($fightScenario, $enemies);
        $scenarioData = $this->get('fallout.scenario.manager')->getCurrentScenario(true);

        return new JsonResponse($scenarioData);
    }

    public function useHealthKitAction()
    {
        return new JsonResponse(['result' => 'use health']);
    }
}