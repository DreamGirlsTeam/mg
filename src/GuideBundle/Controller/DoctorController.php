<?php

namespace GuideBundle\Controller;

use FOS\UserBundle\Controller\SecurityController;
use GuideBundle\Entity\Visits;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

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
        $em = $this->getDoctrine()->getManager();
        $analys = $em->getRepository('GuideBundle:AnalysRes')->findBy(
            array('patId' => $actorId),
            array('date' => 'ASC')
        );
        $visits = $em->getRepository('GuideBundle:Visits')->findBy(
            array('patId' => $actorId)
        );
        return $this->render('doc/card.html.twig', array(
            'actorId' => $actorId,
            'analysys' => $analys,
            "visits" => $visits
        ));
    }

    /**
     * @Route("/visit/{actorId}", name="doctor_visit")
     */
    public function visitAction(Request $request, $actorId)
    {
        $form = $this->createForm('GuideBundle\Form\VisitsType');
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $type = $form->getData()->getType()->getId();
            return $this->redirectToRoute("visit_form", array('actorId' => $actorId, 'type' => $type));
        }
        return $this->render('doc/visit.html.twig', array(
            'actorId' => $actorId,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/form/{actorId}/{type}", name="visit_form")
     */
    public function VisitFormAction($actorId, $type, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $session = new Session();
        $typeName = $em->getRepository('GuideBundle:VisitTypes')->find($type);
        $actor = $em->getRepository('GuideBundle:Actors')->find($actorId);
        $doc = $em->getRepository('GuideBundle:Actors')->find($session->get('user')["id"]);
        $form = $this->createFormBuilder()
            ->add('conclusion', TextareaType::class, array('label' => 'Висновок', 'attr' => array('placeholder'=>'Введіть висновок щодо стану пацієнта, або рекомендації щодо здоров\'я')))
            ->add('save', SubmitType::class, array('label' => 'Зберегти візит'))
            ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $visit = $this->setVisitByType($typeName->getName(), $actor, $form->getData()["conclusion"], $doc);
            $em->persist($visit);
            $em->flush();
            return $this->redirectToRoute("doctor_card", array("actorId" => $actorId));
        }
        return $this->render('doc/consult.html.twig', array(
            'form' => $form->createView(),
            'type' => $typeName->getName()
        ));
    }

    private function setVisitByType($type, $actor, $comment, $doc)
    {
        $visit = new Visits();
        $visit->setDate(new \DateTime(date('Y-m-d H:i:s')));
        $visit->setType($type);
        $visit->setPatId($actor);
        $visit->setDocId($doc);
        $visit->setComment($comment);
        return $visit;
    }
}
