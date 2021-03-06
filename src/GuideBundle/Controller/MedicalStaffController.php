<?php
namespace GuideBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use GuideBundle\Entity\MedicalStaff;
use GuideBundle\Form\MedicalStaffType;
use GuideBundle\Entity\Actors;
use GuideBundle\Entity\Auth;
use GuideBundle\Entity\Jobs;

/**
 * MedicalStaffController controller.
 *
 * @Route("/admin")
 */
class MedicalStaffController extends Controller
{
    /**
     * Lists all MedicalStaff entities.
     *
     * @Route("/", name="admin_index")
     * @Method("GET")
     */
    public function indexAction(Request $request)
    {
        if($this->checkRole($request)) {
            throw $this->createNotFoundException('The page you are looking for is not found');
        }
        $em = $this->getDoctrine()->getManager();
        $medicalStaffs = $em->getRepository('GuideBundle:MedicalStaff')->findAll();
        return $this->render('medicalstaff/index.html.twig', array(
            'medicalStaffs' => $medicalStaffs,
        ));
    }

    private function checkRole(Request $request)
    {
        if ($request->getSession()->get("user")["role"] != 1) {
            return true;
        }
    }

    /**
     * Creates a new MedicalStaff entity.
     *
     * @Route("/new", name="admin_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        if($this->checkRole($request)) {
            throw $this->createNotFoundException('The page you are looking for is not found');
        }
        $medicalStaff = new MedicalStaff();
        $actor = new Actors();
        $form = $this->createForm('GuideBundle\Form\MedicalStaffType', $medicalStaff);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $actor->setRole(2);
            $em = $this->getDoctrine()->getManager();
            $em->persist($actor);
            $em->flush();
            $medicalStaff->setActorId($actor);
            $em->persist($medicalStaff);
            $em->flush();
            $this->generateLogin($actor, $medicalStaff->getEmail());
            return $this->redirect($this->generateUrl('admin_index', array('actorId' => $actor->getId())));
        }
        return $this->render('medicalstaff/new.html.twig', array(
            'medicalStaff' => $medicalStaff,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a MedicalStaff entity.
     *
     * @Route("/{actorId}/show", name="admin_show")
     * @Method("GET")
     */
    public function showAction(MedicalStaff $medicalStaff) //MedicalStaff $medicalStaff
    {
        if($this->checkRole($request)) {
            throw $this->createNotFoundException('The page you are looking for is not found');
        }
        $deleteForm = $this->createDeleteForm($medicalStaff);
        return $this->render('medicalstaff/show.html.twig', array(
            'medicalStaff' => $medicalStaff,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing MedicalStaff entity.
     *
     * @Route("/{actorId}/edit", name="admin_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, MedicalStaff $medicalStaff)
    {
        if($this->checkRole($request)) {
            throw $this->createNotFoundException('The page you are looking for is not found');
        }
        $deleteForm = $this->createDeleteForm($medicalStaff);
        $editForm = $this->createForm('GuideBundle\Form\MedicalStaffType', $medicalStaff);
        $editForm->handleRequest($request);
        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($medicalStaff);
            $em->flush();
            return $this->redirectToRoute('admin_index', array('actorId' => $medicalStaff->getActorId()->getId()));
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
     * @Route("/{actorId}/delete", name="admin_delete")
     * @Method({"DELETE", "GET"})
     */
    public function deleteAction(Request $request, MedicalStaff $medicalStaff, $actorId)
    {
        if($this->checkRole($request)) {
            throw $this->createNotFoundException('The page you are looking for is not found');
        }
        $form = $this->createDeleteForm($medicalStaff);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $repo = $em->getRepository('GuideBundle:Auth');
            $auth = $repo->findOneBy(array('actorId' => $actorId));
            $em->remove($auth);
            $em->flush();
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
            ->setAction($this->generateUrl('admin_delete', array('actorId' => $medicalStaff->getActorId()->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

    private function generateLogin(Actors $actor, $email)
    {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $user = new Auth();
        $passwordLength = rand(8, 15);
        $user->setUsername(explode('@', $email)[0]);
        $user->setPassword($this->random_password($passwordLength));
        $user->setActorId($actor);
        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();
        $message = \Swift_Message::newInstance()
            ->setSubject('MedicalGuide')
            ->setFrom('medicalguidesystem@gmail.com')
            ->setTo($email)
            ->setBody(
                '³����! �� ���� ������������ � ������ �� ����. ��� ���� ��� ����� � �������: ' . $user->getUsername() . ' ������: ' . $user->getPassword()
            );
        $result = $this->get('mailer')->send($message);
        return $user;
    }

    private function random_password($length)
    {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@%^*()_-";
        $password = substr(str_shuffle($chars), 0, $length);
        return $password;
    }
}
