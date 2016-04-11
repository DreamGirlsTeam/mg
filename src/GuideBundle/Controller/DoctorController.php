<?php

namespace GuideBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DoctorController extends Controller
{
    /**
     * @Route("/doctor", name="doctor")
     */

    public function doctorAction()
    {
        echo "Hello!";
    }
}
