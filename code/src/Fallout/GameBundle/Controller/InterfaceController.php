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
            return $this->redirectToRoute('main_screen');
        }

        return $this->render('GameBundle::menu.html.twig');
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function createGameAction(Request $request)
    {
        $this->get('fallout.player.main')->createPlayer();

        return $this->redirectToRoute('main_screen');
    }

    public function gameInterfaceAction()
    {
        return $this->render('GameBundle::main.screen.html.twig', [
            'strength_value' => 50,
            'agility_value' => 50,
            'perceive_value' => 50,
            'luck_value' => 50,
            'life_value' => 90,
            'moves_value' => 40,
            'current_attack' => 1,
            'max_steps' => 3,
            'accuracy' => 10,
            'critical_chance' => 5,
        ]);
    }
}
