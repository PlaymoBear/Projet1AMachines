<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Computer;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

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

    public function home(AuthenticationUtils $authenticationUtils) {
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();
        return $this->render('machines/home.html.twig', [
            'last_username' => $lastUsername,
            'error'         => $error,
        ]);
    }

}
