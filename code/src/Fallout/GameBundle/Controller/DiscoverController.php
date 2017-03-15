<?php
namespace Fallout\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DiscoverController extends Controller
{
    public function searchAction(Request $request)
    {
        return new Response(var_dump($request->query->all()));
    }

    public function sleepAction()
    {

    }
}