<?php

namespace GuideBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Routing\RouteCollection;

use GuideBundle\Entity\Auth;
use GuideBundle\Entity\Actors;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use GuideBundle\Entity\MedicalStaff;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\HttpFoundation\Session\Session;

class SecurityController extends Controller
{
    /**
     * @Route("auth", name="auth")
     */
    public function loginAction(Request $request)
    {
        $error = '';
        $user = new Auth();
        //$form = $this->createForm(AuthType::class, $user);
        $form = $this->createFormBuilder($user)
            ->add('username', TextType::class)
            ->add('password', PasswordType::class)
            ->add('Log in', SubmitType::class, array('label' => 'Log in'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $user = $this
                ->getDoctrine()
                ->getRepository("GuideBundle:Auth")
                ->findOneBy(
                    array(
                        "username" => $user->getUsername(),
                        "password" => $user->getPassword())
                );
            if ($user) {
                $role = $this
                    ->getDoctrine()
                    ->getRepository("GuideBundle:Actors")
                    ->findOneBy(
                        array(
                            "id" => $user->getActorId()
                        )
                    );
                    $userInfo = $this
                        ->getDoctrine()
                        ->getRepository("GuideBundle:MedicalStaff")
                        ->findOneBy(
                            array(
                                "actorId" => $user->getActorId()
                            )
                        );
                $session = $request->getSession();
                $session->start();

                if ($role->getRole() == 1) {
                    $session->set('user', array(
                        'role' => $role->getRole()
                    ));
                } else {
                    $session->set('user', array(
                        'id' => $role->getId(),
                        'role' => $role->getRole(),
                        'username' => $user->getUsername(),
                        'first_name' => $userInfo->getFirstName(),
                        'last_name' => $userInfo->getLastName(),
                        'patronymic' => $userInfo->getPatronymic()
                    ));
                }

                switch ($role->getRole()) {
                    case '1':
                        return $this->redirect('admin');
                    case '2':
                        return $this->redirect('doctor');
                    case '3':
                        return $this->redirect('laborant');
                    case '4':
                        return $this->redirect('reception');
                    case '5':
                        return $this->redirect('patient');

                }

            } else {
                $error = "* ERROR";
            }

        }


        return $this->render('auth/auth.html.twig', array(
            'form' => $form->createView(), 'error' => $error
        ));
    }

    /**
     * Security logout.
     *
     * @Route("/logout", name="auth_logout")
     */
    public function logoutAction(Request $request)
    {
        $session = $request->getSession();
        $session->remove('user');
        $session->clear();
        return $this->redirect('/');
    }
}
