<?php

namespace GuideBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class DoctorController extends Controller
{

    /**
     * @Route("/doctor/cab", name="doctor")
     */
    public function doctorAction(Request $request)
    {
        echo "LOH";
        return;
    }
}
