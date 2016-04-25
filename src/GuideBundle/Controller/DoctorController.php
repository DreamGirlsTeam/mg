<?php

namespace GuideBundle\Controller;

use GuideBundle\Entity\Visits;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use GuideBundle\Form\VisitsType;
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
            'actorId' => $actorId
        ));
    }

    /**
     * @Route("/visit/{actorId}", name="doctor_visit")
     */
    public function visitAction(Request $request, $actorId)
    {
        $visit = new Visits();
        $form = $this->createForm('GuideBundle\Form\VisitsType', $visit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
           var_dump($visit);
        }
        return $this->render('doc/visit.html.twig', array(
            'actorId' => $actorId,
            'form' => $form->createView(),
        ));
    }
}
