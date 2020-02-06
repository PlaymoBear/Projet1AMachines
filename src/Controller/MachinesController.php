<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Computer;

class MachinesController extends AbstractController
{
    /**
     * @Route("/machines", name="machines")
     */

    public function index()
    {
        $repo_computer=$this->getDoctrine()->getRepository(Computer :: class);

        return $this->render('machines/index.html.twig', [
            'controller_name' => 'MachinesController',
        ]);
    }

    /**
     * @Route("/",name="home")
     */

    public function home() {
        return $this->render('machines/home.html.twig');
    }

}
