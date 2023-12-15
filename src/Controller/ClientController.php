<?php

namespace App\Controller;

use App\Form\ClientType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClientController extends AbstractController
{
    #[Route('/client', name: 'app_client')]
    public function index(Request $request): Response
    {
        $form = $this->createForm(ClientType::class);
        $form->handleRequest($request);
        return $this->render('client/index.html.twig', [
            'controller_name' => 'ClientController',
            'form' => $form,
        ]);
    }

    #[Route('/client/edit', name: 'app_client')]
    public function edit(Request $request): Response
    {
        $form = $this->createForm(ClientType::class);
        $form->handleRequest($request);
        return $this->render('client/index.html.twig', [
            'controller_name' => 'ClientController',
            'form' => $form,
        ]);
    }
} 
