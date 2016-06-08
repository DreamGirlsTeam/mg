<?php

namespace GuideBundle\Controller;

use GuideBundle\Entity\Appointments;
use Proxies\__CG__\GuideBundle\Entity\Actors;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use GuideBundle\Entity\RegInfo;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use GuideBundle\Form\RegInfoType;
use GuideBundle\Entity\ConfPerson;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * RegInfo controller.
 *
 * @Route("/reception")
 */
class RegInfoController extends Controller
{
    /**
     * Lists all RegInfo entities.
     *
     * @Route("/", name="reception_index")
     * @Method("GET")
     */
    public function indexAction(Request $request)
    {
        if($this->checkRole($request)) {
            throw $this->createNotFoundException('The page you are looking for is not found');
        }
        /*$em = $this->getDoctrine()->getManager();
        $regInfos = $em->getRepository('GuideBundle:RegInfo')->findAll();*/

        return $this->render('reginfo/start.html.twig', array(
            //'regInfos' => $regInfos,
        ));
    }

    /**
     * Lists all RegInfo entities.
     *
     * @Route("/all", name="reception_all")
     * @Method("GET")
     */
    public function allAction(Request $request)
    {
        if($this->checkRole($request)) {
            throw $this->createNotFoundException('The page you are looking for is not found');
        }
        $em = $this->getDoctrine()->getManager();
         $regInfos = $em->getRepository('GuideBundle:RegInfo')->findAll();

        return $this->render('reginfo/index.html.twig', array(
            'regInfos' => $regInfos,
        ));
    }


