<?php

namespace GuideBundle\Controller;

use FOS\UserBundle\Controller\SecurityController;
use GuideBundle\Entity\Visits;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\JsonResponse;

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
        $ill = $em->getRepository('GuideBundle:Illnesses')->findAll();
        var_dump(array_intersect(array(5, 6, 7, 8), array(5, 7, 9, 2)));
        /* foreach ($ill as $i) {
             echo $i->getName();
             foreach ($i->getSymptoms() as $ii) {
                 var_dump($ii->getName());
             }
             echo "<br>";
         }*/


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
            if ($type != 2) {
                return $this->redirectToRoute("visit_form", array('actorId' => $actorId, 'type' => $type));
            } else {
                return $this->redirectToRoute("visit_treatment", array('actorId' => $actorId));
            }
        }
        return $this->render('doc/visit.html.twig', array(
            'actorId' => $actorId,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/search/sympt", name="search_sympt")
     */
    public function SearchSymptAction(Request $request)
    {
        $isAjax = $request->isXMLHttpRequest();
        if ($isAjax) {
            $em = $this->getDoctrine()->getManager();
            $search = $request->request->get('search');
            $repository = $em->getRepository('GuideBundle:Symptoms');
            $query = $repository->createQueryBuilder('s')
                ->where('s.name LIKE :search')
                ->setParameter('search', $search . '%')
                ->getQuery();
            $symptoms = $query->getResult();
            foreach ($symptoms as $symptom) {
                $sympt[] = $symptom->getName();
            }
            return new JsonResponse(array('symptoms' => $sympt));
        }
        return new Response('Permission denied', 400);

    }

    /**
     * @Route("/treat", name="get_treatment")
     */
    public function GetTreatmentAction(Request $request)
    {
        if ($request->isXMLHttpRequest()) {
            $symptoms = explode(",", $request->request->get('search'));
            $em = $this->getDoctrine()->getManager();
            foreach ($symptoms as $symp) {
                $symp_id = $em->getRepository('GuideBundle:Symptoms')->findOneBy(array(
                    'name' => $symp
                ));
                if (!is_object($symp_id)) {
                    $error[] = $symp;
                } elseif (count($symptoms) < 2 || count($symptoms) > 10) {
                    $error_count = true;
                } else {
                    $symp_array[] = $symp_id;
                }
            }
            if ($error || $error_count) {
                return new JsonResponse(array('valid' => $error, 'count' => $error_count));
            }
            $illnesses = $this->getIll($symp_array);
            return new JsonResponse(array('illnesses' => $illnesses));

        } else {
            return new Response('Permission denied', 400);
        }

    }

    private function getIll($symptoms)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('GuideBundle:Illnesses');
        foreach ($symptoms as $symptom) {
            $symp_ids[] = $symptom->getName();
        }
        foreach ($symptoms as $symptom) {
            $illnesses = null;
            $query = $em->createQueryBuilder();
            $query->select('i');
            $query->from('GuideBundle:Illnesses', 'i');
            $query->leftJoin('i.symptoms', 's');
            $query->where('s.name = :symName');
            $query->setParameter("symName", $symptom->getName());
            $illness = $query->getQuery()->execute();
            foreach ($illness as $illn) {
                foreach ($illn->getSymptoms() as $symp) {
                    if (!in_array($illnesses[$illn->getName()], $symp->getName()))
                        $illnesses[$illn->getName()][] = $symp->getName();
                }
            }
            $result[] = $illnesses;
        }

        foreach ($result as $illnesses) {
            //var_dump($illnesses);
            foreach ($illnesses as $ill => $symp) {
                //var_dump(count(array_unique(array_intersect($symp, $symp_ids))) / count($symptoms));
                $criteria = (count(array_unique(array_intersect($symp, $symp_ids)))) / (count($symptoms));
                //var_dump(array_unique(array_intersect($symp, $symp_ids)));
                if (count($symptoms) == 2 && $criteria === 2) {
                    $to_show[] = array('ill' => $ill, 'sym' => $symp, "procent" => $criteria * 100);
                } elseif ($criteria >= ((count($symptoms) % 2) + 1) / count($symptoms)) {
                    $to_show[] = array('ill' => $ill, 'sym' => $symp, "procent" => $criteria * 100);
                }
            }
        }
        $view = $this->renderView('doc/illnesses.html.twig',
            array('illnesses' => $to_show));
        return $view;

    }

    /**
     * @Route("/treat/{actorId}/", name="visit_treatment")
     */
    public function VisitTreatmentAction(Request $request, $actorId)
    {
        //$form->handleRequest($request);
        if ($request->isXMLHttpRequest()) {
            return new JsonResponse(array($request->request->get('search')));
        } else {
            $form = $this->createFormBuilder()
                ->add('symptoms', TextType::class, array('label' => 'Введіть симптоми <a class="sympt_info" href="#"><span class="ui-icon ui-icon-info">ddfd</span></a>', 'attr' => array('class' => 'sympt')))
                ->add('save', SubmitType::class, array('label' => 'Підтвердити'))
                ->getForm();
            return $this->render('doc/treatment.html.twig', array(
                'form' => $form->createView()
            ));
        }

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
            ->add('conclusion', TextareaType::class, array('label' => 'Висновок', 'attr' => array('placeholder' => 'Введіть висновок щодо стану пацієнта, або рекомендації щодо здоров\'я')))
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
