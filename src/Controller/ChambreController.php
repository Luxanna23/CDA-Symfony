<?php

namespace App\Controller;

use App\Form\ChambreType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChambreController extends AbstractController
{
    #[Route('/chambre', name: 'app_chambre')]
    public function index(Request $request): Response
    {
        $form = $this->createForm(ChambreType::class);
        $form->handleRequest($request);
        return $this->render('chambre/index.html.twig', [
            'controller_name' => 'ChambreController',
            'form' => $form,
        ]);
    }
}
