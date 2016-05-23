<?php

namespace GuideBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use GuideBundle\Entity\AnalysRes;
use GuideBundle\Form\AnalysResType;

/**
 * AnalysRes controller.
 *
 * @Route("/laborant")
 */
class AnalysResController extends Controller
{
    /**
     * Lists all AnalysRes entities.
     *
     * @Route("/", name="laborant_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $analysRes = $em->getRepository('GuideBundle:AnalysRes')->findAll();
        return $this->render('analysres/index.html.twig', array(
            'analysRes' => $analysRes,
        ));
    }

    /**
     * Creates a new AnalysRes entity.
     *
     * @Route("/new", name="laborant_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $analysRe = new AnalysRes();
        $form = $this->createForm('GuideBundle\Form\AnalysResType', $analysRe);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $file = $analysRe->getFilename();
            if (!file_exists('uploads/' . $analysRe->getPatId()->getActorId()->getId())) {
                mkdir('uploads/' . $analysRe->getPatId()->getActorId()->getId(), 0777, true);
            }
            $file->move('uploads/' . $analysRe->getPatId()->getActorId()->getId(), date('Y-m-d')."_".$file->getClientOriginalName());
            $analysRe->setFilename(date('Y-m-d')."_".$file->getClientOriginalName());
            $analysRe->setDate(new \DateTime(date('Y-m-d H:i:s')));
            $analysRe->setPatId($analysRe->getPatId()->getActorId()->getId());
            $analysRe->setName($analysRe->getName()->getName());
            $em->persist($analysRe);
            $em->flush();
            return $this->redirectToRoute("laborant_index");
           //$this->sendResults();
        }

        return $this->render('analysres/new.html.twig', array(
            'analysRe' => $analysRe,
            'form' => $form->createView(),
        ));
    }

    private function sendResults()
    {
        $message = \Swift_Message::newInstance()
            ->setSubject('Hello Email')
            ->setFrom('medicalguidesystem@gmail.com')
            ->setTo('eleonoria96@gmail.com')
            ->setBody('HELLO!'
            )
        ;
        var_dump($this->get('mailer'));
        $this->get('mailer')->send($message);
    }

    /**
     * Finds and displays a AnalysRes entity.
     *
     * @Route("/{id}", name="laborant_show")
     * @Method("GET")
     */
    public function showAction(AnalysRes $analysRe)
    {
        $deleteForm = $this->createDeleteForm($analysRe);

        return $this->render('analysres/show.html.twig', array(
            'analysRe' => $analysRe,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing AnalysRes entity.
     *
     * @Route("/{id}/edit", name="laborant_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, AnalysRes $analysRe)
    {
        $deleteForm = $this->createDeleteForm($analysRe);
        $editForm = $this->createForm('GuideBundle\Form\AnalysResType', $analysRe);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($analysRe);
            $em->flush();

            return $this->redirectToRoute('laborant_edit', array('id' => $analysRe->getId()));
        }

        return $this->render('analysres/edit.html.twig', array(
            'analysRe' => $analysRe,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a AnalysRes entity.
     *
     * @Route("/{id}", name="laborant_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, AnalysRes $analysRe)
    {
        $form = $this->createDeleteForm($analysRe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($analysRe);
            $em->flush();
        }

        return $this->redirectToRoute('laborant_index');
    }

    /**
     * Creates a form to delete a AnalysRes entity.
     *
     * @param AnalysRes $analysRe The AnalysRes entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(AnalysRes $analysRe)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('laborant_delete', array('id' => $analysRe->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
