<?php

namespace Fallout\GameBundle\Controller;

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

    public function gameInterfaceAction()
    {
        $playerData = [
            'strength_value' => 0,
            'agility_value' => 0,
            'perceive_value' => 0,
            'luck_value' => 0,
            'life_value' => 0,
            'moves_value' => 0,
            'current_attack' => 0,
            'max_steps' => 0,
            'accuracy' => 0,
            'critical_chance' => 0,
        ];
        if ($this->get('fallout.player.main')->checkPlayerExist()) {
            $playerData = $this->get('fallout.player.main')->getPlayerData();
        }

        return $this->render(
            'GameBundle::main.screen.html.twig',
            array_merge(
                $playerData,
                ['console_initial_content' => $this->renderView('GameBundle::console.initial.html.twig')]
            )
        );
    }
}
