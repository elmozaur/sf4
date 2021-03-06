<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/adminmain", name="adminmain")
     */
    public function index()
    {
        return $this->render('main/index_admin.html.twig', [
            'controller_name' => 'AdminMainController',
        ]);
    }
}
