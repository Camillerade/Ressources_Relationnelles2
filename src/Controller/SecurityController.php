<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


class SecurityController extends AbstractController
{
    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername, 
            'error' => $error]);
    }
    #[Route(path: '/logout', name: 'app_logout')]
    public function logout() 
    {
        // Récupérer l'utilisateur connecté
        $user = $this->getUser();
       if (!$user)
       {
          // Rediriger l'utilisateur vers la page de connexion
          return $this->redirectToRoute('login');
       }
    
       // Rediriger l'utilisateur vers la page d'accueil
       return $this->redirectToRoute('home');
    } 
}
