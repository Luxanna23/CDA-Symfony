<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Form\ReservationType;
use App\Repository\ReservationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReservationController extends AbstractController
{

    // #[Route('/reservation/create2', name: 'app_reservation_create2')]
    // public function addReservation2(ClientRepository $cr, Request $request, EntityManagerInterface $em,): Response
    // {   
    //     $res = new Reservation();
    //     $form = $this->createForm(ReservationType::class, $res);
    //     $form->handleRequest($request);

    //     return $this->render('reservation/create.html.twig', [
    //         'reservation' => "nom",
    //         'form' => $form->createView(),
    //     ]);
    // }

    #[Route('/reservation/create', name: 'app_reservation2')]
    public function addReservation(Request $request, EntityManagerInterface $em): Response
    {
        $res = new Reservation();
        $form = $this->createForm(ReservationType::class, $res); 
    
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $res->setIdClientFk(1);
            $res->setIdChambreFk(1);
            $em->persist($res);
            $em->flush();
            return $this->redirectToRoute('app_reservation');
        }
    
        return $this->render('reservation/create.html.twig', [
            'form' => $form->createView(), 
        ]);
    }
    

    #[Route('/reservation', name: 'app_reservation')]
    public function index(Request $request, ReservationRepository $reservationRepository): Response
    {
        return $this->render('reservation/index.html.twig', [
            'reservations' => $reservationRepository->findAll()
        ]);
    }

    #[Route('/reservation/edit/{id}', name: 'app_reservation_edit')]
    public function edit(Reservation $res,Request $request, ReservationRepository $reservationRepository, EntityManagerInterface $em): Response
    {
        $id = $request->get('id');
        $reservationRepository->findWithNamesAndIds($id);
        $form = $this->createForm(ReservationType::class, $res);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid() ) {
            $em->persist($res);
            $em->flush();
            return $this->redirectToRoute('app_reservation');
        }
        return $this->render('reservation/edit.html.twig', [
            'form' => $form,
        ]);
    }

}
