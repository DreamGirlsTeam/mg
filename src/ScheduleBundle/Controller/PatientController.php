<?php

namespace ScheduleBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use ScheduleBundle\Entity\Patient;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

/**
 * Patient controller.
 *
 * @Route("/reception/schedule")
 */
class PatientController extends Controller
{
    /**
     * Lists all Patient entities.
     *
     * @Route("/", name="reception_schedule_index")
     * @Method({"GET", "POST"})
     */
    public function indexAction(Request $request)
    {
        $form = $this->createFormBuilder()
            ->add('number', IntegerType::class, array('label' => 'Кількість пацієнтів', 'attr' => array('class'=>'validate[required,max[20], min[1]]')))
            ->add('save', SubmitType::class, array('label' => 'Зберегти'))
            ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if ($form->getData()) {

            }
        }
        return $this->render('patient/start.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * Creates a new Patient entity.
     *
     * @Route("/new", name="reception_schedule_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $patient = new Patient();
        $form = $this->createForm('ScheduleBundle\Form\PatientType', $patient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($patient);
            $em->flush();

            return $this->redirectToRoute('reception_schedule_show', array('id' => $patient->getId()));
        }

        return $this->render('patient/new.html.twig', array(
            'patient' => $patient,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Patient entity.
     *
     * @Route("/{id}", name="reception_schedule_show")
     * @Method("GET")
     */
    public function showAction(Patient $patient)
    {
        $deleteForm = $this->createDeleteForm($patient);

        return $this->render('patient/show.html.twig', array(
            'patient' => $patient,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Patient entity.
     *
     * @Route("/{id}/edit", name="reception_schedule_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Patient $patient)
    {
        $deleteForm = $this->createDeleteForm($patient);
        $editForm = $this->createForm('ScheduleBundle\Form\PatientType', $patient);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($patient);
            $em->flush();

            return $this->redirectToRoute('reception_schedule_edit', array('id' => $patient->getId()));
        }

        return $this->render('patient/edit.html.twig', array(
            'patient' => $patient,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Patient entity.
     *
     * @Route("/{id}", name="reception_schedule_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Patient $patient)
    {
        $form = $this->createDeleteForm($patient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($patient);
            $em->flush();
        }

        return $this->redirectToRoute('reception_schedule_index');
    }

    /**
     * Creates a form to delete a Patient entity.
     *
     * @param Patient $patient The Patient entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Patient $patient)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('reception_schedule_delete', array('id' => $patient->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
