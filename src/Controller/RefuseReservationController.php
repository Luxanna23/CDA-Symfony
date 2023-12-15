<?php

namespace App\Controller;

use App\Entity\DemandeReservation;
use App\Entity\Reservation;
use App\Repository\DemandeReservationRepository;
use App\Repository\ReservationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class RefuseReservationController extends AbstractController
{
    #[Route('/refusereservation', name: 'app_refuse_reservation')]
    public function index(Request $request, DemandeReservationRepository $demandeRes, ReservationRepository $resvations, EntityManagerInterface $em): Response
    { 
        $action = $request->query->get('action');
        $id = $request->query->get('id');
        if ($action == 'ok') {
            $newRes = new Reservation();
            $findRes = $resvations->find($id);
            $newRes->setReservation($findRes->getReservation());
            $em->persist($newRes);
            $em->flush();
        }
        else if ($action == 'notOk') {
            $delete = $demandeRes->find($id);
            if ($delete){
                $em->remove($delete);
                $em->flush();
            }
        }
        return $this->render('refuse_reservation/index.html.twig', [
            'reservations' => $demandeRes->findAll(),
            'accepted_reservations' => $resvations->findAll(),
            'refused_reservations' => $demandeRes->findAll(),
        ]);
    }
}