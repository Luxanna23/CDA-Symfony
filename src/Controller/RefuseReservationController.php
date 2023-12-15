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
            $newRes->setReservation($demandeRes->find($id)->getReservation());
            $newRes->setEtat(1);
            $newRes->setIdClientFk(1);
            $newRes->setIdChambreFk(1);
            $em->persist($newRes);
            $em->flush();
        }
        else if ($action == 'notok') {
            $ref = $demandeRes->find($id);
            $ref->setEtat(0);
            $em->persist($ref);
            $em->flush();
        }
                return $this->render('refuse_reservation/index.html.twig', [
                    'reservations' => $demandeRes->findBy(['Etat'=> null]),
                    'accepted_reservations' => $resvations->findAll(),
                    'refused_reservations' => $demandeRes->findBy(['Etat' => 0]),
                ]);
            }
        }
        
        