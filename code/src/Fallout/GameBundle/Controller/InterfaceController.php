<?php

namespace Fallout\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class InterfaceController extends Controller
{
    public function mainMenuAction()
    {
        return $this->render('GameBundle::menu.html.twig');
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
