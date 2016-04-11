<?php

namespace GuideBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use GuideBundle\Controller\SecurityController;

class AdminController extends Controller
{
    /**
     * ("admin", name="admin")
     */
    public function adminAction(Request $request)
    {
        return new Response('Hello admin!');
    }
}
