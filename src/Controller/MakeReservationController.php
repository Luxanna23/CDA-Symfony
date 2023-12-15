<?php

namespace App\Controller;

use App\Entity\Chambre;
use App\Form\ClientRoomCategoryType;

use App\Repository\ClientRepository;
use App\Repository\ReservationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MakeReservationController extends AbstractController
{
    

    #[Route('/makereservation', name: 'app_makereservation')]
    public function index(ClientRepository $cr, Request $request): Response
    {
        $nomClient=$request->query->all()["nom"];
        $numChambre=$request->query->all()["numchambre"];
       
        $client = $cr->findBy([ 'name' => $nomClient]);
        return $this->render('reservations/index2.html.twig',
            [
                'numChambre' => $numChambre,
                'clientNom' => $nomClient,
                'clientId' => $client[0]->getId()
            ]
        );
    }

        // $form = $this->createForm(ClientRoomCategoryType::class, $ch);
        
       
        // return $this->render('chambre/clientFormRoom.html.twig', [
        //     'form' => $form

        // ]);
    

    #[Route('/reservationform', name: 'app_reservationform')]
    public function index3(): Response
    {
        return $this->render('reservations/makereservation.html.twig');
    }
}
