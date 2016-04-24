<?php

namespace GuideBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use GuideBundle\Entity\ConfPerson;
use GuideBundle\Form\ConfPersonType;

/**
 * ConfPerson controller.
 *
 * @Route("/reception/confidant")
 */
class ConfPersonController extends Controller
{
    /**
     * Lists all ConfPerson entities.
     *
     * @Route("/", name="reception_confidant_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $confPeople = $em->getRepository('GuideBundle:ConfPerson')->findAll();

        return $this->render('confperson/index.html.twig', array(
            'confPeople' => $confPeople,
        ));
    }

    /**
     * Creates a new ConfPerson entity.
     *
     * @Route("/new/{actorId}", name="reception_confidant_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, $actorId)
    {
        $confPerson = new ConfPerson();
        $form = $this->createForm('GuideBundle\Form\ConfPersonType', $confPerson);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $confPerson->setActorId($actorId);
            $em->persist($confPerson);
            $em->flush();

            return $this->redirectToRoute('reception_index');
        }

        return $this->render('confperson/new.html.twig', array(
            'confPerson' => $confPerson,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ConfPerson entity.
     *
     * @Route("/{actorId}/show", name="reception_confidant_show")
     * @Method("GET")
     */
    public function showAction(ConfPerson $confPerson)
    {
        $deleteForm = $this->createDeleteForm($confPerson);

        return $this->render('confperson/show.html.twig', array(
            'confPerson' => $confPerson,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ConfPerson entity.
     *
     * @Route("/{actorId}/edit", name="reception_confidant_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ConfPerson $confPerson)
    {
        $deleteForm = $this->createDeleteForm($confPerson);
        $editForm = $this->createForm('GuideBundle\Form\ConfPersonType', $confPerson);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($confPerson);
            $em->flush();

            return $this->redirectToRoute('reception_index');
        }

        return $this->render('confperson/edit.html.twig', array(
            'confPerson' => $confPerson,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ConfPerson entity.
     *
     * @Route("/{actorId/delete}", name="reception_confidant_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ConfPerson $confPerson)
    {
        $form = $this->createDeleteForm($confPerson);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($confPerson);
            $em->flush();
        }

        return $this->redirectToRoute('reception_confidant_index');
    }

    /**
     * Creates a form to delete a ConfPerson entity.
     *
     * @param ConfPerson $confPerson The ConfPerson entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ConfPerson $confPerson)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('reception_confidant_delete', array('id' => $confPerson->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
