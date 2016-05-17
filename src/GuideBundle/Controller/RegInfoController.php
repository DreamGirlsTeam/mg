<?php

namespace GuideBundle\Controller;

use Proxies\__CG__\GuideBundle\Entity\Actors;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use GuideBundle\Entity\RegInfo;
use Symfony\Component\Form\Extension\Core\Type\TextType;
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
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
//        $query = $em->createQueryBuilder('r')
//            ->select('r')
//            ->from('GuideBundle:RegInfo', 'r')
//            ->leftJoin('GuideBundle:ConfPerson', 'cp', 'WITH', 'cp.first_name = r.first_name');
        $regInfos = $em->getRepository('GuideBundle:RegInfo')->findAll();
       // $regInfos = $em->createQuery($query)->getResult();
        //$regInfos = $em->getRepository('GuideBundle:ConfPerson')->findAll();

        return $this->render('reginfo/index.html.twig', array(
            'regInfos' => $regInfos,
        ));
    }

    /**
     * Creates a new RegInfo entity.
     *
     * @Route("/new", name="reception_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
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
    public function showAction(RegInfo $regInfo)
    {
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
            ->getForm()
        ;
    }

    /**
     * @Route("/visits", name="reception_visits")
     * @Method("GET")
     */
    public function visitsAction()
    {
        $form = $this->createFormBuilder()
            ->add('doctor', TextType::class, array('label' => 'Ім\'я лікаря', 'attr' => array('class'=>'doc')))
            ->add('patient', TextType::class, array('label' => 'Ім\'я пацієнта', 'attr' => array('class'=>'pat')))
            ->add("datetime", TextType::class, array('attr' => array('class' => 'datetime')))
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
        $isAjax = $request->isXMLHttpRequest();
        if ($isAjax) {
            $em = $this->getDoctrine()->getManager();
            $search = $request->request->get('search');
           // $repository = $em->getRepository('GuideBundle:MedicalStaff');
            $doctors = $em->createQuery('select s
                            from GuideBundle:MedicalStaff s
                            left join GuideBundle:Actors a
                            where s.actorId = a.id
                            where s.last_name like :search
                            and a.role = 2
                            '
            )
                ->setParameter('search', $search.'%')
                ->getResult();
           /* $query = $em->createQueryBuilder()
                ->select('s')
                ->from('GuideBundle:MedicalStaff', 's')
                ->leftJoin('GuideBundle:Actors', 'a','\Doctrine\ORM\Query\Expr\Join::ON, �s.actorId = a.id')
                ->where('a.role = 2')
                //->setParameter('search', $search.'%')
                ->getQuery();
            $doctors = $query->getResult();*/
            foreach ($doctors as $doctor) {
                $doc[] = $doctor->getLastName()." ".$doctor->getFirstName()." (".$doctor->getSpecialization().")";
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
        $isAjax = $request->isXMLHttpRequest();
        if ($isAjax) {
            $em = $this->getDoctrine()->getManager();
            $search = $request->request->get('search');
            $repository = $em->getRepository('GuideBundle:RegInfo');
            $query = $repository->createQueryBuilder('r')
                ->where('r.lastName LIKE :search')
                ->setParameter('search', $search.'%')
                ->getQuery();
            $patients = $query->getResult();
            foreach ($patients as $patient) {
                $pat[] = $patient->getLastName()." ".$patient->getFirstName()." ".$patient->getPatronymic();
            }
            return new JsonResponse(array('patients' => $pat));
        }
        return new Response('Permission denied', 400);
    }

}
