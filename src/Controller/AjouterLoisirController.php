<?php

namespace App\Controller;

use App\Entity\Loisir;
use App\Form\LoisirType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AjouterLoisirController extends AbstractController
{
    #[Route('/ajouter/loisir', name: 'ajouter_loisir')]
    public function index(Request $request): Response
    {
        $loisir = new Loisir();

        $loisir->setIdUtilisateur($this->get('security.token_storage')->getToken()->getUser()->getId());
        
        $form = $this->createForm(LoisirType::class, $loisir);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            
            $loisir = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($loisir);
            $entityManager->flush();

            return $this->redirectToRoute('details_utilisateur');
        }


        return $this->render('ajouter_loisir/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
