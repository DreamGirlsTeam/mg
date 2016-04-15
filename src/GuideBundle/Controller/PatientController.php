<?php

namespace GuideBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PatientController extends Controller
{
//    /**
//     * @Route("/patient, name="patient")
//     */
    public function patientAction(Request $request)
    {
        return new Response('Hello patient!');
    }
}