    private function checkRole(Request $request)
    {
        if ($request->getSession()->get("user")["role"] != 4) {
            return true;
        }
    }
    /**
     * Creates a new RegInfo entity.
     *
     * @Route("/new", name="reception_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        if($this->checkRole($request)) {
            throw $this->createNotFoundException('The page you are looking for is not found');
        }
        $regInfo = new RegInfo();
        $actor = new Actors();
        $form = $this->createForm('GuideBundle\Form\RegInfoType', $regInfo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $actor->setRole(5);
            $em = $this->getDoctrine()->getManager();
            $em->persist($actor);
            $em->flush();
            $regInfo->setActorId($actor);
            $em->persist($regInfo);
            $em->flush();
            // var_dump($regInfo->getJob()->getName());
            //return $this->redirect($this->generateUrl('reception_index', array('actorId' => $actor->getId())));
            return $this->redirectToRoute('reception_confidant_new', array('actorId' => $actor->getId()));
        }

        return $this->render('reginfo/new.html.twig', array(
            'regInfo' => $regInfo,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a RegInfo entity.
     *
     * @Route("/{actorId}/show", name="reception_show")
     * @Method("GET")
     */
    public function showAction(RegInfo $regInfo, Request $request)
    {
        if($this->checkRole($request)) {
            throw $this->createNotFoundException('The page you are looking for is not found');
        }
        $deleteForm = $this->createDeleteForm($regInfo);

        return $this->render('reginfo/show.html.twig', array(
            'regInfo' => $regInfo,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing RegInfo entity.
     *
     * @Route("/{actorId}/edit", name="reception_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, RegInfo $regInfo)
    {
        if($this->checkRole($request)) {
            throw $this->createNotFoundException('The page you are looking for is not found');
        }
        $deleteForm = $this->createDeleteForm($regInfo);
        $editForm = $this->createForm('GuideBundle\Form\RegInfoType', $regInfo);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($regInfo);
            $em->flush();

            return $this->redirectToRoute('reception_index', array('actorId' => $regInfo->getActorId()->getId()));
        }

        return $this->render('reginfo/edit.html.twig', array(
            'regInfo' => $regInfo,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a RegInfo entity.
     *
     * @Route("/{actorId}/delete", name="reception_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, RegInfo $regInfo)
    {
        if($this->checkRole($request)) {
            throw $this->createNotFoundException('The page you are looking for is not found');
        }
        $form = $this->createDeleteForm($regInfo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($regInfo);
            $em->flush();
        }

        return $this->redirectToRoute('reception_index');
    }

    /**
     * Creates a form to delete a RegInfo entity.
     *
     * @param RegInfo $regInfo The RegInfo entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(RegInfo $regInfo)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('reception_delete', array('actorId' => $regInfo->getActorId()->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

    /**
     * @Route("/visits", name="reception_visits")
     * @Method("GET")
     */
    public function visitsAction(Request $request)
    {
        $form = $this->createFormBuilder()
            ->add('doctor', TextType::class, array('label' => 'Спеціалізація лікаря', 'attr' => array('class' => 'doc')))
            ->add('patient', TextType::class, array('label' => 'Ім\'я пацієнта', 'attr' => array('class' => 'pat')))
            ->add("date", TextType::class, array('label' => 'Дата <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>', 'attr' => array('class' => 'datepicker validation[required, minSize[10], maxSize[10]]')))
            ->add("save", SubmitType::class, array('label' => 'Знайти розклад', 'attr' => array('class' => 'getSchedule')))
            ->getForm();
        return $this->render('reginfo/visits.html.twig', array(
            "form" => $form->createView()
        ));

    }

    /**
     * @Route("/search/doctor", name="reception_search_doctor")
     * @Method("POST")
     */
    public function searchDoctorAction(Request $request)
    {
        if($this->checkRole($request)) {
            throw $this->createNotFoundException('The page you are looking for is not found');
        }
        $isAjax = $request->isXMLHttpRequest();
        if ($isAjax) {
            $em = $this->getDoctrine()->getManager();
            $search = $request->request->get('search');
            $doctors = $em->createQuery('select s
                            from GuideBundle:MedicalStaff s
                            left join GuideBundle:Actors a
                            where s.actorId = a.id
                            where s.specialization like :search
                            and a.role = 2
                            '
            )
                ->setParameter('search', $search . '%')
                ->getResult();
            foreach ($doctors as $doctor) {
                $doc[] = $doctor->getLastName() . " " . $doctor->getFirstName() . " (" . $doctor->getSpecialization() . ")";
            }
            return new JsonResponse(array('doctors' => $doc));
        }
        return new Response('Permission denied', 400);
    }

    /**
     * @Route("/search/patient", name="reception_search_patient")
     * @Method("POST")
     */
    public function searchPatientAction(Request $request)
    {
        if($this->checkRole($request)) {
            throw $this->createNotFoundException('The page you are looking for is not found');
        }
        $isAjax = $request->isXMLHttpRequest();
        if ($isAjax) {
            $em = $this->getDoctrine()->getManager();
            $search = $request->request->get('search');
            $repository = $em->getRepository('GuideBundle:RegInfo');
            $query = $repository->createQueryBuilder('r')
                ->where('r.lastName LIKE :search')
                ->setParameter('search', $search . '%')
                ->getQuery();
            $patients = $query->getResult();
            foreach ($patients as $patient) {
                $pat[] = $patient->getLastName() . " " . $patient->getFirstName() . " " . $patient->getPatronymic();
            }
            return new JsonResponse(array('patients' => $pat));
        }
        return new Response('Permission denied', 400);
    }

    /**
     * @Route("/appointment/", name="reception_appointment")
     * @Method("POST")
     */
    public function appointmentAction(Request $request)
    {
        if($this->checkRole($request)) {
            throw $this->createNotFoundException('The page you are looking for is not found');
        }
        $app = new Appointments();
        $em = $this->getDoctrine()->getManager();
       // $docPerson = $em->getRepository('GuideBundle:MedicalStaff')->find($request->getSession()->get("schedule")["doc"]);
        //var_dump($request->getSession()->get("schedule")["doc"]);
        $date =  new \DateTime($request->getSession()->get("schedule")["date"]);
        $date->format("Y-m-d");
        $app->setDate($date);
        $times = explode(" ", $request->request->get('visitTime'));
        $beginTime = $times[0];
        //$endTime = $pat = $request->request->get("endTime");
        $endTime = $times[1];
        $beginTime =  new \DateTime($beginTime);
        $beginTime->format("H:i:s");
        $endTime =  new \DateTime($endTime);
        $endTime->format("H:i:s");
        $app->setBeginTime($beginTime);
        $app->setDocId($request->getSession()->get("schedule")["doc"]);
        $app->setPatName($request->getSession()->get("schedule")["pat"]);
        $app->setEndTime($endTime);
        $em->persist($app);
        $em->flush();
        return $this->redirectToRoute("reception_index");

    }

    /**
     * @Route("/load/schedule", name="reception_load_schedule")
     * @Method("POST")
     */
    public function loadScheduleAction(Request $request)
    {
        if($this->checkRole($request)) {
            throw $this->createNotFoundException('The page you are looking for is not found');
        }
        $isAjax = $request->isXMLHttpRequest();
        if ($isAjax) {
            $em = $this->getDoctrine()->getManager();
            $doc = $request->request->get("doc");
            $docName = explode(" (", $doc)[0];
            $docSpec = substr(explode(" (", $doc)[1], 0, -1);
            $docLastName = explode(" ", $docName)[0];
            $docFirstName = explode(" ", $docName)[1];
            $pat = $request->request->get("pat");
            $date = $request->request->get("date");
            $docPerson = $em->getRepository('GuideBundle:MedicalStaff')->findOneBy(array(
                "first_name" => $docFirstName,
                "last_name" => $docLastName,
                "specialization" => $docSpec
            ));

            if (is_object($docPerson) && preg_match("/^\d{4}\-(0?[1-9]|1[012])\-(0?[1-9]|[12][0-9]|3[01])$/", $date) === 1) {
                $docTimetable = $em->getRepository('GuideBundle:Timetable')->findOneBy(array(
                    "actorId" => $docPerson->getActorId()->getId()
                ));
                if (!is_object($docTimetable)) {
                    return new JsonResponse(array("exists" => true));
                } else {
                    $request->getSession()->set("schedule", array(
                        "doc" => $docPerson->getActorId()->getId(),
                        "pat" => $pat,
                        "date" => $date
                    ));
                    $date =  new \DateTime($date);
                    $date->format("Y-m-d");
                    $appointments = $em->getRepository('GuideBundle:Appointments')->findBy(array(
                        "docId" => $docPerson->getActorId()->getId(),
                        "date" => $date
                    ));
                    $times = $this->buildTimetable($docTimetable, $appointments);
                    foreach ($appointments as $appointment) {
                        $app[] = array("beginTime" => $appointment->getBeginTime(),
                            "endTime" => $appointment->getEndTime());
                    }
                    $view = $this->renderView("regInfo/appointments.html.twig", array("app" => $app, "times" => $times));
                    return new JsonResponse(array("appointment" => $view));
                }

            } else {
                return new JsonResponse(array("valid" => false));
            }
        } else {
            return new Response('Permission denied', 400);
        }

    }

    private function buildTimetable($doctor, $appointments)
    {
        $appTimes = array();
        $availableTimes = array();
        foreach ($appointments as $app) {
            $appTimes[] = $app->getBeginTime()->format('H:i:s');
        }
        $begTime=  $doctor->getBeginTime()->format('H:i:s');
        $endTime = \DateTime::createFromFormat('H:i:s', $doctor->getEndTime()->format('H:i:s'));
        $averTime = $doctor->getAverTime();
        $appBegTime = \DateTime::createFromFormat('H:i:s', $begTime);
        while ($appBegTime->format('H:i:s') < $endTime->format('H:i:s')) {
            if (!in_array($appBegTime->format('H:i:s'), $appTimes)) {
                $availableTimes[] = array(
                    "begTime" => $appBegTime->format('H:i:s'),
                    "endTime" => $appBegTime->modify('+'.$averTime.' minutes')->format('H:i:s')
                );
            } else {
                $appBegTime->modify('+'.$averTime.' minutes')->format('H:i:s');
            }
        }
        return $availableTimes;
    }

}
