<?php

namespace App\Controller;

use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Form\ResgisterType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class SecurityController extends AbstractController
{
    /**
     * @Route("/inscription", name="security_registration")
     */

    public function registration(Request $request, UserPasswordEncoderInterface $encoder) {
        $manager = $this->getDoctrine()->getManager();
        $user = new User();
        $form = $this -> createForm(ResgisterType::class, $user);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $hash = $encoder->encodePassword($user, $user->getPassword());
            $user->setRoles(array('ROLE_USER'));
            $user->setPassword($hash);
;

            $manager->persist($user);
            $manager->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render("security/registration.html.twig", ['form'=> $form->createView()]);

    }

    /**
     * @Route("/deconnexion", name="security_logout")
     */
    public function logout() {}


    /**
     * @Route("/admin", name="admin_dashboard")
     */
    public function admin_dashboard() {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'User tried to access a page without having ROLE_ADMIN');
        return $this->render('security/admin_dashboard.html.twig');
    }


}

