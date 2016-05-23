<?php

namespace GuideBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use GuideBundle\Entity\Timetable;
use GuideBundle\Form\TimetableType;

/**
 * Timetable controller.
 *
 * @Route("/reception/timetable")
 */
class TimetableController extends Controller
{
    /**
     * Lists all Timetable entities.
     *
     * @Route("/", name="reception_timetable_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $timetables = $em->getRepository('GuideBundle:Timetable')->findAll();

        return $this->render('timetable/index.html.twig', array(
            'timetables' => $timetables,
        ));
    }

    /**
     * Creates a new Timetable entity.
     *
     * @Route("/new", name="reception_timetable_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $timetable = new Timetable();
        $form = $this->createForm('GuideBundle\Form\TimetableType', $timetable);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $timetable->setActorId($form->getData()->getActorId()->getId());
            $em->persist($timetable);
            $em->flush();

            return $this->redirectToRoute('reception_timetable_index', array('id' => $timetable->getId()));
        }

        return $this->render('timetable/new.html.twig', array(
            'timetable' => $timetable,
            'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Timetable entity.
     *
     * @Route("/{id}/edit", name="reception_timetable_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Timetable $timetable)
    {
        $deleteForm = $this->createDeleteForm($timetable);
        $editForm = $this->createForm('GuideBundle\Form\TimetableType', $timetable);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($timetable);
            $em->flush();

            return $this->redirectToRoute('reception_timetable_index', array('id' => $timetable->getId()));
        }

        return $this->render('timetable/edit.html.twig', array(
            'timetable' => $timetable,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Timetable entity.
     *
     * @Route("/{id}", name="reception_timetable_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Timetable $timetable)
    {
        $form = $this->createDeleteForm($timetable);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($timetable);
            $em->flush();
        }

        return $this->redirectToRoute('reception_timetable_index');
    }

    /**
     * Creates a form to delete a Timetable entity.
     *
     * @param Timetable $timetable The Timetable entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Timetable $timetable)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('reception_timetable_delete', array('id' => $timetable->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
