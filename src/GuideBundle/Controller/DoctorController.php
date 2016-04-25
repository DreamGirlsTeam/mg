<?php

namespace GuideBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * ConfPerson controller.
 *
 * @Route("/doctor")
 */
class DoctorController extends Controller
{
    /**
     * @Route("/", name="doctor")
     */
    public function doctorAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $regInfos = $em->getRepository('GuideBundle:RegInfo')->findAll();

        return $this->render('doc/index.html.twig', array(
            'regInfos' => $regInfos,
        ));
    }

    /**
     * @Route("/card/{actorId}", name="doctor_card")
     */
    public function cardAction(Request $request, $actorId)
    {
        return $this->render('doc/card.html.twig', array(
        ));
    }
}
