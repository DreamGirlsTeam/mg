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

/**
 *
 *
 */
class MedicalStaffController extends Controller
{
    /**
     * Lists all MedicalStaff entities.
     *
     * @Route("/admin", name="admin_index")
     * @Method("GET")
     */
    public function indexAction(Request $request)
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
        $actor = new Actors();
        $form = $this->createForm('GuideBundle\Form\MedicalStaffType', $medicalStaff);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $actor->setRole(2);
            $em = $this->getDoctrine()->getManager();
            $em->persist($actor);
            $em->flush();
            $medicalStaff->setActorId($actor->getId());
            $em->persist($medicalStaff);
            $em->flush();
            $this->generateLogin($medicalStaff->getActorId(),$medicalStaff->getEmail());
            $flash = $this->get('braincrafted_bootstrap.flash');
            $flash->success('Succesfully registered.');
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
    private function generateLogin($id, $email) {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $user = new Auth();
        $passwordLength = rand(8, 15);
        $user->setUsername(explode('@', $email)[0]);
        $user->setPassword(md5($this->random_password($passwordLength)));
        $user->setActorId($id);
        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();
        $message = \Swift_Message::newInstance()
            ->setSubject('Hello Email')
            ->setFrom('medicalguidesystem@gmail.com')
            ->setTo($email)
            ->setBody(
                'You was registered in MedicalGuide system as doctor. Username: '.$user->getUsername().' Password: '. $user->getPassword()
            )
            /*
             * If you also want to include a plaintext version of the message
            ->addPart(
                $this->renderView(
                    'Emails/registration.txt.twig',
                    array('name' => $name)
                ),
                'text/plain'
            )
            */
        ;
        $this->get('mailer')->send($message);
        return $user;
    }
    }

    private function random_password($length) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@%^*()_-";
        $password = substr( str_shuffle( $chars ), 0, $length );
        return $password;
    }
}
