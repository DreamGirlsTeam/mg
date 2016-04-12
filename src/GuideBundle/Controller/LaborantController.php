<?php

namespace GuideBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use GuideBundle\Controller\SecurityController;

class LaborantController extends Controller
{
//    /**
<<<<<<< HEAD
<<<<<<< HEAD
//     * @Route("laborant, name="laborant")
//     */
//    public function laborantAction(Request $request)
//    {
//        return new Response('Hello laborant!');
//    }
=======
=======
>>>>>>> bd272d0003e5310d4909a26dd413d6c0e9b69b11
//     * @Route("/laborant, name="laborant")
//     */
    public function laborantAction(Request $request)
    {
        return new Response('Hello laborant!');
    }
>>>>>>> bd272d0003e5310d4909a26dd413d6c0e9b69b11
}
