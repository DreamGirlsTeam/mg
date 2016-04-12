<?php

namespace GuideBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class NurseController extends Controller
{
//    /**
//     * @Route("/reception, name="reception")
//     */
    public function receptionAction(Request $request)
    {
        return new Response('Hello girl without education!');
    }
}
