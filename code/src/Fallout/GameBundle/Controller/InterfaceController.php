<?php

namespace Fallout\GameBundle\Controller;

use Fallout\GameBundle\Components\Player\Main\MainPlayer;
use Fallout\GameBundle\Components\Player\Main\Special\SpecialParameterInterface;
use Fallout\GameBundle\Entity\FightScenario;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class InterfaceController extends Controller
{
    /**
     * @return RedirectResponse|Response
     */
    public function mainMenuAction()
    {
        if ($this->get('fallout.player.main')->checkPlayerExist()) {
            return $this->redirectToRoute('interface_main_screen');
        }

        return $this->render('GameBundle::menu.html.twig');
    }

    /**
     * @return Response
     */
    public function createGameAction()
    {
        try {
            $this->get('fallout.player.main')->createPlayer();
        } catch (\RuntimeException $e) {
            return $this->render('GameBundle::menu.html.twig', ['error' => $e->getMessage()]);
        }

        return $this->redirectToRoute('interface_main_screen');
    }

    /**
     * @return Response
     */
    public function gameInterfaceAction()
    {
        if (false === $this->get('fallout.player.main')->checkPlayerExist()) {
            return $this->redirectToRoute('interface_game_menu');
        }

        $playerData = $this->get('fallout.player.main')->getPlayerData();
        $playerData['strength_bar_value'] = $this->calculateBarValue(SpecialParameterInterface::MAX_VALUE, $playerData['strength_value']);
        $playerData['agility_bar_value'] = $this->calculateBarValue(SpecialParameterInterface::MAX_VALUE, $playerData['agility_value']);
        $playerData['perceive_bar_value'] = $this->calculateBarValue(SpecialParameterInterface::MAX_VALUE, $playerData['perceive_value']);
        $playerData['luck_bar_value'] = $this->calculateBarValue(SpecialParameterInterface::MAX_VALUE, $playerData['luck_value']);
        $playerData['life_bar_value'] = $this->calculateBarValue(MainPlayer::BASE_HEALTH, $playerData['life_value']);

        if ($playerData['experience'] === 0) {
            $playerData = array_merge(
                $playerData,
                ['console_initial_content' => $this->renderView('GameBundle::console.initial.html.twig')]
            );
        }

        $currentScenario = $this->get('fallout.scenario.manager')->getCurrentScenario();
        if ($currentScenario && $currentScenario->getFightStarted()) {
            $fightScenario = $this->get('doctrine.orm.default_entity_manager')
                ->getRepository(FightScenario::class)
                ->findOneBy(['id' => $currentScenario->getScenarioId()]);

            $fightScenarioComponent = $this->get('fallout.scenario.fight');
            $fightScenarioComponent->setScenario($fightScenario);
            $enemies = $fightScenarioComponent->createEnemies($fightScenario);

            $playerData = array_merge(
                $playerData,
                [
                    'console_initial_content' => $this->renderView(
                        '@Game/fight.screen.html.twig',
                        [
                            'enemies' => $enemies,
                            'distance' => $currentScenario->getDistance()
                        ]
                    ),
                    'fight' => true,
                ]
            );
        }

        return $this->render('GameBundle::main.screen.html.twig', $playerData);
    }

    /**
     * @param $limit
     * @param $value
     * @return float
     */
    private function calculateBarValue($limit, $value)
    {
        if ($value === 0) {
            return $value;
        }

        return (100 / $limit) * $value;
    }
}
