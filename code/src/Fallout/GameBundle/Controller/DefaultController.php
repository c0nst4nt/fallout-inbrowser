<?php

namespace Fallout\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GameBundle::main.screen.html.twig');
    }
}
