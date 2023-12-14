<?php

namespace App\Controller;

use App\Entity\Chambre;
use App\Form\ClientRoomCategoryType;

use App\Repository\ReservationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetClientReservationController extends AbstractController
{
    

    #[Route('/seecustomerreservation', name: 'app_seecustomerreservation')]
    public function index(ReservationRepository $rr, Request $request): Response
    {
        $idClient=$request->query->all()["recup"];
       
        $reservations = $rr->findBy([ 'id_client_fk' => $idClient]);
        return $this->render('reservations/index.html.twig',
            [
                'reservations' => $reservations,
                'clientnum' => $idClient+1
            ]
        );
    }

        // $form = $this->createForm(ClientRoomCategoryType::class, $ch);
        
       
        // return $this->render('chambre/clientFormRoom.html.twig', [
        //     'form' => $form

        // ]);
    

    #[Route('/recup2', name: 'app_chambreform_recup2')]
    public function index3(): Response
    {
        return $this->render('reservations/recup.html.twig');
    }
}
