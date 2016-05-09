<?php

namespace ScheduleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/reception/schedule", name="schedule")
     */
    public function indexAction()
    {
        return $this->render('ScheduleBundle:Default:index.html.twig');
    }
}
