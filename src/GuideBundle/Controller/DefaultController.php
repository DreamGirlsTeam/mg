<?php

namespace GuideBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use GuideBundle\Controller\SecurityController;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use GuideBundle\Entity\Auth;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('default/index.html.twig');
    }

    public function authAction(Request $request)
    {
//        $user = new Auth();
//        $user->setActorId(2);
//        $user->setUsername("pat_test");
//        $user->setPassword("12345");
////        $form = $this->createForm($user);
////        $form->handleRequest($request);
////        if ($form->isSubmitted() && $form->isValid()) {
////            echo "lol";
////        }
////        return $this->render(
////            'default/auth.html.twig',
////            array('form' => $form->createView())
////        );
//        $form = $this->createFormBuilder()
//            ->add('username', TextType::class)
//            ->add('password', TextType::class)
//            ->add('authorize', SubmitType::class, array('label' => 'Login'))
//            ->getForm();
//
//        return $this->render('default/auth.html.twig', array(
//            'form' => $form->createView(),
//        ));
    }
}
