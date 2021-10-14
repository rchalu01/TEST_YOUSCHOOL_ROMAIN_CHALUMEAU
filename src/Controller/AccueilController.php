<?php

namespace App\Controller;

use App\Entity\Loisir;
use App\Entity\TypeLoisir;
use App\Entity\Utilisateur;
use Doctrine\ORM\Mapping\Id;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    #[Route('/', name: 'accueil')]
    public function index(): Response
    {
        $utilisateurs = $this->getDoctrine()->getRepository(Utilisateur::class)->findAll();

        $typeLoisirs = $this->getDoctrine()->getRepository(TypeLoisir::class)->findAll();

        $loisirs = [];

        foreach ($utilisateurs as $utilisateur) {
            $loisirs[$utilisateur->getId()] = $this->getDoctrine()->getRepository(Loisir::class)->findBy(['idUtilisateur' => $utilisateur->getId()]);
        }

        return $this->render('accueil/index.html.twig', [
            'utilisateurs' => $utilisateurs,
            'typeLoisirs' => $typeLoisirs,
            'loisirs' => $loisirs
        ]);
    }
}
