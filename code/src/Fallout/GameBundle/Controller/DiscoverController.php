<?php
namespace Fallout\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DiscoverController extends Controller
{
    public function searchAction(Request $request)
    {

        return new JsonResponse();
    }

    public function sleepAction()
    {

    }
}