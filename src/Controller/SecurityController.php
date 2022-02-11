<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        //dump($this->getUser());//from database with all attributes like password etc ..
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('app_login');
        // }
        /* on symfony/security-core/Encoder/UserPasswordEncoder.php
        $encoder = $this->encoderFactory->getEncoder($user);
        $encoded =  $encoder->encodePassword($user->getPassword(), $user->getSalt());
        //return $encoder->isPasswordValid($user->getPassword(), $raw, $user->getSalt());
        return $encoder->isPasswordValid($encoded, $raw, $user->getSalt());
        */
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();//from form input
        //dump($lastUsername);
        //dd($lastUsername);
        
        //page de connection fotsiny
        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
