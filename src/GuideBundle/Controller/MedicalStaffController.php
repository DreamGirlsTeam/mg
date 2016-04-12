<?php

namespace GuideBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use GuideBundle\Entity\MedicalStaff;
use GuideBundle\Form\MedicalStaffType;

/**
 * MedicalStaff controller.
 *
 * @Route("/admin")
 */
class MedicalStaffController extends Controller
{
    /**
     * Lists all MedicalStaff entities.
     *
     * @Route("/admin", name="admin_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $medicalStaffs = $em->getRepository('GuideBundle:MedicalStaff')->findAll();

        return $this->render('medicalstaff/index.html.twig', array(
            'medicalStaffs' => $medicalStaffs,
        ));
    }

    /**
     * Creates a new MedicalStaff entity.
     *
     * @Route("/new", name="admin_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $medicalStaff = new MedicalStaff();
        $form = $this->createForm('GuideBundle\Form\MedicalStaffType', $medicalStaff);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($medicalStaff);
            $em->flush();
<<<<<<< HEAD
=======

>>>>>>> bd272d0003e5310d4909a26dd413d6c0e9b69b11
            $flash = $this->get('braincrafted_bootstrap.flash');
            $flash->success('This is an success flash message.');
            //return $this->redirect('admin_show');
        }

        return $this->render('medicalstaff/new.html.twig', array(
            'medicalStaff' => $medicalStaff,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a MedicalStaff entity.
     *
     * @Route("/{id}", name="admin_show")
     * @Method("GET")
     */
    public function showAction(MedicalStaff $medicalStaff)
    {
        $deleteForm = $this->createDeleteForm($medicalStaff);

        return $this->render('medicalstaff/show.html.twig', array(
            'medicalStaff' => $medicalStaff,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing MedicalStaff entity.
     *
     * @Route("/{id}/edit", name="admin_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, MedicalStaff $medicalStaff)
    {
        $deleteForm = $this->createDeleteForm($medicalStaff);
        $editForm = $this->createForm('GuideBundle\Form\MedicalStaffType', $medicalStaff);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($medicalStaff);
            $em->flush();

            return $this->redirectToRoute('admin_edit', array('id' => $medicalStaff->getId()));
        }

        return $this->render('medicalstaff/edit.html.twig', array(
            'medicalStaff' => $medicalStaff,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a MedicalStaff entity.
     *
     * @Route("/{id}", name="admin_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, MedicalStaff $medicalStaff)
    {
        $form = $this->createDeleteForm($medicalStaff);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($medicalStaff);
            $em->flush();
        }

        return $this->redirectToRoute('admin_index');
    }

    /**
     * Creates a form to delete a MedicalStaff entity.
     *
     * @param MedicalStaff $medicalStaff The MedicalStaff entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(MedicalStaff $medicalStaff)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_delete', array('id' => $medicalStaff->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
