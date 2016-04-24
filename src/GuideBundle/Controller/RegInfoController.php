<?php

namespace GuideBundle\Controller;

use Proxies\__CG__\GuideBundle\Entity\Actors;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use GuideBundle\Entity\RegInfo;
use GuideBundle\Form\RegInfoType;
use GuideBundle\Entity\ConfPerson;

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
        $query = $em->createQueryBuilder('r')
            ->select('r')
            ->from('GuideBundle:RegInfo', 'r')
            ->leftJoin('GuideBundle:ConfPerson', 'cp', 'WITH', 'cp.actorId = r.actorId');
        //$regInfos = $em->getRepository('GuideBundle:RegInfo')->findAll();
        $regInfos = $em->createQuery($query)->getResult();
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
            return $this->redirect($this->generateUrl('reception_confidant_new', array('actorId' => $actor->getId())));
           // return $this->redirectToRoute('reception_confidant_new', array('actorId' => $actor->getId()));
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

            return $this->redirectToRoute('reception_edit', array('actorId' => $regInfo->getActorId()->getId()));
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
}
