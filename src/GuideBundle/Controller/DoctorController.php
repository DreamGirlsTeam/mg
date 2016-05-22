<?php

namespace GuideBundle\Controller;

use FOS\UserBundle\Controller\SecurityController;
use GuideBundle\Entity\Illnesses;
use GuideBundle\Entity\Medicines;
use GuideBundle\Entity\Visits;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Validator\Constraints\DateTime;

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
        $query = $em->createQueryBuilder();
        $query->select('v');
        $query->from('GuideBundle:Visits', 'v');
        $query->leftJoin('v.medicines', 'm');
        $query->where('v.patId = :patId');
        $query->setParameter("patId", $actorId);
        $visits = $query->getQuery()->execute();
        foreach ($visits as $v) {
            foreach($v->getMedicines() as $m) {
               /* var_dump($m->getName());*/
            }
        }
        /*$visits = $em->getRepository('GuideBundle:Visits')->findBy(
            array('patId' => $actorId)
        );*/
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
            $sess = $request->getSession()->set("patient", array(
                "patId" => $actorId
            ));
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
            $request->getSession()->set("symptoms", array(
                "symp" => $symptoms
            ));
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
        $to_show = array();
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

                if (count($symptoms) == 2 && $criteria === 1 && !in_array(array('ill' => $ill, 'sym' => $symp, "procent" => $criteria * 100), array_values($to_show))) {
                    $to_show[] = array('ill' => $ill, 'sym' => $symp, "procent" => $criteria * 100);
                } elseif (count($symptoms) != 2 && $criteria >= ((count($symptoms) % 2) + 1) / count($symptoms) && !in_array(array('ill' => $ill, 'sym' => $symp, "procent" => $criteria * 100), array_values($to_show))) {
                    $to_show[] = array('ill' => $ill, 'sym' => $symp, "procent" => $criteria * 100);
                }
            }
        }
        $view = $this->renderView('doc/illnesses.html.twig',
            array('illnesses' => $to_show));
        return $view;

    }

    /**
     * @Route("/search/medicines/", name="find_medicines")
     * @Method("POST")
     */
    public function findMedicinesAction(Request $request)
    {
        $isAjax = $request->isXMLHttpRequest();
        if ($isAjax) {
            $em = $this->getDoctrine()->getManager();
            $search = $request->request->get('search');
            $repository = $em->getRepository('GuideBundle:Medicines');
            $query = $repository->createQueryBuilder('m')
                ->where('m.name LIKE :search')
                ->setParameter('search', $search . '%')
                ->getQuery();
            $medicines = $query->getResult();
            foreach ($medicines as $medicine) {
                $med[] = $medicine->getName();
            }
            return new JsonResponse(array('symptoms' => $med));
        }
        return new Response('Permission denied', 400);
    }

    /**
     * @Route("/search/diagnosys/", name="find_diag")
     * @Method("POST")
     */
    public function findDiagAction(Request $request)
    {
        $isAjax = $request->isXMLHttpRequest();
        if ($isAjax) {
            $em = $this->getDoctrine()->getManager();
            $search = $request->request->get('search');
            $repository = $em->getRepository('GuideBundle:Illnesses');
            $query = $repository->createQueryBuilder('i')
                ->where('i.name LIKE :search')
                ->setParameter('search', $search . '%')
                ->getQuery();
            $illnesses = $query->getResult();
            foreach ($illnesses as $illness) {
                $ill[] = $illness->getName();
            }
            return new JsonResponse(array('illnesses' => $ill));
        }
        return new Response('Permission denied', 400);
    }

    /**
    * @Route("/save/visit/", name="visit_save")
    * @Method("POST")
    */
    public function visitSaveAction(Request $request)
    {
        $illn = $request->request->get('diag');
        $conc = $request->request->get('conclusion');
        $medicines = $request->request->get('medicines');
        $medicines = explode(",", $medicines);
        $symptoms = $request->getSession()->get("symptoms")["symp"];
        $illness = $this->addIllness($illn, $symptoms);
        $medic = $this->addMedicines($medicines,$illness);
        $doc = $request->getSession()->get("user")["id"];
        $pat = $request->getSession()->get("patient")["patId"];
        $visit = $this->setVisitByComplaint(array($doc, $pat), $illn, $medicines, $conc);
        return $this->redirectToRoute("doctor");

    }

    private function addMedicines($medicines, Illnesses $illness)
    {
        $em = $this->getDoctrine()->getManager();
        foreach ($medicines as $medicine) {
            $med = $em->getRepository('GuideBundle:Medicines')->findOneBy(array(
                "name" => $medicine
            ));
            if (!is_object($med)) {
                $med = new Medicines();
                $med->setName($medicine);
                $med->addIllness($illness);
                $med->setDescription($illness->getName());
                $em->persist($med);
                $illness->addMedicine($med);
                $em->persist($illness);
                $em->flush();
            } else {
                $med->addIllness($illness);
                $em->persist($med);
                $em->flush();
            }
        }
        return $med;
    }

    private function addIllness($name, $symptoms)
    {
        $em = $this->getDoctrine()->getManager();
        $ill = $em->getRepository('GuideBundle:Illnesses')->findOneBy(array(
            "name" => $name
        ));

        if (!is_object($ill)) {
            $illness = new Illnesses();
            $illness->setName($name);
        }
        foreach ($symptoms as $symptom) {
            $sym = $em->getRepository('GuideBundle:Symptoms')->findOneBy(array(
                "name" => $symptom
            ));
            if (!is_object($ill)) {
                $sym->addIllness($illness);
                $illness->addSymptom($sym);
                $em->persist($sym);
            } else {
                $sym->addIllness($ill);
                $ill->addSymptom($sym);
            }
        }
       /* if (!is_object($ill)) {
            $em->persist($illness);
        } else {
            $em->persist($ill);
        }
        */
        is_object($ill) ? $em->persist($ill) : $em->persist($illness);
        return is_object($ill) ? $ill : $illness;
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
                ->add('save', SubmitType::class, array('label' => 'Підтвердити', 'attr' => array("class" => "sympt_save")))
                ->getForm();
            return $this->render('doc/treatment.html.twig', array(
                'form' => $form->createView()
            ));
        }

    }


    /**
     * @Route("/input/ill/", name="input_ill")
     */
    public function InputIllAction(Request $request)
    {
        if ($request->isXMLHttpRequest()) {
            $form = $this->renderView("doc/nodiag.html.twig");
            return new JsonResponse(array("form" => $form));
        } else {
            return new JsonResponse(400);
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

    /**
     * @Route("/medicines/", name="get_medicine")
     * @Method("POST")
     */
    public function GetMedicineAction(Request $request)
    {
        if ($request->isXMLHttpRequest()) {
            $to_show = array();
            $ill = $request->request->get('search');
            $em = $this->getDoctrine()->getManager();
            $query = $em->createQueryBuilder();
            $query->select('m');
            $query->from('GuideBundle:Medicines', 'm');
            $query->leftJoin('m.illnesses', 'i');
            $query->where('i.name = :illName');
            $query->setParameter("illName", $ill);
            $medicinesObj = $query->getQuery()->execute();

            foreach ($medicinesObj as $med) {
                $to_show[] = array("name" => $med->getName(), "description" => $med->getDescription());
            }
            $view = $this->renderView('doc/medicines.html.twig',
                array('medicines' => $to_show, 'diagnosys' => $ill));

            return new JsonResponse(array('medicine' => $view));
        } else {
            return new Response('Permission denied', 400);
        }

    }

    /**
     * @Route("/save/", name="save")
     * @Method("POST")
     */
    public function SaveAction(Request $request)
    {
        if ($request->isXMLHttpRequest()) {
            $ill = $request->request->get('diagnosys');
            $medicines = $request->request->get('medicines');
            $comment = $request->request->get('conclusion');
            $doc = $request->getSession()->get("user")["id"];
            $pat = $request->getSession()->get("patient")["patId"];
            if ($ill && $medicines && $doc && $pat) {
                $this->setVisitByComplaint(array($doc, $pat), $ill, $medicines, $comment);
                return new JsonResponse(array('success' => true));
            } else {
                return new JsonResponse(400);
            }

        } else {
            return new Response('Permission denied', 400);
        }

    }

    private function setVisitByComplaint($users, $ill, $medicines, $comment)
    {
        $visit = new Visits();
        $em = $this->getDoctrine()->getEntityManager();
        foreach ($users as $user) {
            $actor[] = $em->getRepository('GuideBundle:Actors')->find($user);
        }
        foreach ($medicines as $medicine) {
            $med = $em->getRepository('GuideBundle:Medicines')->findOneBy(
                array(
                    'name' => $medicine
                )
            );
            $visit->addMedicine($med);
        }
        $type = $em->getRepository('GuideBundle:VisitTypes')->find(2)->getName();
        $visit->setType($type);
        $visit->setDate(new \DateTime(date('Y-m-d H:i:s')));
        $visit->setDocId($actor[0]);
        $visit->setPatId($actor[1]);
        $visit->setComment($comment);
        $visit->setIllnesses($ill);
        $em->persist($visit);
        $em->flush();
        return $visit;
    }

}
