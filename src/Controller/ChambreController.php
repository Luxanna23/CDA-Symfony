<?php

namespace App\Controller;

use App\Entity\Chambre;
use App\Form\ClientRoomCategoryType;
use App\Repository\ChambreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChambreController extends AbstractController
{
    

    #[Route('/chambreform', name: 'app_chambreform')]
    public function index(ChambreRepository $cr, Request $request): Response
    {
        $category=$request->query->all()["recup"];
       
        $chambres = $cr->findBy([ 'categorie' => $category]);
        return $this->render('chambre/index.html.twig',
            [
                'chambres' => $chambres
            ]
        );
    }

        // $form = $this->createForm(ClientRoomCategoryType::class, $ch);
        
       
        // return $this->render('chambre/clientFormRoom.html.twig', [
        //     'form' => $form

        // ]);
    

    #[Route('/recup', name: 'app_chambreform_recup')]
    public function index3(): Response
    {
        return $this->render('chambre/recup.html.twig');
    }
}
