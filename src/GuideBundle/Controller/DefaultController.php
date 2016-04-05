<?php

namespace GuideBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/y")
     */
    public function indexAction()
    {
        $names = array("name" => "Marina, Olexandra, Eleonora");
        return $this->render('default/index.html.twig', array("names" => $names));
    }
}
