<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\TypeLoisir;
use App\Entity\Loisir;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DetailsUtilisateurController extends AbstractController
{
    #[Route('/details/utilisateur', name: 'details_utilisateur')]
    public function index(): Response
    {
        $utilisateur = $this->get('security.token_storage')->getToken()->getUser();
        
        $typeLoisirs = $this->getDoctrine()->getRepository(TypeLoisir::class)->findAll();

        $loisirsUtilisateur = $this->getDoctrine()->getRepository(Loisir::class)->findBy(['idUtilisateur' => $utilisateur->getId()]);

        return $this->render('details_utilisateur/index.html.twig', [
            'utilisateur'=>$utilisateur,
            'typeLoisirs'=>$typeLoisirs,
            'loisirs'=>$loisirsUtilisateur
        ]);
    }
}
