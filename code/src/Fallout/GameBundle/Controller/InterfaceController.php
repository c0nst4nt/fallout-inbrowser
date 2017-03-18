<?php

namespace Fallout\GameBundle\Controller;

use Fallout\GameBundle\Components\Player\Main\MainPlayer;
use Fallout\GameBundle\Components\Player\Main\Special\SpecialParameterInterface;
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
     * @param Request $request
     * @return Response
     */
    public function createGameAction(Request $request)
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
        $defaultPlayerData = [
            'strength_value' => 0,
            'strength_bar_value' => 0,
            'agility_value' => 0,
            'agility_bar_value' => 0,
            'perceive_value' => 0,
            'perceive_bar_value' => 0,
            'luck_value' => 0,
            'luck_bar_value' => 0,
            'life_value' => 0,
            'life_bar_value' => 0,
            'moves_value' => 0,
            'current_attack' => 0,
            'max_steps' => 0,
            'level' => 0,
            'experience' => 0,
        ];
        if ($this->get('fallout.player.main')->checkPlayerExist()) {
            $playerData = $this->get('fallout.player.main')->getPlayerData();
            $playerData['strength_bar_value'] = $this->calculateBarValue(SpecialParameterInterface::MAX_VALUE, $playerData['strength_value']);
            $playerData['agility_bar_value'] = $this->calculateBarValue(SpecialParameterInterface::MAX_VALUE, $playerData['agility_value']);
            $playerData['perceive_bar_value'] = $this->calculateBarValue(SpecialParameterInterface::MAX_VALUE, $playerData['perceive_value']);
            $playerData['luck_bar_value'] = $this->calculateBarValue(SpecialParameterInterface::MAX_VALUE, $playerData['luck_value']);
            $playerData['life_bar_value'] = $this->calculateBarValue(MainPlayer::BASE_HEALTH, $playerData['life_value']);
        } else {
            $playerData = $defaultPlayerData;
        }

        if ($playerData['experience'] === 0) {
            $playerData = array_merge(
                $playerData,
                ['console_initial_content' => $this->renderView('GameBundle::console.initial.html.twig')]
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
