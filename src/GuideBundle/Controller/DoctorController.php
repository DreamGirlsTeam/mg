<?php

namespace GuideBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DoctorController extends Controller
{

    /**
     * @Route("doctor", name="doctor")
     */
    public function doctorAction(Request $request)
    {
        return new Response('Hello doc!');
    }
}
